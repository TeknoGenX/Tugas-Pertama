document.addEventListener("DOMContentLoaded", function () {
  const productList = document.getElementById("productList");

  fetch("../PHP/produk.php")
    .then(response => response.json())
    .then(data => {
      productList.innerHTML = "";
      data.forEach((produk) => {
        const col = document.createElement("div");
        col.className = "col-md-4 mb-3";
        col.innerHTML = `
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">${produk.nama}</h5>
              <p class="card-text">Rp ${produk.harga}</p>
              <p class="card-text">Stok: ${produk.stok}</p>
              <p class="card-text">${produk.deskripsi}</p>
              <button class="btn btn-primary btn-sm me-1" onclick="editProduk(${produk.id})">Edit</button>
              <button class="btn btn-danger btn-sm me-1" onclick="hapusProduk(${produk.id})">Hapus</button>
              <button class="btn btn-success btn-sm" onclick="tambahKeKeranjang(${produk.id})">+ Keranjang</button>
            </div>
          </div>
        `;
        productList.appendChild(col);
      });
    });
});

function editProduk(id) {
  const nama = prompt("Masukkan nama baru:");
  const harga = prompt("Masukkan harga baru:");
  const stok = prompt("Masukkan stok baru:");
  const deskripsi = prompt("Masukkan deskripsi baru:");

  fetch(`../PHP/edit_produk.php`, {
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({ id, nama, harga, stok, deskripsi })
  }).then(() => location.reload());
}

function hapusProduk(id) {
  if (confirm("Yakin ingin menghapus produk ini?")) {
    fetch(`../PHP/hapus_produk.php`, {
      method: "POST",
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ id })
    }).then(() => location.reload());
  }
}

function tambahKeKeranjang(idProduk) {
  fetch(`../PHP/cart.php`, {
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({ id_produk: idProduk })
  }).then(() => alert("Produk ditambahkan ke keranjang!"));
}

function tampilkanKeranjang() {
  fetch("../PHP/cart_tampil.php")
    .then(res => res.json())
    .then(data => {
      const cartList = document.getElementById("cartList");
      cartList.innerHTML = "";

      if (data.length === 0) {
        cartList.innerHTML = "<p class='text-center'>Keranjang kosong.</p>";
        return;
      }

      data.forEach((item) => {
        const col = document.createElement("div");
        col.className = "col-md-4 mb-3";
        col.innerHTML = `
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">${item.nama}</h5>
              <p class="card-text">Harga: Rp ${item.harga}</p>
              <p class="card-text">Jumlah: ${item.jumlah}</p>
              <button class="btn btn-danger btn-sm" onclick="hapusDariKeranjang(${item.id_produk})">Hapus</button>
            </div>
          </div>
        `;
        cartList.appendChild(col);
      });
    });
}

function hapusDariKeranjang(id_produk) {
  fetch("../PHP/cart_hapus.php", {
    method: "POST",
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({ id_produk })
  }).then(() => tampilkanKeranjang());
}

function kosongkanKeranjang() {
  fetch("../PHP/cart_kosongkan.php", { method: "POST" })
    .then(() => tampilkanKeranjang());
}

// Tampilkan keranjang saat halaman dimuat
document.addEventListener("DOMContentLoaded", tampilkanKeranjang);
