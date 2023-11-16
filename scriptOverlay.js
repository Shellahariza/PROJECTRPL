function openOverlayProfil() {
    // Membuat div overlay
    var overlay = document.createElement("div");
    overlay.className = "overlay";
    overlay.id = "ProfilOverlay";
  
    // Menambahkan konten overlay
    overlay.innerHTML = 
    '<div class="overlay-containerBMI" id="overlayContainerBMI"></div>' +
      '<div class="layar">' +
          '<div>' +
              '<div class="container-all">' +
                  '<div class="navigasi">' +
                      '<div class="container-nav">' +
                          '<img src="img/Logo Profil.png" alt="logo profil" class="logo-profil">' +
                          '<h1 class="profil-h1">Profil</h1>' +
                          '<img src="img/Vector 5.png" alt="logo silang" class="logo-silang" onclick="closeOverlayProfil()">' +
                      '</div>' +
                  '</div>' +
              '</div>' +
          '</div>' +
          '<div class="main">' +
              '<section>' +
                  '<div class="container-profil">' +
                      '<div class="container-kelola-logo-nama">' +
                          '<div class="kelola" onclick="UbahProfil()">' +
                              '<p>Kelola</p>' +
                          '</div>' +
                          '<div class="profil-lingkaran-nama">' +
                              '<img src="img/profile-circle.png" alt="profil-circle" class="profil-circle">' +
                              '<div class="nama-nomor">' +
                                  '<h1 class="nama">....</h1>' +
                                  '<h3 class="nomor">+62.....</h3>' +
                              '</div>' +
                          '</div>' +
                      '</div>' +
                      '<div class="container-umur-bb-tb">' +
                          '<div class="logo-umur">' +
                              '<img src="img/sort.png" alt="sort logo" class="icon-sort">' +
                              '<h1 class="h1-umur">... Tahun</h1>' +
                          '</div>' +
                          '<div class="logo-bb">' +
                              '<img src="img/sort.png" alt="sort logo" class="icon-sort">' +
                              '<h1 class="h1-umur">... Kg</h1>' +
                          '</div>' +
                          '<div class="logo-tb">' +
                              '<img src="img/sort.png" alt="sort logo" class="icon-sort">' +
                              '<h1 class="h1-umur">... Cm</h1>' +
                          '</div>' +
                      '</div>' +
                  '</div>' +
                  '<div class="container-bmi">' +
                      '<div class="container-kelola-logo-bmi">' +
                          '<div class="kelola-bmi">' +
                              '<p onclick="openOverlayBMI()">Kelola</p>' +
                          '</div>' +
                          '<div class="logo-timbangan-nama">' +
                              '<img src="img/weight-scale.png" alt="weight-scale" class="weight-scale">' +
                              '<h1 class="bmi">BMI</h1>' +
                          '</div>' +
                          '<div class="indeks-keterangan">' +
                              '<h1 class="indeks">..</h1>' +
                              '<h2 class="keterangan">...</h2>' +
                          '</div>' +
                          '<div class="bb-sekarang-target">' +
                              '<div class="bb-doang">' +
                                  '<h3 class="bb-angka">..Kg</h3>' +
                                  '<h3 class="bb-skrg-trgt">NOW</h3>' +
                              '</div>' +
                              '<div class="bb-target">' +
                                  '<h3 class="bb-angka">..Kg</h3>' +
                                  '<h3 class="bb-skrg-trgt">TARGET</h3>' +
                              '</div>' +
                          '</div>' +
                      '</div>' +
                  '</div>' +
              '</section>' +
          '</div>' +
      '</div>';
  
    // Menambahkan overlay ke dalam div dengan id "overlay-Profil"
    document.getElementById("overlay-Profil").appendChild(overlay);
  
    // Menambahkan class "active" untuk menunjukkan bahwa overlay sedang aktif
    overlay.classList.add("active");
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        closeOverlayProfil();
      }
    });
  }
  
  function closeOverlayProfil() {
    // Menghapus div overlay
    var overlay = document.getElementById("ProfilOverlay");
    overlay.parentNode.removeChild(overlay);
  }
  
  function openOverlayBMI() {
    // Membuat div overlay
    var overlay = document.createElement("div");
    overlay.className = "BMI";
    overlay.id = "BMIOverlay";
  
    // Menambahkan konten overlay
    overlay.innerHTML = '<div class="kotakbesar">'+
    '<div class="BMI-silang" onclick="closeOverlayBMI()">'+
        '<img src="img/LogoSilang.png" alt=""></div>'+
        '<div class="form">'+
          '<form action="" method="post">'+
                '<div class="inputan1">'+
                    '<label for="">Berat Badan Terbaru</label>'+
                    '<div>'+
                      '<input type="text" name="bb" placeholder="70" required>'+
                      '<p>Kg</p>'+
                    '</div>'+
                '</div>'+           
                '<div class="inputan2">'+
                    '<label for="">Tinggi Badan Terbaru</label>'+
                    '<div>'+
                      '<input type="text" name="tb" placeholder="180" required>'+
                      '<p>Cm</p>'+
                    '</div>'+
                '</div>'+
                '<div class="button">'+
                    '<button type="button">Oke</button>'+
                '</div>'+
            '</form>'+
      '</div>'+
    '</div>';
  
    // Menambahkan overlay ke dalam div dengan id "overlayContainerBMI"
    document.getElementById("overlayContainerBMI").appendChild(overlay);
  
    // Menambahkan class "active" untuk menunjukkan bahwa overlay sedang aktif
    overlay.classList.add("active");
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        closeOverlayBMI();
      }
    });
  }
  
  function closeOverlayBMI() {
    // Menghapus div overlay
    var overlay = document.getElementById("BMIOverlay");
    overlay.parentNode.removeChild(overlay);
  }
  function UbahProfil() {
     //ubah profil ke profil.html
      window.location.href = "profil.php";
  }