function openOverlayProfil() {
    var overlay = document.querySelector('.overlay');
    overlay.classList.add('active');
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        closeOverlayProfil();
      }
    });
}

function closeOverlayProfil() {
    var overlay = document.querySelector('.overlay');
    overlay.classList.remove('active');
    
}
  
function openOverlayBMI() {
    var overlay = document.querySelector('.BMI');
    overlay.classList.add('active');
    overlay.addEventListener("click", function(event) {
        if (event.target === overlay) {
          closeOverlayBMI();
        }
      });
}

function closeOverlayBMI() {
    var overlay = document.querySelector('.BMI');
    overlay.classList.remove('active');
}
  function UbahProfil() {
     //ubah profil ke profil.html
      window.location.href = "profil.php";
  }
  function tambahPagi() {
    //ubah profil ke profil.html
     window.location.href = "diarimakananpagi.html";
 }
 function tambahSiang() {
    //ubah profil ke profil.html
     window.location.href = "diarimakansiang.html";
 }
 function tambahMalam() {
    //ubah profil ke profil.html
     window.location.href = "diarimakanmalam.html";
 }
 function tambahCamilan() {
    //ubah profil ke profil.html
     window.location.href = "diaricamilan.html";
 }