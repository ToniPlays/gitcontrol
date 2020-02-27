<!--Notification container-->
<div id="notifications" class="notification-container"></div>

<script>
function Request(request, callback) {
  // console.log(request);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      //Preprocess response and call function
      var resp = this.responseText;
      var json = JSON.parse(resp);
      console.log(json);
      if(json.errors.length > 0) {
        var container = document.getElementById('notifications');
        for (var i = 0; i < json.errors.length; i++) {
          var error = json.errors[i];
          Notify(error.status, error.title, container);
        }
      }
      else
        callback(json);
    }
  };
  //Send request
  xmlhttp.open("GET", "components/requestHandler.php?r=" + JSON.stringify(request), true);
  xmlhttp.send();
}

function Notify(status, title, container) {
  //Colors and titles;
  var colors = ["success", "warning", "danger"];
  var titles = ["Success!", "Warning!", "Error!"];
  var notification = document.createElement("DIV");
  //Make new notification
  notification.innerHTML = "<div onclick=\"Close(this)\" class=\"alert alert-" + colors[status] + "\">" +
  "<p><strong>" + titles[status] + " </strong></p>" +
  title +
  "</div>";
  container.appendChild(notification);
}
//Close specific notification by fading out
function Close(div) {
  div.style.opacity = "0";
  setTimeout(function(){ div.style.display = "none"; }, 600);
}
</script>
