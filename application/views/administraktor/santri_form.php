<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-user"></i> Form Input Santri
    </div>

    <?php echo form_open_multipart('administraktor/santri/tambah_santri_aksi') ?>

    <div class="form-group">
        <label>Nama Lengkap</label>
        <Input type="text" name="nama" placeholder="Masukan Nama Lengkap" class="form-control">
        <?php echo form_error('nama', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Tempat Lahir</label>
        <Input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control">
        <?php echo form_error('tempat_lahir', '<div class="text-danger small" ml-3>') ?>
    </div>


    <div class="form-group">
        <label>Tanggal Lahir</label>
        <Input type="date" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir" class="form-control">
        <?php echo form_error('tanggal_lahir', '<div class="text-danger small" ml-3>') ?>
    </div>


    <div class="form-group">
        <label>Alamat Lengkap</label>
        <Input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control">
        <?php echo form_error('alamat', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Asrama</label>
        <select name="asrama" class="form-control">
            <option value="">-- Pilih Asrama --</option>
            <?php foreach ($asrama as $asm) : ?>
                <option value="<?php echo $asm->nama_asrama ?>"><?php echo $asm->nama_asrama ?></option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('asrama', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Email</label>
        <Input type="email" name="email" placeholder="Masukan Email" class="form-control">
        <?php echo form_error('email', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Password</label>
        <Input type="password" name="password" placeholder="Masukan Password" class="form-control">
        <?php echo form_error('password', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>No Hp</label>
        <Input type="text" id="no_hp" name="no_hp" placeholder="Masukan No Hp" class="form-control">
        <?php echo form_error('no_hp', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Nama Wali Santri</label>
        <Input type="text" name="nama_ws" class="form-control" placeholder="Masukan Nama Wali Santri" class="form-control">
        <?php echo form_error('nama_ws', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Pekerjaan Wali Santri</label>
        <Input type="text" name="pekerja_ws" class="form-control" placeholder="Masukan Pekerjaan Wali Santri" class="form-control">
        <?php echo form_error('pekerja_ws', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
        </select>
        <?php echo form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Pendidikan Trakhir</label>
        <select name="pendidikan" class="form-control">
            <option value="">-- Pilih Pendidikan Trakhir --</option>
            <option>SD/MI</option>
            <option>SMP</option>
            <option>SMA</option>
            <option>S1</option>
        </select>
        <?php echo form_error('pendidikan', '<div class="text-danger small" ml-3>') ?>
    </div>

    <div class="form-group">
        <label>Foto</label><br>
        <input type="file" name="photo">
    </div>
    <button type="submit" class="btn btn-primary mb-5 mt3">Simpan</button>
</div>

<?php form_close(); ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://raw.githubusercontent.com/igorescobar/jQuery-Mask-Plugin/master/src/jquery.mask.js"></script>

<script>
    // Restricts input for the given textbox to the given inputFilter function.
    function setInputFilter(textbox, inputFilter, errMsg) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
            textbox.addEventListener(event, function(e) {
                if (inputFilter(this.value)) {
                    // Accepted value
                    if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                        this.classList.remove("input-error");
                        this.setCustomValidity("");
                    }
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    // Rejected value - restore the previous one
                    this.classList.add("input-error");
                    this.setCustomValidity(errMsg);
                    this.reportValidity();
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    // Rejected value - nothing to restore
                    this.value = "";
                }
            });
        });
    }

    setInputFilter(document.getElementById("no_hp"), function(value) {
        return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    }, "Only digits and '.' are allowed");
</script>