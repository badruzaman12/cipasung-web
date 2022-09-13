<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Form Update Asrama
 </div>

 <?php foreach($asrama as $asm) : ?>
    <form method="post" action="<?php echo base_url('administraktor/asrama/update_aksi') ?>">

   <div class="form-group">
        <label>Kode Asrama</label>
        <input type="hidden" name="id_asrama" value="<?php echo $asm->id_asrama ?>">
        <input type="text" name="kode_asrama" class="form-control" value="<?php echo $asm->kode_asrama ?>">
</div>

    <div class="form-group">
        <label>Nama Kapasitas</label>
        <input type="text" name="kapasitas_asrama" class="form-control" value="<?php echo $asm->kapasitas_asrama ?>">
</div>

    <div class="form-group">
        <label>Nama Asrama</label>
        <input type="text" name="nama_asrama" class="form-control" value="<?php echo $asm->nama_asrama ?>">
</div>

 <button type="submit" class="btn btn-primary">Simpan</button>
</form>

    <?php endforeach; ?>
</div>