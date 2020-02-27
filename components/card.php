<?php
class Card {
  function Make($commit) {
    $result = "<div class=\"row\">
      <div class=\"col-xl-12 col-md-12 mb-12\">
        <div class=\"card border-left-primary bg-dark py-2\">
          <div class=\"card-body\">
            <div class=\"row\">
              <img class=\"img-profile rounded-circle col-lg-1\" src=\"".$commit['committer']['avatar_url']."\"></img>
            </div>
          </div>
        </div>
      </div>
    </div>";
    return $result;
  }
}
 ?>
