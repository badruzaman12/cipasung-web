<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> guru
 </div>

 <?php echo $this->session->flashdata('Pesan') ?>

<?php echo anchor('administraktor/guru/tambah_guru_aksi','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Guru</button>') ?>

    <table class="table table-striped table-hover table-bordered">
    <tr>
        <th>NO</th>
        <th>NAMA GURU</th>
        <th>ALAMAT LENGKAP</th>
        <th>EMAIL</th>
        <th colspan="3">AKSI</th>
    </tr>

    <?php
    $no=1;
    foreach ($guru as $gr) : ?>

    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $gr->nama_guru ?></td>
        <td><?php echo $gr->alamat_guru ?></td>
        <td><?php echo $gr->email ?></td>
        <td width="20px"><?php echo anchor('administraktor/guru/detail/'.$gr->id_guru,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/guru/update/'.$gr->id_guru,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/guru/delete/'.$gr->id_guru,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
        </tr>
    <?php endforeach; ?>
 </table>
</div>