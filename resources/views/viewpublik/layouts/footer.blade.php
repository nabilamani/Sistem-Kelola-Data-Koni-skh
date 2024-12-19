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
            <div class="col-6 col-lg-2 mb-4">
                <h5 class="fw-bold">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-decoration-none text-white">Home</a></li>
                    <li><a href="/profil/tentang" class="text-decoration-none text-white">Profil</a></li>
                    <li><a href="/olahraga/cabor" class="text-decoration-none text-white">Olahraga</a></li>
                    <li><a href="/galeri/foto" class="text-decoration-none text-white">Galeri</a></li>
                    <li><a href="/kontak" class="text-decoration-none text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Informasi -->
            <div class="col-6 col-lg-2 mb-4">
                <h5 class="fw-bold">Informasi</h5>
                <ul class="list-unstyled">
                    <li><a href="/olahraga/cabor" class="text-decoration-none text-white">Cabang Olahraga</a></li>
                    <li><a href="olahraga/atlet" class="text-decoration-none text-white">Atlet</a></li>
                    <li><a href="/olahraga/pelatih" class="text-decoration-none text-white">Pelatih</a></li>
                </ul>
            </div>

            <!-- Situs Terkait -->
            <div class="col-6 col-lg-3 mb-4">
                <h5 class="fw-bold">Situs Terkait</h5>
                <ul class="list-unstyled">
                    <li><a href="https://koni.or.id/" target="_blank" class="text-decoration-none text-white">KONI
                            Pusat</a></li>
                    <li><a href="https://www.kemenpora.go.id/" target="_blank"
                            class="text-decoration-none text-white">KEMENPORA</a></li>
                    <li><a href="https://nocindonesia.id/" target="_blank"
                            class="text-decoration-none text-white">Komite Olimpiade Indonesia</a>
                    </li>
                    <li><a href="https://portal.sukoharjokab.go.id/" target="_blank"
                            class="text-decoration-none text-white">Portal Sukoharjo</a></li>
                </ul>
            </div>

            <!-- Syarat & Kebijakan -->
            <div class="col-6 col-lg-2 mb-4">
                <h5 class="fw-bold">Syarat & Kebijakan</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-white" data-bs-toggle="modal"
                            data-bs-target="#termsModal">Ketentuan Layanan</a></li>
                    <li><a href="#" class="text-decoration-none text-white" data-bs-toggle="modal"
                            data-bs-target="#privacyModal">Kebijakan Privasi</a></li>
                </ul>
                <!-- Social Media Icons -->
                <div class="mt-3">
                    <a href="https://www.instagram.com/konikabupatensukoharjo/" target="_blank" class="text-white me-3"><i
                            class="mdi mdi-instagram mdi-24px"></i></a>
                    <a href="#" class="text-white"><i class="mdi mdi-youtube mdi-24px"></i></a>
                </div>
            </div>
        </div>
        <hr class="text-secondary">
        <!-- Footer Bottom -->
        <div class="text-center">
            <small>Developed By <a href="https://diskominfo.sukoharjokab.go.id/" target="_blank"
                    class="text-white text-decoration-none">kominfosukoharjo.com</a></small>
        </div>
    </div>
    <!-- Modal for Privacy Policy -->
    <div class="modal fade mt-4" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center bg-dark">
                    <h5 class="modal-title" id="privacyModalLabel">Kebijakan Privasi KONI Sukoharjo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>

                <div class="modal-body">
                    <h5>Cabang Olahraga</h5>
                    <p class="text-dark">Hal yang tidak bisa dipisahkan dari KONI, maka dari itu disini kami
                        merangkum semua
                        cabang olahraga yang tersedia pada KONI Sukoharjo. Cabang Olahraga adalah hal yang tidak
                        bisa dipisahkan dari KONI, maka dari itu disini kami merangkum semua cabang olahraga
                        yang tersedia pada KONI Sukoharjo...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Terms and Conditions -->
    <div class="modal fade mt-4" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center bg-dark">
                    <h5 class="modal-title" id="termsModalLabel">Ketentuan Layanan KONI Sukoharjo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Ketentuan Layanan</h5>
                    <p class="text-dark">Ketentuan layanan yang mengatur hak dan kewajiban antara pihak pengguna dan
                        KONI Sukoharjo dalam
                        menggunakan layanan yang disediakan. Ketentuan ini mencakup kewajiban-kewajiban, hak-hak, dan
                        pembatasan yang harus dipatuhi selama menggunakan layanan dari KONI Sukoharjo...</p>
                </div>
            </div>
        </div>
    </div>
</footer>
