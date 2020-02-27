<?php
class Card {
  //Make commit card
  function Make($commit) {
    $result = "
    <div class=\"col-xl-12 col-lg-12\">
      <div class=\"card shadow mb-4\">
        <!-- Card Header - Dropdown -->
        <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
          <h6 class=\"m-0 font-weight-bold text-primary\">Commit</h6>
          <h6 class=\"m-0 font-weight-bold text-primary float-right\">".Date::From($commit['commit']['author']['date'])."</h6>
        </div>
        <!-- Card Body -->
        <div class=\"card-body row\">
          <div class=\"col-lg-2\">
            <img class=\"rounded avatar-image\" src=\"".$commit['author']['avatar_url']."\"></img>
            <p class=\"text-center\">".$commit['commit']['author']['name']."</p>
          </div>
          <div class=\"col-lg-8\">
            <p class=\"text-primary\">".$commit['commit']['message']."</p>
          </div>
        </div>
        </div>
      </div>
    </div>";
    return $result;
  }
}
 ?>
