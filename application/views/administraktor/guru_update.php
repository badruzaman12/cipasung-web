<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-user"></i> Form Update Guru
    </div>

    <?php foreach ($guru as $gr) : ?>

        <?php echo form_open_multipart('administraktor/guru/update_guru_aksi') ?>

        <div class="form-group">
            <label>Nama Guru</label>
            <Input type="hidden" name="id_guru" class="form-control" value="<?php echo $gr->id_guru ?>">
            <Input type="text" name="nama" class="form-control" value="<?php echo $gr->nama_guru ?>">
            <?php echo form_error('nama_guru', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Alamat Lengkap</label>
            <Input type="text" name="alamat_guru" class="form-control" value="<?php echo $gr->alamat_guru ?>">
            <?php echo form_error('alamat_guru', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <Input type="email" name="email" class="form-control" value="<?php echo $gr->email ?>">
            <?php echo form_error('email', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>No Hp</label>
            <Input type="text" name="telepon" class="form-control" value="<?php echo $gr->telepon ?>">
            <?php echo form_error('telepon', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" value="<?php echo $gr->jenis_kelamin ?>">
                <option <?php echo ($gr->jenis_kelamin == 'Laki-Laki') ? 'selected="selected"' : ''; ?>>Laki-Laki</option>
                <option <?php echo ($gr->jenis_kelamin == 'Perempuan') ? 'selected="selected"' : ''; ?>>Perempuan</option>
            </select>
            <?php echo form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Pendidikan Trakhir</label>
            <select name="pendidikan" class="form-control" value="<?php echo $gr->pendidikan ?>">
                <option <?php echo ($gr->pendidikan == 'SD/MI') ? 'selected="selected"' : ''; ?>>SD/MI</option>
                <option <?php echo ($gr->pendidikan == 'SMP') ? 'selected="selected"' : ''; ?>>SMP</option>
                <option <?php echo ($gr->pendidikan == 'SMA') ? 'selected="selected"' : ''; ?>>SMA</option>
                <option <?php echo ($gr->pendidikan == 'S1') ? 'selected="selected"' : ''; ?>>S1</option>
            </select>
            <?php echo form_error('pendidikan', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">

            <?php foreach ($detail as $dt) : ?>
                <img src="<?php echo base_url() . 'assets/uploads/' . $gr->photo ?>" style="width: 20%">
            <?php endforeach; ?><br><br>
            <label>Foto</label><br>
            <input type="file" name="userfile" value="<?php echo $gr->photo ?>">
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

    setInputFilter(document.getElementById("telepon"), function(value) {
        return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    }, "Only digits and '.' are allowed");
</script>