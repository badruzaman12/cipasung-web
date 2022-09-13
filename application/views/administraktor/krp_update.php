<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i>  Form Update Data KRP
    </div>
    <form method="post" action="<?php echo base_url('administraktor/krp/update_aksi') ?>">

    <div class="form-group">
        <label>Tahun Akademik</label>
        <input type="hidden" name="id_tahun" class="form-control" <?php echo $id_tahun; ?>>
        <input type="hidden" name="id_krp" class="form-control" <?php echo $id_krp; ?>>
        <input type="hidden" name="id_santri" class="form-control"<?php echo $santri; ?>>
        <input type="text" name="tahun_semester" class="form-control" value="<?php echo $tahun_semester.'/' .$semester; ?>" readonly/>
    </div>

    <div class="form-group">
        <label>Nama Santri</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" readonly/>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly/>
    </div>

    <div class="from-group">
        <label> Materi Pengajian</label>
        <?php
        $query = $this->db->query('SELECT
        kode_materi_pengajian,nama_materi_pengajian FROM materi_pengajian');

        $dropdowns = $query->result();
        foreach($dropdowns as $dropdowns){

        }

        echo form_dropdown('kode_materi_pengajian', $dropdowns, $kode_materi_pengajian, 'class="from-control" id="kode_materi_pengajian"'
    );
        ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo anchor('administraktor/krp/krp_aksi','<div class="btn btn-danger"> Cancel </div>')?>
    </form>
</div>