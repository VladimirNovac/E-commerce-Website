if (typeof(Storage) !== "undefined") {
    if (localStorage.user) {
        document.getElementById("sign-in-display").innerHTML = "Hello " + localStorage.user;
        document.getElementById("login-footer").innerHTML = "Logout";
        document.getElementById("login-footer").setAttribute("onclick", "logOut()");
        createLogoutButton();
    }
}

function validate() {
    var userName = document.getElementById("InputEmail").value;
    var password = document.getElementById("InputPassword").value;

    if (userName == "Jbloggs@mail.com" && password == "123") {
        document.getElementById("login-message").style.color = "#61a307";
        document.getElementById("modal-login-button").style.visibility = "hidden";
        document.getElementById("login-message").innerHTML = "Hello " + userName + ", you are signed in. Click close to continue";
        document.getElementById("modal-close-button").style.visibility = "visible";
        document.getElementById("sign-in-display").innerHTML = "Hello " + userName;
        localStorage.setItem("user", userName);
        createLogoutButton();
        var loginFooter = document.getElementById("login-footer");
        loginFooter.innerHTML = "Logout";
        loginFooter.setAttribute("onclick", "logOut()");
        localStorage.setItem("login-link", "logout");
        //location.reload();
    } else {
        document.getElementById("login-message").style.color = "red";
        document.getElementById("login-message").innerHTML = "Please enter a valid username and password";
    }
}



function createLogoutButton() {
    document.getElementById("main-login-button").style.visibility = "hidden";
    var logOutButton = document.createElement("BUTTON");
    logOutButton.setAttribute("class", "navbar-collapse collapse d-none d-lg-block");
    logOutButton.setAttribute("class", "btn btn-seconday navbar-btn");
    logOutButton.setAttribute("onclick", "logOut()");
    logOutButton.setAttribute("id", "logout-button()");
    logOutButton.innerHTML = "Logout";
    document.getElementById("navbar-buttons").appendChild(logOutButton);
}

function logOut() {
    localStorage.removeItem("user");
    location.reload();
}

function validatePurchase() {
    var modal = document.getElementById("purchase_button");
    if (!localStorage.user) {
        alert("You must sign in before purchasing leaves!");
        modal.setAttribute("data-target", "none");
        return;
    }

    var total = document.getElementById("order_total").innerHTML;
    if (total === "$0") {
        alert("Your shopping basket is empty!");

        modal.setAttribute("data-target", "none");
        return;
    }


}

function reloadPage() {
    location.reload();
}