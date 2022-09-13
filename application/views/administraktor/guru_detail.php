<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> Detail Guru
    </div>

    <table class="table table hover table-bordered table-striped">
        <?php foreach($detail as $dt) : ?>
    
    <img class="mb-4" src="<?php echo base_url('assets/uploads/').$dt->photo?>" style="width: 20%">

    <tr>
        <th>Nama Guru</th>
        <th><?php echo $dt->nama_guru;?></th>
    </tr>

    <tr>
        <th>Alamat Lengkap</th>
        <th><?php echo $dt->alamat_guru;?></th>
    </tr>

    <tr>
        <th>Email</th>
        <th><?php echo $dt->email;?></th>
    </tr>

    <tr>
        <th>Jenis Kelamin</th>
        <th><?php echo $dt->jenis_kelamin;?></th>
    </tr>

    <tr>
        <th>No Hp</th>
        <th><?php echo $dt->telepon;?></th>
    </tr>

    <tr>
        <th>Pendidikan Trakhir</th>
        <th><?php echo $dt->pendidikan;?></th>
    </tr>

    <?php endforeach; ?>
 </table>
 <?php echo anchor('administraktor/guru','<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
</div>
