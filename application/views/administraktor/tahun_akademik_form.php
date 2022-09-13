<div class="container-fluid">


<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Form Input Tahun Asrama
 </div>

    <form method="post" action="<?php echo base_url('administraktor/tahun_akademik/input_aksi') ?>">
       <div class="form-group">
        <label>Tahun Akademik</label>
        <Input type="text" name="tahun_akademik" 
        placeholder="Masukan Tahun Akademik" class="form-control">
        <?php echo form_error('tahun_akademik','<div class="text-danger small" ml-3>') ?>
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

    <div class="form-group">
       <label>Kelas Pengajian</label>
       <select name="Kelas" class="form-control">
            <option value="">-- Pilih Kelas Pengajian --</option>
            <option>Dasar </option>
            <option>Persiapan</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        <?php echo form_error('kelas','<div class="text-danger small" ml-2>') ?>
       </div>

       <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="">-- Pilih status --</option>
            <option>Aktif</option>
            <option>Tidak Aktif</option>
        </select>
        <?php echo form_error('status','<div class="text-danger small" ml-3>') ?>
       </div>

       <button type="submit" class="btn btn-primary">Simpan</button>
    </from>
</div>