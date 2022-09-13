<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-edit"></i> Form Edit Materi Pengajian
 </div>
 <?php foreach($materi_pengajian as $mp) : ?>
    <form method="post" action="<?php echo base_url('administraktor/materi_pengajian/update_materi_pengajian_aksi') ?>">

    <div class="form-group">
        <label>kode Materi Pengajian</label>
        <input type="hidden" name="id" class="form-control" value="<?php echo $mp->id ?>">
        <input type="text" name="kode_materi_pengajian" class="form-control" value="<?php echo $mp->kode_materi_pengajian ?>">
</div>

<div class="form-group">
        <label>Nama Materi Pengajian</label>
        <Input type="text" name="nama_materi_pengajian" class="form-control" value="<?php echo $mp->nama_materi_pengajian ?>">
       </div>

       <div class="form-group">
        <label>Asrama</label>
        <select name="asrama" class="form-control" >
            <?php foreach($asrama as $asm) : ?>
                <option value="<?php echo $asm->nama_asrama ?>" <?php echo ($asm->nama_asrama == $mp->asrama)?'selected="selected"':'';?>><?php echo $asm->nama_asrama ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('asrama','<div class="text-danger small" ml-3>') ?>
    </div>

<div class="form-group">
        <label>Kelas Pengajian</label>
        <select name="kelas_pengajian" class="form-control" value="<?php echo $mp->kelas_pengajian ?>">
            <option <?php echo ($mp->kelas_pengajian == 'Dasar')?'selected="selected"':'';?>>Dasar</option>
            <option <?php echo ($mp->kelas_pengajian == 'Persiapan')?'selected="selected"':'';?>>Persiapan</option>
            <option <?php echo ($mp->kelas_pengajian == '1')?'selected="selected"':'';?>>1</option>
            <option <?php echo ($mp->kelas_pengajian == '2')?'selected="selected"':'';?>>2</option>
            <option <?php echo ($mp->kelas_pengajian == '3')?'selected="selected"':'';?>>3</option>
        </select>
</div>

<div class="form-group">
        <label>Semester</label>
        <select name="semester" class="form-control" value="<?php echo $mp->semester ?>">
            <option <?php echo ($mp->semester == 'Ganjil')?'selected="selected"':'';?>>Ganjil</option>
            <option <?php echo ($mp->semester == 'Genap')?'selected="selected"':'';?>>Genap</option>
        </select>
</div>


<button type="submit" class="btn btn-primary">Simpan</button>

    <?php form_close(); ?>
    <?php endforeach; ?>
</div>
