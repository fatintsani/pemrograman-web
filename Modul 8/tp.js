function validateForm() {
let nama = document.forms["myForm"]["nama"].value;
if (nama == "") {
alert("Nama harus diisi!");
return false;
}
}
