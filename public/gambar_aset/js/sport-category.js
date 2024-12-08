// public/js/sport-category.js

// Daftar kategori olahraga
const sportCategories = [
    "Semua","Badminton", "Sepak Bola", "Bola Basket", "Bola Voli",
    "Balap Sepeda", "Atletik", "Renang", "Tinju", "Pencak Silat","Futsal","Catur","Tenis Meja"
  ];

  // Simulate the Auth user and coach object (you would typically get this data from the server)
const authUser = {
  level: 'Pengurus Cabor Sepak Bola' // Example user level, this should come from your actual session
};

const coach = {
  sport_category: 'Sepak Bola' // Example sport category, this should come from your actual data
};

// Fungsi untuk mengecek akses pengguna berdasarkan level dan kategori olahraga
function canAccessSportCategory(userLevel, coachCategory) {
  if (userLevel === 'Admin') {
    return true;
  }

  const sportCategoryAccess = {
    'Pengurus Cabor Sepak Bola': 'Sepak Bola',
    'Pengurus Cabor Badminton': 'Badminton',
    'Pengurus Cabor Bola Voli': 'Bola Voli',
    'Pengurus Cabor Bola Basket': 'Bola Basket',
    'Pengurus Cabor Atletik': 'Atletik',
    'Pengurus Cabor Renang': 'Renang',
    'Pengurus Cabor Tinju': 'Tinju',
    'Pengurus Cabor Futsal': 'Futsal',
    'Pengurus Cabor Pencak Silat': 'Pencak Silat'
  };

  return userLevel === 'Pengurus Cabor ' + coachCategory && sportCategoryAccess[userLevel] === coachCategory;
}
  
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
  
  const sportCategoryCount = sportCategories.length;

// Tampilkan jumlah kategori di elemen dashboard jika ada
document.addEventListener("DOMContentLoaded", () => {
    const categoryCountElement = document.getElementById('sportCategoryCount');
    if (categoryCountElement) {
        categoryCountElement.textContent = sportCategoryCount;
    }
});

