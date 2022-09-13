<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Materi Pengajian
 </div>

 <?php echo $this->session->flashdata('Pesan') ?>
<?php echo anchor('administraktor/materi_pengajian/tambah_materi_pengajian_aksi','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Materi Pengajian</button>') ?>

<table class="table table-striped table-hover table-bordered">

    <tr>
        <th>NO</th>
        <th>KODE MATERI PENGAJIAN</th>
        <th>NAMA MATERI PENGAJIAN</th>
        <th>NAMA ASRAMA</th>
        <th colspan="3">AKSI</th>
    </tr>

    <?php
    $no=1;
    foreach ($materi_pengajian as $mp) : ?>

    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $mp->kode_materi_pengajian ?></td>
        <td><?php echo $mp->nama_materi_pengajian ?></td>
        <td><?php echo $mp->asrama ?></td>
        <td width="20px"><?php echo anchor('administraktor/materi_pengajian/detail/'.$mp->id,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/materi_pengajian/update/'.$mp->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/materi_pengajian/delete/'.$mp->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
        </tr>
    <?php endforeach; ?>
 </table>
</div>