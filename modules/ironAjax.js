
function ajax(fileName, myCallBack, data = "", sendMethod = "get",showLoader=function(){}) {
  if (sendMethod.toLowerCase() === "post") {
    showLoader();
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      myCallBack(this.responseText);
    };
    xhttp.open("post", fileName);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data); //
  } else {
    showLoader();
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      myCallBack(this.responseText);
    };
    xhttp.open("get", fileName + "?" + data);
    xhttp.send();
  }
}
