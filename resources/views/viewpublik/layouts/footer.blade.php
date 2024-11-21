<style>
    footer {
        background-color: #1f2d3d;
    }

    footer h5 {
        color: #ff7f50;
        margin-bottom: 20px;
    }

    footer ul li a {
        transition: color 0.3s;
    }

    footer ul li a:hover {
        color: #ff5722;
    }

    footer hr {
        border-color: #3c4b5c;
    }

    footer .mdi {
        transition: transform 0.3s;
    }

    footer .mdi:hover {
        transform: scale(1.2);
    }
</style>
<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- Logo dan Nama -->
            <div class="col-lg-3 mb-4">
                <img src="{{ asset('gambar_aset/images/koni.png') }}" alt="Logo KONI Sukoharjo" class="mb-3"
                    style="max-width: 80px;">
                <h4 class="text-white">KONI SUKOHARJO</h4>
                <hr class="text-secondary">
            </div>

            <!-- Menu Navigasi -->
            <div class="col-lg-2 mb-4">
                <h5 class="fw-bold">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-white">Home</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Profil</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Olahraga</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Galeri</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Informasi -->
            <div class="col-lg-2 mb-4">
                <h5 class="fw-bold">Informasi</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-white">Cabang Olahraga</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Atlet</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Pelatih</a></li>
                </ul>
            </div>

            <!-- Situs Terkait -->
            <div class="col-lg-3 mb-4">
                <h5 class="fw-bold">Situs Terkait</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-white">KONI Pusat</a></li>
                    <li><a href="#" class="text-decoration-none text-white">KEMENPORA</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Komite Olimpiade Indonesia</a>
                    </li>
                    <li><a href="#" class="text-decoration-none text-white">Portal Sukoharjo</a></li>
                </ul>
            </div>

            <!-- Syarat & Kebijakan -->
            <div class="col-lg-2 mb-4">
                <h5 class="fw-bold">Syarat & Kebijakan</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-white">Ketentuan Layanan</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Kebijakan Privasi</a></li>
                </ul>
                <!-- Social Media Icons -->
                <div class="mt-3">
                    <a href="https://www.instagram.com/konikabupatensukoharjo/"  class="text-white me-3"><i class="mdi mdi-instagram mdi-24px"></i></a>
                    <a href="#" class="text-white"><i class="mdi mdi-youtube mdi-24px"></i></a>
                </div>
            </div>
        </div>
        <hr class="text-secondary">
        <!-- Footer Bottom -->
        <div class="text-center">
            <small>Developed By <a href="#"
                    class="text-white text-decoration-none">kominfosukoharjo.com</a></small>
        </div>
    </div>
</footer>
