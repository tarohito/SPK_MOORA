<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>PBS - Penilaian Kinerja Karyawan</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="assets/favicon.ico">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
   <!-- site css -->
   <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
   <!-- responsive css -->
   <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">
   <!-- color css -->
   <!-- <link rel="stylesheet" href="assets/css/color_2.css" /> -->
   <!-- select bootstrap -->
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.css') ?>">
   <!-- scrollbar css -->
   <link rel="stylesheet" href="<?= base_url('assets/css/perfect-scrollbar.css') ?>">
   <!-- custom css -->
   <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"> -->
   <link href="assets/DataTables/datatables.min.css" rel="stylesheet">


</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar_blog_1">
               <div class="sidebar-header">
                  <div class="logo_section">
                     <a href="/"><img class="logo_icon img-responsive" src="<?= base_url('assets/images/logo/logo_icon.png') ?>"></a>
                  </div>
               </div>
               <div class="sidebar_user_info">
                  <div class="icon_setting"></div>
                  <div class="user_profle_side">
                     <div class="user_img"><img class="img-responsive" src="<?= base_url('assets/images/layout_img/user_img.jpg') ?>">
                     </div>
                     <div class="user_info">
                        <h6>Administrator</h6>
                        <p><span class="online_animation"></span> Online</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar_blog_2">
               <h4>Menu Utama</h4>
               <ul class="list-unstyled components">
                  <li><a href="/"><i class="fa fa-dashboard orange_color"></i> <span>Dashboard</span></a></li>
                  <li><a href="data_karyawan"><i class="fa fa-group purple_color2"></i> <span>Data Karyawan</span></a></li>
                  <li> <a href="kriteria_penilaian"><i class="fa fa-pencil yellow_color"></i> <span>Kriteria Penilaian</span></a></li>
                  <li> <a href="sub_kriteria"><i class="fa fa-paper-plane red_color"></i> <span>Sub Kriteria</span></a></li>
                  <li><a href="sub_kriteria"><i class="fa fa-table blue1_color"></i> <span>Data Training</span></a></li>
                  <li><a href="settings.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Hasil Penilaian</span></a></li>
               </ul>
            </div>
         </nav>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <div class="topbar">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full">
                     <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                     <div class="logo_section">
                        <a href="/"><img class="img-responsive" src="<?= base_url('assets/images/logo/logo.png') ?>"></a>
                     </div>
                     <div class=" right_topbar">
                        <div class="icon_info">
                           <ul class="user_profile_dd">
                              <li>
                                 <a class="dropdown-toggle" data-toggle="dropdown">
                                    <img class="img-responsive rounded-circle" src="<?= base_url('assets/images/layout_img/user_img.jpg') ?>">
                                    <span class="name_user">Administrator</span>
                                 </a>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profil">Profil</a>
                                    <a class="dropdown-item" href="<?= site_url('logout') ?>">Keluar</a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <?= $this->renderSection('content') ?>
            </div>
            <!-- end dashboard inner -->
         </div>
      </div>
   </div>

   <!-- jQuery -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/DataTables/datatables.min.js"></script>
   <!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> -->

   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="assets/js/animate.js"></script>
   <!-- select country -->
   <script src="assets/js/bootstrap-select.js"></script>
   <!-- owl carousel -->
   <!-- <script src="assets/js/owl.carousel.js"></script> -->
   <!-- chart js -->
   <!-- <script src="assets/js/Chart.min.js"></script> -->
   <!-- <script src="assets/js/Chart.bundle.min.js"></script> -->
   <script src="assets/js/utils.js"></script>
   <!-- <script src="assets/js/analyser.js"></script> -->
   <!-- nice scrollbar -->
   <!-- <script src="assets/js/perfect-scrollbar.min.js"></script> -->
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="assets/js/custom.js"></script>
   <!-- <script src="assets/js/chart_custom_style1.js"></script> -->
   <script type="text/javascript">
      let table = new DataTable('#myTable', {
         responsive: true
      });
   </script>

   <script>
      function confirmToDelete(el) {
         $("#delete-button").attr("href", el.dataset.href);
         $("#confirm-dialog").modal('show');
      }
   </script>

   <script>
      // Fungsi untuk mengarahkan ke form tambah data saat tombol "Tambah Data" ditekan
      function scrollToForm() {
         // Menggunakan jQuery untuk animasi scroll ke elemen dengan ID formTambahData
         $('html, body').animate({
            scrollTop: $('#formTambahData').offset().top
         }, 1000); // Durasi animasi dalam milidetik (ms)
      }
   </script>

</body>

</html>