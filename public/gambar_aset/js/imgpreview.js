function previewImage() {
  const fileInput = document.getElementById('gambar');
  const preview = document.getElementById('preview');
  
  if (fileInput.files && fileInput.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.classList.remove('d-none');
    };
    reader.readAsDataURL(fileInput.files[0]);
  }
}