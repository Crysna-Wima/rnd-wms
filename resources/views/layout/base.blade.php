<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>wms</title>

    <!-- Custom fonts for this template -->
    <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('/your-path-to-fontawesome/css/all.css')}}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ url('https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

     <!-- Topbar -->
     <nav class="navbar navbar-expand navbar-light bg-info text-light topbar static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
        </form>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="text-decoration: none; color: rgb(255, 255, 255)">
            <div class="" style="font-size: larger"><b>GRAHA SARANA GRESIK</b></div>
        </a>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
                
            <span class="mr-2 d-none d-lg-inline text-white my-auto" id="time"></span>         

            <script>
                function realtime() {
                    var tanggallengkap = new String();
                    var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
                    namahari = namahari.split(" ");
                    var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
                    namabulan = namabulan.split(" ");
                    var tgl = new Date();
                    var hari = tgl.getDay();
                    var tanggal = tgl.getDate();
                    var bulan = tgl.getMonth();
                    var tahun = tgl.getFullYear();
                    var s = tgl.getSeconds();
                    var m = tgl.getMinutes();
                    var h = tgl.getHours();
                    tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun + "<br>" + ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2) + " WIB";

                    document.getElementById("time").innerHTML = tanggallengkap;
                    setTimeout("realtime()", 1000);
                }
                realtime();
            </script>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-white small">CRYSNA</span>
                    <img class="img-profile rounded-circle"
                        src="{{url('assets/img/undraw_profile.svg')}}">
                        <i class='bx bx-chevron-down text-white'></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('logout')}}" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>
    </nav>
    <!-- End of Topbar -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-white text-white sidebar shadow" id="accordionSidebar">
            <div class="sidebar-search m-3">
                <div>
                  <div class="input-group">
                    <input type="text" class="form-control search-menu" placeholder="Search...">
                    <div class="input-group-append">
                      <span class="input-group-text bg-info">
                        <i class="fa fa-search text-white" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class='bx bxs-dashboard custom-link'></i>
                    <span class="custom-link p-2">Dashboard</span></a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed custom-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class='bx bx-table custom-link'></i>
                    <span class="custom-link p-2">Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tables :</h6>
                        <a class="collapse-item" href="/transtype">Transtype</a>
                        <a class="collapse-item" href="/company">Company</a>
                        <a href="/warehouse" class="collapse-item">Warehouse</a>
                        <a href="/storagefacility" class="collapse-item">Storage Facility</a>
                        <a href="/storagebin" class="collapse-item">Storage Bin</a>
                        <a href="/uom" class="collapse-item">UOM</a>
                        <a href="/materialgroup" class="collapse-item">Material Group</a>
                        <a href="/stockstatus" class="collapse-item">Stock Status</a>
                        <a href="/material" class="collapse-item">Material</a>
                        <a href="/movement" class="collapse-item">Movement</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            @include('sweetalert::alert')
            @yield('tables')
            <!-- Main Content -->
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-info text-white">
                <div class="container my-auto">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-1">
                                    <i class='bx bx-location-plus h3'></i>
                                </div>
                                <div class="col-sm">
                                    <span class="h5 my-auto bx">Alamat : Jl. R.A Kartini, Gresik</span>
                                </div>
                            </div>   
                        </div>
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-1">
                                    <i class='bx bxs-phone h3'></i>
                                </div>
                                <div class="col-sm">
                                    <span class="h5 my-auto bx">Telephone : 031-0013 4567 678</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-1">
                                    <i class='bx bxl-whatsapp h3'></i>
                                </div>
                                <div class="col-sm">
                                    <span class="h5 my-auto bx">Whatsapp : 0810013456</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm h3 text-right">
                            <a href="#"><i class='bx bxl-twitter text-white' ></i></a>
                            <a href="#"><i class='bx bxl-facebook text-white'></i></a>
                            <a href="#"><i class='bx bxl-linkedin text-white' ></i></a>
                            <a href="#"><i class='bx bxl-instagram text-white' ></i></a>
                        </div>
                    </div>         
                </div>
            </footer>
            <!-- End of Footer -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- Hapus Modal --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5>Apakah anda yakin ingin menghapusnya?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger">Hapus</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-link{
            font-size: larger;
            color: rgb(0, 0, 0);
        }
        #myInput {
            background-image: url('/css/searchicon.png'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 80%; /* Full-width */
            font-size: medium; /* Increase font-size */
            padding: 1px 2px 1px 4px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
            margin-top: 10px;
            margin-right: 3px;
            margin-left: 3px;
        }
    </style>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>
    <script>
        function myFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            } else {
            li[i].style.display = "none";
            }
        }
        }
</script>
    </script>
    

</body>
</html>