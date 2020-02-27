<!DOCTYPE html>
<html>
<?php
  //Include config and create header
  include "config.php";
  new Header("Home");
?>
<body class="bg-dark">
  <?php
  //Create topnav
  new TopNav();
   ?>
  <div id="content" class="container">
  </div>

  <?php
    //Include files needed to request anything
    require "js/request.php";
  ?>
  <script>
  //Request user repositories
  function GetUserRepositories() {
    var user = document.getElementById('user').value;
    if(user == undefined || user == "") return;
    //Create request object
    var request = {
      "request": "Get user repositories",
      "items": [{
        "Repository": {
          "GetUserRepositories": {
            "user": user
          }
        }
      }]
    }
    //Send request and process response
    Request(request, function(response) {
      if(response.items.length > 0)
        document.getElementById('content').innerHTML = response.items[0];
    });
  }
  function RepositoryInfo(id) {
    //Create request
    var request = {
      "request": "Get repository info",
      "items": [{
        "Commits": {
          "ListCommits": {
            "id": id,
            "count": 10
          }
        }
      }]
    }
    //Send request and process response
    Request(request, function(response) {
      document.getElementById('content').innerHTML = response.items[0];
    });
  }
  </script>
</body>
</html>
