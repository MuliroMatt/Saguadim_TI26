

function toggleInfo(){
    document.getElementById("user-info").style.display = "flex";
    document.getElementById("perfil").style.display = "none";
    document.getElementById("pedidos").style.display = "none";
}
function togglePerfil(){
    document.getElementById("perfil").style.display = "grid";
    document.getElementById("user-info").style.display = "none";
    document.getElementById("pedidos").style.display = "none";
}
function togglePedidos(){
    document.getElementById("pedidos").style.display = "flex";
    document.getElementById("perfil").style.display = "none";
    document.getElementById("user-info").style.display = "none";
}

function openNav() {
    var sidenav = document.getElementById("mySidenav");
    if (sidenav.classList.contains("open")) {
        sidenav.classList.remove("open");
    } else {
        sidenav.classList.add("open");
    }
  }
  
  function closeNav() {
    var sidenav = document.getElementById("mySidenav");
    sidenav.classList.remove("open");
  }

function overlayOn(){
    document.getElementById("overlay").style.display = 'flex'
}
function overlayOff(){
    document.getElementById("overlay").style.display = 'none'
    window.location.href = 'menu.php';
}


