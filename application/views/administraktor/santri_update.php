<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-user"></i> Form Update Santri
    </div>

    <?php foreach ($santri as $sni) : ?>

        <?php echo form_open_multipart('administraktor/santri/update_santri_aksi') ?>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <Input type="hidden" name="id" class="form-control" value="<?php echo $sni->id ?>">
            <Input type="text" name="nama" class="form-control" value="<?php echo $sni->nama ?>">
            <?php echo form_error('nama', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <Input type="text" name="tempat_lahir" class="form-control" value="<?php echo $sni->tempat_lahir ?>">
            <?php echo form_error('tempat_lahir', '<div class="text-danger small" ml-3>') ?>
        </div>


        <div class="form-group">
            <label>Tanggal Lahir</label>
            <Input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $sni->tanggal_lahir ?>">
            <?php echo form_error('tanggal_lahir', '<div class="text-danger small" ml-3>') ?>
        </div>


        <div class="form-group">
            <label>Alamat Lengkap</label>
            <Input type="text" name="alamat" class="form-control" value="<?php echo $sni->alamat ?>">
            <?php echo form_error('alamat', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Asrama</label>
            <select name="asrama" class="form-control">
                <?php foreach ($asrama as $asm) : ?>
                    <option value="<?php echo $asm->nama_asrama ?>" <?php echo ($asm->nama_asrama == $sni->asrama) ? 'selected="selected"' : ''; ?>><?php echo $asm->nama_asrama ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('asrama', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <Input type="email" name="email" class="form-control" value="<?php echo $sni->email ?>">
            <?php echo form_error('email', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Password</label>
            <Input type="password" name="password" class="form-control" value="<?php echo $sni->email ?>">
            <?php echo form_error('password', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>No Hp</label>
            <Input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $sni->no_hp ?>">
            <?php echo form_error('no_hp', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Nama Wali Santri</label>
            <Input type="text" name="nama_ws" class="form-control" value="<?php echo $sni->nama_ws ?>">
            <?php echo form_error('nama_ws', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Pekerjaan Wali Santri</label>
            <Input type="text" name="pekerja_ws" class="form-control" value="<?php echo $sni->pekerja_ws ?>">
            <?php echo form_error('pekerja_ws', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" value="<?php echo $sni->jenis_kelamin ?>">
                <option <?php echo ($sni->jenis_kelamin == 'Laki-Laki') ? 'selected="selected"' : ''; ?>>Laki-Laki</option>
                <option <?php echo ($sni->jenis_kelamin == 'Perempuan') ? 'selected="selected"' : ''; ?>>Perempuan</option>
            </select>
            <?php echo form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Pendidikan Trakhir</label>
            <select name="pendidikan" class="form-control" value="<?php echo $sni->pendidikan ?>">
                <option <?php echo ($sni->pendidikan == 'SD/MI') ? 'selected="selected"' : ''; ?>>SD/MI</option>
                <option <?php echo ($sni->pendidikan == 'SMP') ? 'selected="selected"' : ''; ?>>SMP</option>
                <option <?php echo ($sni->pendidikan == 'SMA') ? 'selected="selected"' : ''; ?>>SMA</option>
                <option <?php echo ($sni->pendidikan == 'S1') ? 'selected="selected"' : ''; ?>>S1</option>
            </select>
            <?php echo form_error('pendidikan', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">

            <?php foreach ($detail as $dt) : ?>
                <img src="<?php echo base_url() . 'assets/uploads/' . $sni->photo ?>" style="width: 20%">
            <?php endforeach; ?><br><br>
            <label>Foto</label><br>
            <input type="file" name="userfile" value="<?php echo $sni->photo ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>


        <?php form_close(); ?>

    <?php endforeach; ?>
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