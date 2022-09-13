<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> Asrama
 </div>

 <?php echo $this->session->flashdata('Pesan') ?>

<?php echo anchor('administraktor/asrama/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Asrama</button>') ?>


 <table class="table table-bordered table-striped table-hover">
    <tr>
        <th>NO</th>
        <th>KODE ASRAMA</th>
        <th>KAPASITAS ASRAMA</th>
        <th>NAMA ASRAMA</th>
        <th colspan="2">AKSI</th>
    </tr>

    <?php
    $no=1;
    foreach ($asrama as $asm) : ?>
    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $asm->kode_asrama ?></td>
        <td><?php echo $asm->kapasitas_asrama ?></td>
        <td><?php echo $asm->nama_asrama ?></td>
        <td width="20px"><?php echo anchor('administraktor/asrama/update/'.$asm->id_asrama,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/asrama/delete/'.$asm->id_asrama,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
    </tr>
    <?php endforeach; ?>
 </table>
</div>