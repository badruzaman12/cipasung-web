<div class="container"></div>

<div class="alert alert-success" role="alert">
<i class="fas fa-home"> </i> Home
  </div>
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang</h4>
  <p>Selamat datang <strong><?php echo $username; ?>
</strong> di Sistem Informasi Akademik Pondok Pesantren Cipasung, Anda login sebagai <strong><?php echo $level; ?></strong></p>
  <hr>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-cogs"></i> Control Panel
</button>
  </div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row"> 
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">SANTRI</p></a>
            <i class="fas fa-3x fa-user-graduate"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Tahun Akademik</p></a>
            <i class="fas fa-3x fa-calendar-alt"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Melihat Raport</p></a>
            <i class="fas fa-3x fa-calendar-alt"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Input Nilai</p></a>
            <i class="fas fa-3x fa-sort-numeric-down"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Cetak Raport</p></a>
            <i class="fas fa-3x fa-print"></i>
          </div>
        </div><hr>

        <div class="row"> 
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Asrama</p></a>
            <i class="fas fa-3x fa-school"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Kelas Pengajian</p></a>
            <i class="fas fa-3x fa-edit"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Identitas</p></a>
            <i class="fas fa-3x fa-id-card-alt"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Katagori</p></a>
            <i class="fas fa-3x fa-list"></i>
          </div>
        </div><hr>

        <div class="row"> 
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Info Pesantren</p></a>
            <i class="fas fa-3x fa-bullhorn"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Tentang Pesantren</p></a>
            <i class="fas fa-3x fa-info-circle"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Fasilitas</p></a>
            <i class="fas fa-3x fa-laptop"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Gallery</p></a>
            <i class="fas fa-3x fa-images"></i>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>