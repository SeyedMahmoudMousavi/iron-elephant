// Get element with id message and change value to returned value from .php file
function myCallBack(str) {
  /**
   * Add your js codes here
   */

  let e = document.getElementById("message");
  e.innerHTML = str;
}
function showLoader() {
  // show spinner
}
