<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{asset('assetku/img/logo.png')}}" type="image/png" />
    <title>STMIK Banjarbaru</title>

    <link href="{{asset('assetku/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assetku/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('assetku/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('assetku/lib/jquery-toggles/toggles-full.css')}}" rel="stylesheet">
    <link href="{{asset('assetku/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assetku/css/amanda.css')}}">

    {{-- swith alert  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- datatables jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" type=""></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
</head>

<body>

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
            <a href="index.html" class="am-logo">STMIK Bjb</a>
        </div>

        <div class="am-header-right">

            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <img src="{{asset('assetku/img/img3.jpg')}}" class="wd-32 rounded-circle" alt="">
                    <span class="logged-name"><span class="hidden-xs-down">{{ Auth::user()->name }}</span> <i class="fa fa-angle-down mg-l-3"></i></span>
                </a>
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href="{{route('logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </div><!-- am-header-right -->
    </div><!-- am-header -->

    <div class="am-sideleft">
        <ul class="nav am-sideleft-tab">
            <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link"><i class="icon ion-ios-home-outline tx-24">sss</i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"></a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="mainMenu" class="tab-pane active">

                <style>
                    .warna_link_aktive {
                        color: orange !important;
                        font-weight: bolder;
                    }
                </style>
                <ul class="nav am-sideleft-menu">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link {{Request::is('/') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>home</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('barang.index')}}" class="nav-link {{Request::is('barang') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>data barang</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('suplier.index')}}" class="nav-link {{Request::is('suplier') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>data suplier</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pembeli.tampil')}}" class="nav-link {{Request::is('pembeli') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>data pembeli</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('user.tampil')}}" class="nav-link {{Request::is('user') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>data user</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('pesanan.tampil')}}" class="nav-link {{Request::is('pesanan') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>data pesanan</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pembelian.tampil')}}" class="nav-link {{Request::is('pembelian') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>data pembelian</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('note.index')}}" class="nav-link {{Request::is('note') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>data catatan</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('doa')}}" class="nav-link {{Request::is('doa') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>doa</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('books.api')}}" class="nav-link {{Request::is('books') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Api Books</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('kamus.api')}}" class="nav-link {{Request::is('/kamus') ? 'active warna_link_aktive' : ''}}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>kamus</span>
                        </a>
                    </li>




                    <!-- nav-item -->
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub">
                            <i class="icon ion-ios-gear-outline"></i>
                            <span>Forms</span>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
                            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
                            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
                            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
                            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
                        </ul>
                    </li><!-- nav-item -->
                </ul>
            </div><!-- #mainMenu -->
        </div><!-- tab-content -->
    </div><!-- am-sideleft -->

    <div class="am-mainpanel">
        <div class="am-pagetitle">
            <h5 class="am-title">{{isset ($judul) ? ($judul) : ""}}</h5>
        </div>
        <div class="am-pagebody">

            @yield('konten')

        </div>




    </div>

    <script src="{{asset('assetku/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('assetku/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('assetku/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('assetku/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('assetku/lib/jquery-toggles/toggles.min.js')}}"></script>
    <script src="{{asset('assetku/lib/d3/d3.js')}}"></script>
    <script src="{{asset('assetku/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="{{asset('assetku/lib/gmaps/gmaps.js')}}"></script>
    <script src="{{asset('assetku/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assetku/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assetku/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assetku/lib/flot-spline/jquery.flot.spline.js')}}"></script>

    <script src="{{asset('assetku/js/amanda.js')}}"></script>
    <script src="{{asset('assetku/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('assetku/js/dashboard.js')}}"></script>

    {{-- data tables jquey --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new DataTable('#example');
    });
</script>

</html>