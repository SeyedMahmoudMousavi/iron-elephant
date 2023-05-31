/**
 *
 * @param {string} fileName name of server file like : ajax.php
 * @param {function} myCallBack
 * @param {string} data
 * @param {string} sendMethod
 * @param {function} showLoader
 *
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function ajax(
  fileName,
  myCallBack,
  data = "",
  sendMethod = "get",
  showLoader = function () {}
) {
  if (sendMethod.toLowerCase() === "post") {
    showLoader();
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      myCallBack(this.responseText);
    };
    xhttp.open("post", fileName);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data); //
  } else if (sendMethod.toLowerCase() === "get") {
    showLoader();
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      myCallBack(this.responseText);
    };
    xhttp.open("get", fileName + "?" + data);
    xhttp.send();
  }
}
