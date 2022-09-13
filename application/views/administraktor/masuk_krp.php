<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fas fa-school"></i> From Masuk Halaman KRP
 </div>

 <?php echo $this->session->flashdata('Pesan') ?>

 <form method="post" action="<?php echo base_url('administraktor/krp/krp_aksi') ?>">

 <div class="form-group">
        <label>Nama Santri</label>
        <Input type="text" name="nama" 
        placeholder="Masukan Nama Santri" class="form-control">
        <?php echo form_error('nama','<div class="text-danger small" ml-2>') ?>
       </div>

       <div class="form-group">
        <label>Email</label>
        <Input type="email" name="email" 
        placeholder="Masukan Email" class="form-control">
        <?php echo form_error('email','<div class="text-danger small" ml-2>') ?>
       </div>

       <div class="form-group">
        <label>Tahun Akademik / Semester</label>
        <?php 
        $query = $this->db->query('SELECT id_tahun, semester,CONCAT(tahun_akademik,"/")
        AS tahun_semester
        FROM tahun_akademik');
        $dropdown = $query->result();

        foreach ($dropdown as $dropdown){
         if($dropdown->semester){
            $tampilSemester = "Ganjil";
        }else {
            $tampilSemester = "Genap";
        }
        $dropDownList[$dropdown->id_tahun] = $dropdown->tahun_semester. " " .$tampilSemester;
    }
    echo form_dropdown('id_tahun',$dropDownList, '', '
    class="form-control" id=id_tahun');
        ?>
       </div>
       <button type="submit" class="btn btn-primary">Proses</button>
       </from>
 </div>
