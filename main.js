window.onresize = function () { location.reload(); }
function validate() {
    username = document.getElementById("username").value

    if (username.length == 0) {
        alert("All field should be filled")
    }
    else {
        alert("Thanks " + " " + username + " " + " you are successfully registered!!")
    }
}
