<div class="container-fluid">


<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Form Input Asrama
 </div>

    <form method="post" action="<?php echo base_url('administraktor/asrama/input_aksi') ?>">
       <div class="form-group">
        <label>Kode Asrama</label>
        <Input type="text" name="kode_asrama" 
        placeholder="Masukan Kode Asrama" class="form-control">
        <?php echo form_error('kode_asrama','<div class="text-danger small" ml-3>') ?>
       </div>

       <div class="form-group">
        <label>Kapasitas Asrama</label>
        <Input type="text" name="kapasitas_asrama" 
        placeholder="Masukan Kapasitas Asrama" class="form-control">
        <?php echo form_error('kapasitas_asrama','<div class="text-danger small" ml-3>') ?>
       </div>

       <div class="form-group">
        <label>Nama Asrama</label>
        <Input type="text" name="nama_asrama" 
        placeholder="Masukan Nama Asrama" class="form-control">
        <?php echo form_error('nama_asrama','<div class="text-danger small" ml-3>') ?>
       </div>

       <button type="submit" class="btn btn-primary">Simpan</button>
    </from>
</div>