<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/img/logo_fh.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Fakultas Hukum</p>
          <p>Universitas Suryakancana</p>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
<?php
  if ($this->session->role == 0) { // ROLE ADMIN
?>
        <li class="treeview">
          <a href="<?=base_url()?>mahasiswa/profil">
            <i class="fa fa-files-o"></i>
            <span>Profil</span>
          </a>
        </li>
<?php
  } elseif ($this->session->role == 1) { // ROLE MAHASISWA
?>
        <li class="treeview">
          <a href="<?=base_url()?>mahasiswa/profil">
            <i class="fa fa-user"></i>
            <span>Profil</span>
          </a>
        </li>

        <?php
          if ($krs == TRUE) {
        ?>

        <li class="treeview">
          <a href="<?=base_url()?>mahasiswa/krs">
            <i class="fa fa-send"></i>
            <span>Perwalian</span>
          </a>
        </li>

        <?php } ?>
        
        <li class="treeview">
          <a href="<?=base_url()?>mahasiswa/perkuliahan">
            <i class="fa fa-mortar-board"></i>
            <span>Perkuliahan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Nilai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Semester</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Kumulatif</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?=base_url()?>mahasiswa/administrasi">
            <i class="fa fa-files-o"></i>
            <span>Administrasi</span>
          </a>
        </li>

<?php
  } elseif ($this->session->role == 2) { // ROLE DOSEN
?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Profil</span>
          </a>
        </li>

<?php
  } elseif ($this->session->role == 3) { // ROLE BAGIAN KEUANGAN
?>
      
        <li id="baadashboard">
          <a href="<?=base_url()?>baa/">
            <i class="fa fa-files-o"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li id="baaprofil">
          <a href="<?=base_url()?>baa/profil">
            <i class="fa fa-files-o"></i>
            <span>Profil</span>
          </a>
        </li>
        <li id="baaregister">
          <a href="<?=base_url()?>baa/registrasi">
            <i class="fa fa-files-o"></i>
            <span>Registrasi</span>
          </a>
        </li>
        <li id="baapembayaran">
          <a href="<?=base_url()?>baa/pembayaran">
            <i class="fa fa-files-o"></i>
            <span>Pembayaran Mahasiswa</span>
          </a>
        </li>

<?php
  } elseif ($this->session->role == 4) { // ROLE BAGIAN AKADEMIK
?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Profil</span>
          </a>
        </li>

<?php
  }
?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<script type="text/javascript">
  var role = '<?=$this->session->role?>';
  var uri = '<?=$this->uri->segment(2)?>';
</script>