<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Santri
 </div>

 <?php echo $this->session->flashdata('Pesan') ?>

<?php echo anchor('administraktor/santri/tambah_santri_aksi','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Santri</button>') ?>

    <table class="table table-striped table-hover table-bordered">
    <tr>
        <th>NO</th>
        <th>NAMA LENGKAP</th>
        <th>TEMPAT LAHIR</th>
        <th>Tanggal Lahir</th>
        <th colspan="3">AKSI</th>
    </tr>

    <?php
    $no=1;
    foreach ($santri as $sni) : ?>

    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $sni->nama ?></td>
        <td><?php echo $sni->tempat_lahir ?></td>
        <td><?php echo $sni->tanggal_lahir ?></td>
        <td width="20px"><?php echo anchor('administraktor/santri/detail/'.$sni->id,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/santri/update/'.$sni->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/santri/delete/'.$sni->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
        </tr>
    <?php endforeach; ?>
 </table>
</div>