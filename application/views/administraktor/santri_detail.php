<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> Detail Santri
    </div>

    <table class="table table hover table-bordered table-striped">
        <?php foreach($detail as $dt) : ?>
    
    <img class="mb-4" src="<?php echo base_url('assets/uploads/').$dt->photo?>" style="width: 20%">

    <tr>
        <th>Nama Lengkap</th>
        <th><?php echo $dt->nama;?></th>
    </tr>

    <tr>
        <th>tempat lahir</th>
        <th><?php echo $dt->tempat_lahir;?></th>
    </tr>

    <tr>
        <th>Tanggal Lahir</th>
        <th><?php echo $dt->tanggal_lahir;?></th>
    </tr>

    <tr>
        <th>Alamat</th>
        <th><?php echo $dt->alamat;?></th>
    </tr>

    <tr>
        <th>Asrama</th>
        <th><?php echo $dt->asrama;?></th>
    </tr>

    <tr>
        <th>Email</th>
        <th><?php echo $dt->email;?></th>
    </tr>

    <tr>
        <th>No Hp</th>
        <th><?php echo $dt->no_hp;?></th>
    </tr>

    <tr>
        <th>Nama Wali Santri</th>
        <th><?php echo $dt->nama_ws;?></th>
    </tr>

    <tr>
        <th>Pekerjaan Wali Santri</th>
        <th><?php echo $dt->pekerja_ws;?></th>
    </tr>

    <tr>
        <th>Jenis Kelamin</th>
        <th><?php echo $dt->jenis_kelamin;?></th>
    </tr>

    <tr>
        <th>Pendidikan Trakhir</th>
        <th><?php echo $dt->pendidikan;?></th>
    </tr>

    <?php endforeach; ?>
 </table>
 <?php echo anchor('administraktor/santri','<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
</div>
