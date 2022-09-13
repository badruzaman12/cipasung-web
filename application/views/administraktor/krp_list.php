<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i>  Kartu Rencana Pengajian(KRP)
    </div>

    <center class="mb-4">
        <legend class="mt-3"> <strong>KARTU RENCANA PENGAJIAN</strong></legend>
        <table>
        <tr>
            <td><strong>NAMA</strong></td>
            <td>&nbsp;:<?php echo $nama?></td>
        </tr>

        <tr>
            <td><strong>Email</strong></td>
            <td>&nbsp;:<?php echo $email?></td>
        </tr>

        <tr>
            <td><strong>Asrama</strong></td>
            <td>&nbsp;:<?php echo $asrama?></td>
            
        </tr>

        <tr>
            <td><strong>Tahun Akademik (Semester)</strong></td>
            <td>&nbsp;: <?php echo $tahun_akademik->tahun_akademik.'&nbsp;('.$tahun_akademik->semester.')';
            ?></td>
            
        </tr>
    </table>
    </center>
    <?php echo anchor('administraktor/krp/tambah_krp/'.$nama.'/'.$email.'/'.$id_tahun,'<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data KRP</button>') ?>
    <?php echo anchor('administraktor/krp/print','<button class="btn btn-sm btn-info mb-3"><i class="fas fa-plus fa-sm"></i> Print </button>') ?>
    <table class="table table-striped table-hover table-bordered">
    <tr>
        <th>NO</th>
        <th>Kode Materi Pengajian</th>
        <th>Nama Materi Pengajian</th>
        <th>Kelas</th>
        <th colspan="2">AKSI</th>
    </tr>

    <?php
    $no=1;
    if(isset($krp_data)) :
    foreach ($krp_data as $krp) : ?>

    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $krp->kode_materi_pengajian ?></td>
        <td><?php echo $krp->nama_materi_pengajian ?></td>
        <td><?php echo $krp->kelas ?></td>
        <td width="20px"><?php echo anchor('administraktor/krp/update/'.$krp->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
        <td width="20px"><?php echo anchor('administraktor/krp/delete/'.$krp->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
        </tr>
    <?php endforeach; endif;?>

    </table>
 </div>