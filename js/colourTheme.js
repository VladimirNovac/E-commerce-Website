function changeTheme(colour) {
    if (colour === "green") {
        document.getElementById('site-colour').href = 'css/custom2.css';
        // document.getElementById('site-colour-products').href = 'css/custom2.css';
        var temp = document.getElementById("change-colour-button");
        temp.setAttribute("onclick", "changeTheme('red')");
    }

    if (colour === "red") {
        document.getElementById('site-colour').href = 'css/custom.css';
        //  document.getElementById('site-colour-products').href = 'css/custom.css';
        var temp = document.getElementById("change-colour-button");
        temp.setAttribute("onclick", "changeTheme('green')");
    }


}