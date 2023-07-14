const fullnameInput = document.getElementById('fullnameInput');
const usernameInput = document.getElementById('usernameInput');
const editProfileButton = document.getElementById('editProfile');

// Simpan nilai input awal saat halaman dimuat
const initialGambarValue = gambarInput.value;
const initialFullnameValue = fullnameInput.value;
const initialUsernameValue = usernameInput.value;

// Periksa perubahan nilai input setiap kali ada input baru
gambarInput.addEventListener('input', checkInputChanges);
fullnameInput.addEventListener('input', checkInputChanges);
usernameInput.addEventListener('input', checkInputChanges);

function checkInputChanges() {
  // Jika nilai input berubah dari nilai awal atau ada file yang dipilih, gunakan warna primary pada button, jika tidak, gunakan warna secondary
  if (fullnameInput.value !== initialFullnameValue || usernameInput.value !== initialUsernameValue || document.getElementById('gambarInput').files.length > 0) {
    editProfileButton.classList.remove('btn-secondary');
    editProfileButton.classList.add('btn-primary');
  } else {
    editProfileButton.classList.remove('btn-primary');
    editProfileButton.classList.add('btn-secondary');
  }
}

// Panggil fungsi checkInputChanges saat halaman dimuat untuk mengatur tampilan awal button
checkInputChanges();


