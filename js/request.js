function Request(request, callback) {
  // console.log(request);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //Preprocess response and call function
      var resp = this.responseText;
      var json = JSON.parse(resp);
      console.log(json);
      callback(json);
    }
  };
  //Send request
  xmlhttp.open("GET", "components/requestHandler.php?r=" + JSON.stringify(request), true);
  xmlhttp.send();
}
