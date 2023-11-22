// scriptDiariMakanan.js
document.addEventListener('DOMContentLoaded', function () {
  // Inisialisasi array untuk melacak elemen yang diklik
  var clickedItems = [];

  // Get all elements with the class 'kotak-checklist'
  var checklistItems = document.querySelectorAll('.kotak-checklist');

  // Add a click event listener to each checklist item
  checklistItems.forEach(function (item) {
      item.addEventListener('click', function () {
          // Toggle the 'checked' class to change the background color of the checklist item
          item.classList.toggle('checked');

          // Get the parent element (.menu-checklist-deskripsi)
          var parentDeskripsi = item.closest('.menu-checklist-deskripsi');

          // Toggle the 'checked' class to change the background color of the parent (.menu-checklist-deskripsi)
          if (parentDeskripsi) {
              parentDeskripsi.classList.toggle('checked');
          }

          // Tambahkan atau hapus item dari daftar yang telah diklik
          if (clickedItems.includes(item)) {
              // Hapus item dari daftar
              clickedItems = clickedItems.filter(function (clickedItem) {
                  return clickedItem !== item;
              });
          } else {
              // Tambahkan item ke daftar
              clickedItems.push(item);
          }

          // Perbarui tampilan di kotak kiri
          updateKotakKiri();
      });
  });

  // Fungsi untuk memperbarui tampilan di kotak kiri
  function updateKotakKiri() {
      // Dapatkan elemen kotak kiri
      var kotakKiri = document.querySelector('.kotak-kiri-item');

      // Bersihkan isi kotak kiri
      kotakKiri.innerHTML = '';

      // Loop melalui elemen yang telah diklik dan tambahkan ke kotak kiri
      clickedItems.forEach(function (clickedItem, index) {
          // Buat elemen baru untuk ditambahkan ke kotak kiri
          var newItem = document.createElement('div');
          newItem.textContent = (index + 1) + '. ' + clickedItem.closest('.menu-checklist-deskripsi').querySelector('.menu-judul').textContent; // Ambil judul dari elemen yang diklik
          newItem.classList.add('kotak-kiri-item-listed');

          // Tambahkan elemen baru ke kotak kiri
          kotakKiri.appendChild(newItem);
      });

      // Buat elemen baru untuk button
      var newDivButton = document.createElement('div');
      newDivButton.classList.add('kotak-kiri-item-button');
      kotakKiri.appendChild(newDivButton);

      var newButton = document.createElement('button');
      newButton.textContent = 'Oke';
      newButton.onclick = onOKButtonClick; // Tambahkan fungsi onClick
      newDivButton.appendChild(newButton);

      // Tambahkan atau hapus class 'listed' berdasarkan kondisi
      if (clickedItems.length > 0) {
          kotakKiri.classList.add('listed');
          newDivButton.classList.add('active');
      } else {
          kotakKiri.classList.remove('listed');
          newDivButton.classList.remove('active');
      }
  }

  // Function to handle OK button click
  function onOKButtonClick() {
    var form = document.getElementById("foodForm");
    form.submit();
    alert("Makanan Berhasil");
  }

  // Membuat tombol secara dinamis dan menambahkannya ke body
  var okButton = document.createElement("button");
  okButton.type = "button";
  okButton.textContent = "Konfirmasi Makanan";
  okButton.onclick = onOKButtonClick;
  document.body.appendChild(okButton);
});
