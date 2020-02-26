<!DOCTYPE html>
<html>
<?php
  //Include config and create header
  include "config.php";
  new Header("Home");
?>
<body class="bg-dark">
  <br>
  <input type="text" placeholder="Github-tunnus" onchange="GetUserRepositories(this.value)" autofocus>
  <br>
  <div id="repositories"></div>
  <script>
  //Request user repositories
  function GetUserRepositories(user) {
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
        document.getElementById('repositories').innerHTML = response.items[0];
    });
  }
  function RepositoryInfo(id) {
    var request = {
      "request": "Get repository info",
      "items": [{
        "Repository": {
          "ListCommits": {
            "id": id,
            "count": 10
          }
        }
      }]
    }
    Request(request, function(response) {
      document.getElementById('repositories').innerHTML = response.items[0];
    });
  }
  </script>
</body>
</html>
