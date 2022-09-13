<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Form Update Tahun Akademik
 </div>

 <?php foreach($tahun_akademik as $ta) : ?>
    <form method="post" action="<?php echo base_url('administraktor/tahun_akademik/update_aksi') ?>">

   <div class="form-group">
        <label>tahun_akademik</label>
        <input type="hidden" name="id_tahun" value="<?php echo $ta->id_tahun ?>">
        <input type="text" name="tahun_akademik" class="form-control" value="<?php echo $ta->tahun_akademik ?>">
</div>

<div class="form-group">
        <label>Semester</label>
        <select name="semester" class="form-control">
            <option <?php echo ($ta->kelas == 'Ganjil')?'selected="selected"':'';?>>Ganjil</option>
            <option <?php echo ($ta->kelas == 'Genap')?'selected="selected"':'';?>>Genap</option>
        </select>
            
</div>

<div class="form-group">
        <label>Kelas Pengajian</label>
        <select name="kelas" class="form-control" value="<?php echo $ta->kelas ?>">
            <option <?php echo ($ta->kelas == 'Dasar')?'selected="selected"':'';?>>Dasar</option>
            <option <?php echo ($ta->kelas == 'Persiapan')?'selected="selected"':'';?>>Persiapan</option>
            <option <?php echo ($ta->kelas == '1')?'selected="selected"':'';?>>1</option>
            <option <?php echo ($ta->kelas == '2')?'selected="selected"':'';?>>2</option>
            <option <?php echo ($ta->kelas == '3')?'selected="selected"':'';?>>3</option>
        </select>
</div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option>Aktif</option>
            <option>Tidak Aktif</option>
        </select>
</div>

 <button type="submit" class="btn btn-primary">Simpan</button>
</form>

    <?php endforeach; ?>
</div>