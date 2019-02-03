<!-- MADE BY ROMADHAN EDY PRASETYO - CYBERSOFT RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Realisasi Anggaran BNPB</title>
    <link rel="icon" href="{{ asset('/img/icon.png') }}">

    <script src="{{ asset('/js/app.js"') }}'></script>
    <script src="{{ asset('/js/jquery.js"') }}'></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">    

    <link href="{{ ('materialize/icons/icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.css') }}">
</head>
<body>
    <div id="app">
        <nav class="sidenav" id="sidenav-respons">
            <div class="header brand text-align-center">
                <img src="{{ asset('img/icon.png') }}" class="img-logo">
                <p class="h4">REALISASI ANGGARAN <b>BNPB</b></p>
            </div>
            <div class="menu">
                <a href="{{ url('/') }}" class="child-menu"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#" class="child-menu" onclick="dropdown()"><i class="fas fa-chart-bar"></i> Data</a>
                <div id="child-dropdown" class="child-dropdown hide">
                    <a href="{{ url('kegiatan') }}" class="child-menu dropdown">Kegiatan </a>
                    <a href="{{ url('subKegiatan') }}" class="child-menu dropdown">Sub Kegiatan</a>
                    <a href="{{ url('MAK') }}" class="child-menu dropdown">MAK</a>
                </div>
                <a href="{{ url('penyerapanKeuangan') }}" class="child-menu"><i class="fas fa-money-bill-alt"></i> Penyerapan Keuangan</a>
                <a href="{{ url('realisasiAnggaranBNPB/cetakData') }}" target="_blank" class="child-menu"><i class="fas fa-print"></i> Detail Data</a>
            </div>
        </nav>
        <nav class="topnav">
            <div style="display: flex;">
                <button style="background-color: #38c172;color: #fff;" class="bars" onclick="sidenav()"><i class="fas fa-list"></i> Menu</button>
                @guest
                @else
                <button style="background-color: #0091EA;color: #fff;">{{ substr(Auth::user()->name,0,12) }}</button>
                @endguest
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Keluar</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
        <main class="py-4">
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script>
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
   </script>
</body>
</html>
<!-- MADE BY ROMADHAN EDY PRASETYO - CYBERSOFT RPL SMKN 10 JAKARTA -->