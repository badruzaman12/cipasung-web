<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Form Update Identitas
 </div>

 <?php foreach($identitas as $id) : ?>
    <form method="post" action="<?php echo base_url('administraktor/identitas/update_aksi') ?>">

   <div class="form-group">
        <label>Judul Website</label>
        <input type="hidden" name="id_identitas" class="form-control" value="<?php echo $id->id_identitas ?>">
        <input type="text" name="nama_website" class="form-control" value="<?php echo $id->nama_website ?>">
</div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $id->alamat ?>">
</div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $id->email ?>">
</div>

<div class="form-group">
        <label>No. Telepon</label>
        <input type="text" name="telepon" class="form-control" value="<?php echo $id->telepon ?>">
</div>

 <button type="submit" class="btn btn-primary">Simpan</button>
</form>

    <?php endforeach; ?>
</div>