<?php
echo $this->extend('template/index');
echo $this->section('content');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <?php if (validation_errors()) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5><i class="icon fas fa-ban"></i> Peringatan</h5>
                            <?php echo validation_list_errors() ?>
                        </div>
                    <?php
                    } 
                    ?>

                    <?php
                    if (session()->getFlashdata('error')) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-warning "></i> Warning</h5>
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php echo csrf_field() ?>
                    <div class="form-group">
                        <label for="kd_jurusan">Kode Jurusan</label>
                        <input type="text" name="kd_jurusan" id="kd_jurusan" value="<?php echo empty(set_value('kd_jurusan')) ? (empty($edit_data['kd_jurusan']) ? "":$edit_data['kd_jurusan']) : set_value('kd_jurusan'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama_jurusan">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" id="nama_jurusan" value="<?php echo empty(set_value('nama_jurusan')) ? (empty($edit_data['nama_jurusan']) ? "":$edit_data['nama_jurusan']) : set_value('nama_jurusan'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga_umum">Harga Umum</label>
                        <input type="number" name="harga_umum" id="harga_umum" value="<?php echo empty(set_value('harga_umum')) ? (empty($edit_data['harga_umum']) ? "":$edit_data['harga_umum']) : set_value('harga_umum'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga_pelajar">Harga Pelajar</label>
                        <input type="number" name="harga_pelajar" id="harga_pelajar" value="<?php echo empty(set_value('harga_pelajar')) ? (empty($edit_data['harga_pelajar']) ? "":$edit_data['harga_pelajar']) : set_value('harga_pelajar'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keberangkatan">Kebarangkatan</label>
                        <input type="text" name="keberangkatan" id="keberangkatan" value="<?php echo set_value('keberangkatan'); ?>" class="form-control">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
<?php
echo $this->endSection();