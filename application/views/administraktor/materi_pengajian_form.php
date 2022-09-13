<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-user"></i> Form Input Materi Pengajian
    </div>
    
    <?php echo form_open_multipart('administraktor/materi_pengajian/tambah_materi_pengajian_aksi') ?>

    <div class="form-group">
        <label>Kode Materi Pengajian</label>
        <Input type="text" name="kode_materi_pengajian" 
        placeholder="Masukan Kode Materi Pengajian" class="form-control">
        <?php echo form_error('kode_materi_pengajian','<div class="text-danger small" ml-3>') ?>
       </div>

       <div class="form-group">
        <label>Nama Materi Pengajian</label>
        <Input type="text" name="nama_materi_pengajian" 
        placeholder="Masukan Nama Materi Pengajian" class="form-control">
        <?php echo form_error('nama_materi_pengajian','<div class="text-danger small" ml-3>') ?>
       </div>

     <div class="form-group">
        <label>Asrama</label>
        <select name="asrama" class="form-control">
            <option value="">-- Pilih Asrama --</option>
            <?php foreach($asrama as $asm) : ?>
                <option value="<?php echo $asm->nama_asrama ?>"><?php echo $asm->nama_asrama ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('asrama','<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
       <label>Kelas Pengajian</label>
       <select name="Kelas_pengajian" class="form-control">
            <option value="">-- Pilih Kelas Pengajian --</option>
            <option>Dasar </option>
            <option>Persiapan</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        <?php echo form_error('kelas_pengajian','<div class="text-danger small" ml-2>') ?>
       </div>

       <div class="form-group">
        <label>Semester</label>
        <select name="semester" class="form-control">
            <option value="">-- Pilih semester --</option>
            <option>Genap</option>
            <option>Ganjil</option>
        </select>
        <?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
    </div>

    <button type="submit" class="btn btn-primary mb-5">Simpan</button>
        </div>

        <?php form_close(); ?>
    </div>
