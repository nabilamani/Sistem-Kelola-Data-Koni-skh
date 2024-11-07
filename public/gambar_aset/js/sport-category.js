// public/js/sport-category.js

// Daftar kategori olahraga
const sportCategories = [
    "Badminton", "Sepak Bola", "Bola Basket", "Bola Voli",
    "Balap Sepeda", "Atletik", "Renang", "Tinju", "Pencak Silat"
  ];
  
  // Fungsi untuk mengisi elemen select dengan kategori olahraga
  function populateSportCategorySelect(selectId) {
    const selectElement = document.getElementById(selectId);
    if (selectElement) {
      sportCategories.forEach(category => {
        const option = document.createElement('option');
        option.value = category;
        option.textContent = category;
        selectElement.appendChild(option);
      });
    }
  }
  
  // Panggil fungsi untuk setiap dropdown setelah konten dimuat
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.sport-category-select').forEach(select => {
      populateSportCategorySelect(select.id);
    });
  });
  