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
    $info = ["name", "description", "language", 'pushed_at'];

    //Make table headers
    $result = "<table class=\"table table-hover table-striped table-dark border-0\">
      <thead class=\"thead-dark\">
        <tr>";
    foreach ($info as $inf) {
      $result .= "<th>".ucfirst($inf)."</th>";
    }
    $result .= "</thead></tr>";
    //Create row for each repository
    foreach ($repositories as $repo) {
      $result .= "<tr onclick=\"RepositoryInfo('".$repo['full_name']."')\">";
      foreach ($info as $inf) {
        $result .= "<td>".$repo[$inf]."</td>";
      }
      $result .= "</tr>";
    }
    return $result."</table";
  }
}

?>
