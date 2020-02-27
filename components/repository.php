<?php
class Repository {
  //List user repositories in Github
  function GetUserRepositories($values, $client) {
    $user = $values['user'];
    //List user repositories
    try {
      $repositories = $client->api('user')->repositories($user);
      return Repository::ListRepositories($repositories);

    } catch (Exception $e) {
        RequestHandler::Error($e->getMessage(), 1);
      return "";
    }
  }
  function ListRepositories($repositories) {
    //Info contains all columns of table
    $info = ["name" => "text", "description" => "text", "language" => "text", 'pushed_at' => "date"];

    //Make table headers
    $result = "<table class=\"table table-hover table-striped table-dark border-0\">
      <thead class=\"thead-dark\">
        <tr>";
    foreach ($info as $key => $value) {
      $result .= "<th>".ucfirst($key)."</th>";
    }
    $result .= "</thead></tr>";
    //Create row for each repository
    foreach ($repositories as $repo) {
      $result .= "<tr onclick=\"RepositoryInfo('".$repo['full_name']."')\">";
      foreach ($info as $k => $v) {
        $r = $repo[$k];
        if($v == "date") {
          $r = Date::From($r);
        }
        $result .= "<td>".$r."</td>";
      }
      $result .= "</tr>";
    }
    return $result."</table";
  }
}

?>
