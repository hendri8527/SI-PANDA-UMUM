<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
  <meta charset="utf-8" />
  <title>SI-PANDA</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/style-metro.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/chosen-bootstrap/chosen/chosen.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2_metro.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/clockface/css/clockface.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-tags-input/jquery.tagsinput.css" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2_metro.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.css" />

  <link href="<?php echo base_url(); ?>assets/css/pages/inbox.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/pages/error.css" rel="stylesheet" type="text/css" />


  <!-- END PAGE LEVEL STYLES -->
  <link rel="shortcut icon" href="favicon.ico" />

  <script src="<?php echo base_url(); ?>assets/scripts/jquery-1.8.3.js"></script>
</head>

<body class="page-header-fixed">
  <!-- BEGIN HEADER -->
  <div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
      <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <a class="brand" href="<?php echo base_url(); ?>ga/home">
          <img src="<?php echo base_url(); ?>assets/img/logo_sistem.png" alt="" />
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
          <img src="<?php echo base_url(); ?>assets/img/menu-toggler.png" alt="" />
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav pull-right">


          <li class="dropdown" id="header_inbox_bar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

              <?php
              $bulan =  date('m', strtotime("+2 month"));
              $bulan1 =  date('m', strtotime("+1 month"));
              $bulan2 =  date('m');
              $tahun = date('Y');
              $query = $this->db->query("select count(id_ga_stnk) as jml from tbl_ga_stnk where year(berlaku_sampai)='$tahun' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') ");

              foreach ($query->result_array() as $tampil) {
                $jumlah2 = $tampil['jml'];
              }
              ?>
              <?php
              if ($jumlah2 != "0") { ?>
                <i class="icon-globe"></i>
                <span class="badge"><?php echo $jumlah2; ?></span>
              <?php
              } else { ?>
                <i class="icon-globe"></i>
              <?php
              }
              ?>

            </a>
            <ul class="dropdown-menu extended inbox">

              <li class="external">
                <a href="<?php echo base_url(); ?>ga/ganti_plat">Penggantian Plat <i class="m-icon-swapright"></i></a>
              </li>
            </ul>
          </li>

          <li class="dropdown" id="header_inbox_bar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

              <?php
              $bulan =  date('m', strtotime("+2 month"));
              $bulan1 =  date('m', strtotime("+1 month"));
              $bulan2 =  date('m');
              $tahun = date('Y');

              $query2 = $this->db->query("select * from tbl_ga_stnk where month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan' ");



              foreach ($query2->result_array() as $value) {

                $status = $value['status_perpanjang_pajak'];
                $id     = $value['id_ga_stnk'];

                $query3 =  $this->db->query("select * from tbl_ga_stnk_perpanjangan_pajak where year(bulan_pajak)='$tahun' and  month(bulan_pajak)='$bulan' and ga_stnk_id='$id' ");

                if ($query3->num_rows() > 0) {
                } else {
                  $this->db->query("update tbl_ga_stnk set status_perpanjang_pajak='1' where id_ga_stnk='$id' ");
                }
              }

              $query = $this->db->query("select count(id_ga_stnk) as jml from tbl_ga_stnk where status_perpanjang_pajak='1' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan')  ");

              foreach ($query->result_array() as $tampil) {
                $jumlah3 = $tampil['jml'];
              }
              ?>
              <?php
              if ($jumlah3 != "0") { ?>
                <i class="icon-globe"></i>
                <span class="badge"><?php echo $jumlah3; ?></span>
              <?php
              } else { ?>
                <i class="icon-globe"></i>
              <?php
              }
              ?>

            </a>
            <ul class="dropdown-menu extended inbox">

              <li class="external">
                <a href="<?php echo base_url(); ?>ga/perpanjang_pajak">Perpanjang Pajak<i class="m-icon-swapright"></i></a>
              </li>
            </ul>
          </li>


          <!-- Notivikasi untuk Expired KIR -->



          <!-- BEGIN USER LOGIN DROPDOWN -->

          <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a></li>
          <!-- END USER LOGIN DROPDOWN -->
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
      </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
  </div>
  <!-- END HEADER -->
  <!-- BEGIN CONTAINER -->
  <div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="page-sidebar-menu">

        <li class="start active">
          <a href="<?php echo base_url(); ?>ga/home">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
            <span class="selected"></span>
          </a>
        </li>

        <li>
          <a class="active" href="javascript:;">

            <span class="title">Data Master</span>
            <span class="arrow "></span>
          </a>
          <ul class="sub-menu">

            <li>
              <a href="<?php echo base_url(); ?>ga/master_type">
                Merek Kendaraan
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>ga/master_jenis">
                Jenis Kendaraan
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>ga/master_pegawai">
                Pegawai
              </a>
            </li>







          </ul>
        <li>
          <a href="<?php echo base_url(); ?>ga/stnk">
            STNK
          </a>
        </li>
        </li>







        <!-- 
            
            <li>
              <a href="<?php echo base_url(); ?>ga/perolehan">
              Perolehan
              </a>
            </li>
             -->





        <li>
          <a href="<?php echo base_url(); ?>ga/laporan_tahun_pembuatan">
            Cetak Data Kebutuhan
          </a>
        </li>






        <li>
          <a href="<?php echo base_url(); ?>ga/laporan_tahun_pajak_stnk">
            Laporan Tahunan PAJAK STNK
          </a>




        <li>
          <a href="<?php echo base_url(); ?>ga/database">
            Backup Database
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out"></i> Sign out</a>

        </li>




      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div id="portlet-config" class="modal hide">
        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button"></button>
          <h3>Widget Settings</h3>
        </div>
        <div class="modal-body">
          Widget settings form goes here
        </div>
      </div>
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
          <div class="span12">

            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <!-- <h3 class="page-title">
              Dashboard
            </h3> -->

            <!-- END PAGE TITLE & BREADCRUMB-->
          </div>
        </div>
        <!-- END PAGE HEADER-->
        <div id="dashboard">



          <?php echo $contents; ?>



        </div>
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
  </div>
  <!-- END CONTAINER -->
  <!-- BEGIN FOOTER -->
  <div class="footer">
    <div class="footer-inner">
      2020 &copy; SI-PANDA
    </div>
    <div class="footer-tools">
      <span class="go-top">
        <i class="icon-angle-up"></i>
      </span>
    </div>
  </div>
  <!-- END FOOTER -->
  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->

  <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
  <!--[if lt IE 9]>
  <script src="assets/plugins/excanvas.min.js"></script>
  <script src="assets/plugins/respond.min.js"></script>  
  <![endif]-->
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/clockface/js/clockface.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>

  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
  <script src="<?php echo base_url(); ?>assets/scripts/ui-modals.js"></script>
  <script src="<?php echo base_url(); ?>assets/scripts/form-components.js"></script>
  <script src="<?php echo base_url(); ?>assets/scripts/table-editable.js"></script>



  <!-- END PAGE LEVEL SCRIPTS -->
  <script>
    jQuery(document).ready(function() {
      // initiate layout and plugins
      App.init();
      UIModals.init();
      FormComponents.init();
      TableEditable.init();


    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>