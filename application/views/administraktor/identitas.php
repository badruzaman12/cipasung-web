<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> IDENTITAS WEBSITE
 </div>

 <?php echo $this->session->flashdata('Pesan') ?>

 <table class="table table-bordered table-striped table-hover">
    <tr>
        <th>NO</th>
        <th>JUDUL WEBSITE</th>
        <th>ALAMAT</th>
        <th>EMAIL</th>
        <th>NO. TELEPON</th>
        <th>AKSI</th>
    </tr>

    <?php
    $no=1;
    foreach ($identitas as $id) : ?>
    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $id->nama_website ?></td>
        <td><?php echo $id->alamat ?></td>
        <td><?php echo $id->email ?></td>
        <td><?php echo $id->telepon ?></td>
        <td width="20px"><?php echo anchor('administraktor/identitas/update/'.$id->id_identitas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
    </tr>
    <?php endforeach; ?>
 </table>
</div>