<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> Detail Materi Pengajian
    </div>

    <table class="table table hover table-bordered table-striped">
        <?php foreach($detail as $dt) : ?>

    <tr>
        <th>Kode Materi Pengajian</th>
        <th><?php echo $dt->kode_materi_pengajian;?></th>
    </tr>

    <tr>
        <th>Nama Materi Pengajian</th>
        <th><?php echo $dt->nama_materi_pengajian;?></th>
    </tr>

    <tr>
        <th>Nama Asrama</th>
        <th><?php echo $dt->asrama;?></th>
    </tr>

    <tr>
        <th>Kelas Pengajian</th>
        <th><?php echo $dt->kelas_pengajian;?></th>
    </tr>

    <tr>
        <th>Semester</th>
        <th><?php echo $dt->semester;?></th>
    </tr>

    <?php endforeach; ?>
 </table>
 <?php echo anchor('administraktor/materi_pengajian','<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
</div>
