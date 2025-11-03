if (document.getElementById("nama").value === "") {
    alert("Nama harus diisi!");
}

let email = document.getElementById("email").value;
let pola = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if (!pola.test(email)) {
    alert("Format email tidak valid!");
}

let password = document.getElementById("password").value;
if (password.length < 8) {
    alert("Password minimal 8 karakter!");
}

if (document.getElementById("password").value !== document.getElementById("confirm").value) {
    alert("Konfirmasi password tidak cocok!");
}

let nama = document.getElementById("nama").value;
if (nama === "") {
    alert("Nama wajib diisi!");
}

let input = document.getElementById("email");
if (input.value === "") {
    input.style.border = "2px solid red";
}

