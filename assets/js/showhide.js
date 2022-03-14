function showHidePw() {
    var x = document.getElementById("shPw");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }