<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Struktural Koni</title>
    <style type="text/css">
        /*Now the CSS*/
    * {margin: 0; padding: 0;}
    .tree {
    display: flex;
    justify-content: center; /* Centers horizontally */
    padding: 20px;
}

    
    .tree ul {
        padding-top: 20px; position: relative;
        
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }
    
    .tree li {
        float: left; text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }
    
    /*We will use ::before and ::after to draw the connectors*/
    .tree li::before, .tree li::after{
        content: '';
        position: absolute; top: 0; right: 50%;
        border-top: 1px solid #ccc;
        width: 50%; height: 20px;
    }
    .tree li::after{
        right: auto; left: 50%;
        border-left: 1px solid #ccc;
    }
    
    /*We need to remove left-right connectors from elements without 
    any siblings*/
    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }
    
    /*Remove space from the top of single children*/
    .tree li:only-child{ 
        padding-top: 0;
    }
    
    /*Remove left connector from first child and 
    right connector from last child*/
    .tree li:first-child::before, .tree li:last-child::after{
        border: 0 none;
    }
    /*Adding back the vertical connector to the last nodes*/
    .tree li:last-child::before{
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }
    .tree li:first-child::after{
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }
    
    /*Time to add downward connectors from parents*/
    .tree ul ul::before{
        content: '';
        position: absolute; top: 0; left: 50%;
        border-left: 1px solid #ccc;
        width: 0; height: 20px;
    }
    
    .tree li a{
        border: 1px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        display: inline-block;
        
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }
    
    /*Time for some hover effects*/
    /*We will apply the hover effect the the lineage of the element also*/
    .tree li a:hover, .tree li a:hover+ul li a {
        background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
    }
    /*Connector styles on hover*/
    .tree li a:hover+ul li::after, 
    .tree li a:hover+ul li::before, 
    .tree li a:hover+ul::before, 
    .tree li a:hover+ul ul::before{
        border-color:  #94a0b4;
    }
    </style>
</head>

<body>
    <table style="width: 100%; border-bottom: 4px solid #000000;">
        <tr>
            <td style="width: 15%; border: none;">
                <img src="{{ asset('gambar_aset/images/koni.png') }}" alt="Logo KONI Sukoharjo"
                    style="width: 100px; height: auto;"> <!-- Adjust size as needed -->
            </td>
            <td style="text-align: center; border: none;">
                <h2 style="margin: 0;">Komite Olahraga Nasional Indonesia (KONI)</h2>
                <p style="margin: 0;">Sukoharjo</p>
                <p style="margin: 0;">Alamat: Jl. Contoh Alamat No. 123, Sukoharjo, Indonesia</p>
                <p style="margin: 0;">Telepon: (0271) 1234567 | Email: info@koni-sukoharjo.org</p>
            </td>
            <td style="width: 15%; border: none;">
            </td>
        </tr>
    </table>

    <!-- Main Content -->
    <div class="content">
        <h2 style="text-align: center">Struktural Koni Sukoharjo</h2>
        <p style="text-align: center; font-size:14px;">Tanggal: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        <div class="tree">
            <ul>
                <li><a class='link' href='#'>Ketua Umum<br> <img style='width:50px; border-radius:40px'
                            src='{{ asset('gambar_aset/images/koni.png') }}'><br>{{ $konistructures->firstWhere('position', 'Ketua Umum')->name ?? 'Anu' }}</a>
                    <ul>
                        <li>
                            <a class='link' href='#'>Wakil Ketua Umum I<br> <img style='width:50px; border-radius:40px'
                                    src='{{ asset('gambar_aset/images/koni.png') }}'><br>{{ $konistructures->firstWhere('position', 'Wakil Ketua Umum I')->name ?? 'Anu' }}
                                </a>
                            <ul>
                                <li>
                                    <a class='link' href='#'>Jabatan<br> <img
                                            style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            
                            <ul>
                                <li><a class='link' href='#'>Jabatan<br> <img
                                            style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a></li>
                                <li>
                                    <a class='link' href='#'>Jabatan<br> <img
                                            style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a>
                                    <ul>
                                        <li>
                                            <a class='link' href='#'>Jabatan<br> <img
                                                    style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a>
                                        </li>
                                        <li>
                                            <a class='link' href='#'>Jabatan<br> <img
                                                    style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a>
                                        </li>
                                        <li>
                                            <a class='link' href='#'>Jabatan<br> <img
                                                    style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class='link' href='#'>Jabatan<br> <img
                                            style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class='link' href='#'>Wakil Ketua Umum 2<br> <img style='width:50px; border-radius:40px'
                                    src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a>
                            <ul>
                                <li>
                                    <a class='link' href='#'>Jabatan<br> <img
                                            style='width:50px; border-radius:40px' src='{{ asset('gambar_aset/images/koni.png') }}'><br>Anu</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    {{-- <div class="footer">
        <p>&copy; 2024 KONI Sukoharjo. All rights reserved.</p>
    </div> --}}

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
