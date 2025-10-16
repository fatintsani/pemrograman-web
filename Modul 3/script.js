function validasiForm() {
  let nama = document.getElementById("nama").value;
  let email = document.getElementById("email").value;
  let pesan = document.getElementById("pesan").value;

  if (nama === "" || email === "" || pesan === "") {
    alert("Semua kolom harus diisi sebelum mengirim!");
    return false; 
  }
  alert("Form berhasil dikirim!");
  return true;
}
