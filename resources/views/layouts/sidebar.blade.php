<div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label my-2">Menu Cabor</li>
                    <li><a class="shadow" href="/dashboard" aria-expanded="false"><i class="mdi mdi-home"></i><span class="nav-text">Dashboard</span></a></li>
                    <li><a class="has-arrow shadow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-soccer"></i><span class="nav-text">Data Cabor</span></a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-human-male"></i><span class="nav-text">Pelatih</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/coaches/create"><i class="mdi mdi-account-plus"></i>Tambah Pelatih</a></li>
                                    <li><a href="/coaches"><i class="mdi mdi-account-multiple"></i>Daftar Pelatih</a></li>
                                    <li><a href="{{ route('cetak-pelatih')}}"><i class="mdi mdi-file-document"></i>Laporan</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-run-fast"></i><span class="nav-text">Atlet</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/athletes/create"><i class="mdi mdi-account-plus"></i>Tambah Atlet</a></li>
                                    <li><a href="/athletes"><i class="mdi mdi-account-multiple"></i>Daftar Atlet</a></li>
                                    <li><a href="{{ route('cetak-athlete') }}"><i class="mdi mdi-file-document"></i>Laporan</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-whistle"></i><span class="nav-text">Wasit</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/referees/create"><i class="mdi mdi-account-plus"></i>Tambah Wasit</a></li>
                                    <li><a href="/referees"><i class="mdi mdi-account-multiple"></i>Daftar Wasit</a></li>
                                    <li><a href="/daftar"><i class="mdi mdi-file-document"></i>Laporan</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-trophy"></i><span class="nav-text">Prestasi</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/achievements/create"><i class="mdi mdi-trophy-outline"></i>Tambah Prestasi</a></li>
                                    <li><a href="/achievements"><i class="mdi mdi-trophy-variant"></i>Daftar Prestasi</a></li>
                                    <li><a href="/daftar"><i class="mdi mdi-file-document"></i>Laporan</a></li>
                                </ul>
                            </li>
                            
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="nav-text">Lokasi</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/tambah"><i class="mdi mdi-map-marker-plus"></i>Tambah Lokasi</a></li>
                                    <li><a href="/daftar"><i class="mdi mdi-map-marker-multiple"></i>Daftar Lokasi</a></li>
                                    <li><a href="/daftar"><i class="mdi mdi-file-document"></i>Laporan</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-calendar"></i><span class="nav-text">Event</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/events/create"><i class="mdi mdi-calendar-plus"></i>Tambah Event</a></li>
                                    <li><a href="/events"><i class="mdi mdi-calendar-multiple"></i>Daftar Event</a></li>
                                    <li><a href="{{ route('cetak-event') }}"><i class="mdi mdi-file-document"></i>Laporan</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-account-group"></i><span class="nav-text">Struktural Cabor</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/tambah"><i class="mdi mdi-account-edit"></i>Update Struktural</a></li>
                                    <li><a href="/daftar"><i class="mdi mdi-account-multiple"></i>Daftar Struktural</a></li>
                                    <li><a href="/daftar"><i class="mdi mdi-file-document"></i>Laporan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                
                    <li class="nav-label">Menu Admin</li>
                    
                    
                    @if (auth()->user()->level === 'Admin' )
                    <li><a class="has-arrow shadow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="nav-text">Berita</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/beritas/create"><i class="mdi mdi-plus-box"></i>Tambah Berita</a></li>
                            <li><a href="/beritas"><i class="mdi mdi-newspaper"></i>Daftar Berita</a></li>
                            <li><a href="/exportpeny"><i class="mdi mdi-file-export"></i>Laporan</a></li>
                        </ul>
                    </li>
                
                    <li><a class="has-arrow shadow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-image"></i><span class="nav-text">Galeri</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/tambahpem"><i class="mdi mdi-image-plus"></i>Tambah Data Galeri</a></li>
                            <li><a href="/daftarpem"><i class="mdi mdi-image-multiple"></i>Daftar Galeri</a></li>
                            <li><a href="/exportpem"><i class="mdi mdi-file-export"></i>Laporan</a></li>
                        </ul>
                    </li>
                
                    <li><a class="has-arrow shadow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-office-building"></i><span class="nav-text">Struktural Koni</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/konistructures/create"><i class="mdi mdi-plus-box"></i>Tambah Data Struktural</a></li>
                            <li><a href="/konistructures"><i class="mdi mdi-account-group"></i>Daftar Struktural Koni</a></li>
                            <li><a href="/exportpem"><i class="mdi mdi-file-export"></i>Laporan</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow shadow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="nav-text">Akun</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/tambahpem"><i class="mdi mdi-account-multiple-plus"></i>Tambah Akun</a></li>
                            <li><a href="/daftarpem"><i class="mdi mdi-account-multiple"></i>Daftar Akun</a></li>
                        </ul>
                    </li>
                    @endif
                
                    <li class="nav-label">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout"></i> Logout
                        </a>
                
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                
            </div>


        </div>