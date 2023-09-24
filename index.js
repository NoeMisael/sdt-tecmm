window.onload = function () {
    var w = document.getElementById("home");
    var x = document.getElementById("servicios");
    var y = document.getElementById("about");
    var z = document.getElementById("contacto");

    w.style.display = "block";
    x.style.display = "none";
    y.style.display = "none";
    z.style.display = "none";

    document.getElementById('menuhome').className = "active";
    document.getElementById('menuservicios').className = "desactive";
    document.getElementById('menuabout').className = "desactive";
    document.getElementById('menucontacto').className = "desactive";

}

function show(div_id) {
    var w = document.getElementById("home");
    var x = document.getElementById("servicios");
    var y = document.getElementById("about");
    var z = document.getElementById("contacto");


    if (div_id === "home") {
        w.style.display = "block";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
        document.getElementById('menuhome').className = "active";
        document.getElementById('menuservicios').className = "desactive";
        document.getElementById('menuabout').className = "desactive";
        document.getElementById('menucontacto').className = "desactive";
    } else if (div_id === "servicios") {
        w.style.display = "none";
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
        document.getElementById('menuhome').className = "desactive";
        document.getElementById('menuservicios').className = "active";
        document.getElementById('menuabout').className = "desactive";
        document.getElementById('menucontacto').className = "desactive";
    } else if (div_id === "about") {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
        document.getElementById('menuhome').className = "desactive";
        document.getElementById('menuservicios').className = "desactive";
        document.getElementById('menuabout').className = "active";
        document.getElementById('menucontacto').className = "desactive";
    } else {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "block";
        document.getElementById('menuhome').className = "desactive";
        document.getElementById('menuservicios').className = "desactive";
        document.getElementById('menuabout').className = "ddsactive";
        document.getElementById('menucontacto').className = "active";

    }

}