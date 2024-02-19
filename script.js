

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
    document.getElementById("mySidenav").style.width = "450px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

function overlayOn(){
    document.getElementById("overlay").style.display = 'flex'
}
function overlayOff(){
    document.getElementById("overlay").style.display = 'none'
    window.location.href = 'menu.php';
}


