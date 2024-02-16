document.getElementById("toggleCadastra").addEventListener("click", function () {
    document.getElementById("login").style.display = "none";
    document.getElementById("cadastra").style.display = "flex";
});



document.getElementById("toggleLogin").addEventListener("click", function () {
    document.getElementById("cadastra").style.display = "none";
    document.getElementById("login").style.display = "flex";
});

function toggleInfo(){
    document.getElementById("user-info").style.display = "flex";
    document.getElementById("perfil").style.display = "none";
    document.getElementById("pedidos").style.display = "none";
}
function togglePerfil(){
    document.getElementById("perfil").style.display = "flex";
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