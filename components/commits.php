<?php
class Commits {
  function ListCommits($values, $client) {
    //List commits
    $commits = Commits::GetRepositoryCommits($values, $client);
    $count = $values['count'] < sizeof($commits) ? $values['count'] : sizeof($commits);

    //Loop through latest commits
    $result = "";
    for ($i = 0; $i < $count; $i++) {
      $result .= Card::Make($commits[$i])."<br>";
    }
    return $result;
  }
  //List repository commits
  function GetRepositoryCommits($values, $client) {
    $id = explode("/", $values['id']);
    $commits = $client->api('repo')->commits()->all($id[0], $id[1], array('sha' => 'master'));
    return $commits;
  }
}
 ?>
