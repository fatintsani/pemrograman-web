function highlight(input) {
  input.style.backgroundColor = "#f3e5f5";
}

function validateNama() {
  let nama = document.getElementById("nama").value;
  let error = document.getElementById("namaError");
  if (nama.trim() === "") {
    error.textContent = "Nama tidak boleh kosong!";
    return false;
  } else {
    error.textContent = "";
    return true;
  }
}

function validateEmail() {
  let email = document.getElementById("email").value;
  let error = document.getElementById("emailError");
  let regex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!regex.test(email)) {
    error.textContent = "Format email tidak valid!";
    return false;
  } else {
    error.textContent = "";
    return true;
  }
}

function validateUsia() {
  let usia = document.getElementById("usia").value;
  let error = document.getElementById("usiaError");
  if (usia === "" || isNaN(usia) || usia <= 0) {
    error.textContent = "Usia harus berupa angka positif!";
    return false;
  } else {
    error.textContent = "";
    return true;
  }
}

function validateForm() {
  let validNama = validateNama();
  let validEmail = validateEmail();
  let validUsia = validateUsia();

  if (validNama && validEmail && validUsia) {
    alert("Data berhasil dikirim!");
    return true;
  } else {
    alert("Harap isi form dengan benar sebelum mengirim!");
    return false;
  }
}

if (nama.trim() === "") {
  error.textContent = "Nama tidak boleh kosong!";
} else {
  error.textContent = "";
}

let regex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
if (!regex.test(email)) {
  alert("Format email tidak valid!");
}

