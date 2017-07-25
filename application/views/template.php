<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>@hrd</title>
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/portlets.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/dataTables.bootstrap.css" rel="stylesheet">
  </head>

  <!-- <body style="background-color:#A6F6AF">-->
  <body style="background:url(asset/img/background4.jpg);">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#FFF">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">#HRD</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <!--<li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-alt"></i> Data Master <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!-- <li><a href="?hal=merk"><i class="fa fa-clipboard"></i> Data Merk</a></li> -->
                <li><?php echo anchor('posisi', '<i class="fa fa-clipboard"></i> Data Posisi');?></li>
                <li><?php echo anchor('karyawan', '<i class="fa fa-clipboard"></i> Data Karyawan');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-life-ring"></i> Prosess <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('absensi', 'Absensi');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o"></i> Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('laporan/lap1', '<i class="fa fa-file-text-o"></i> Laporan Absensi / Hari');?></li>
                <li><?php echo anchor('laporan/lap2', '<i class="fa fa-file-text-o"></i> Laporan Absensi / Bulan');?></li>
              </ul>
            </li>
            <!--<li><a href="out.php"><i class="fa fa-sign-out"></i> Logout</a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <?php echo $contents; ?>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; HRD 2017</p>
      </div>
    </footer>
  
    <script src="<?php echo base_url();?>asset/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/jqClock.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>asset/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript">      
        $(function () {
          $("#example1").DataTable();
        });

        $(document).ready(function(){    
          $("#jam").clock({"format":"24","calendar":"false"});
        });
    </script>
    <!-- <script src="asset/js/app.js"></script> -->
  </body>
</html>
