// Quand l'utilisateur scroll vers le bas de 20px, alors il affiche le boutton
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// Quand l'utlisateur clique sur le bouton, alors ça retourne en haut de la page
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// BURGER MENU  
  function myFunction() {
    var x = document.getElementById("navbarTop");
    if (x.className === "navbar") {
      x.className += " responsive";
    } else {
      x.className = "navbar";
    }
  } 

  function myFunctionRemove() {
    var element = document.getElementById("navbarTop");
    element.classList.remove("responsive");
}