window.addEventListener('load', () => {
    alert("Selamat datang di Web Sederhana!");
});

const form = document.getElementById('contactForm');
form.addEventListener('submit', function(e) {
    e.preventDefault(); 

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if(name && email && message) {
        alert("Terima kasih " + name + ", pesan Anda telah dikirim!");
        form.reset();
    } else {
        alert("Mohon isi semua field sebelum mengirim.");
    }
});
