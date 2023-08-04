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
            <div class="card-body">
                <?php
                if (session()->getFlashdata('success')) {
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h5><i class="icon fas fa-check"></i> Sukses</h5>
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php
                }
                ?>

               

                <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>/jurusan/tambah"><i class="fa-solid fa-plus"></i> Tambah Jurusan</a>
                <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Kode Bus</th>
                            <th>Nama Bus</th>
                            <th>Harga Umum</th>
                            <th>Harga Pelajar</th>
                            <th>Keberangkatan</th>
                            <th>Operasi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($data_jurusan as $r) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $r['kd_jurusan']; ?></td>
                                    <td><?php echo $r['nama_jurusan']; ?></td>
                                    <td><?php echo $r['harga_umum']; ?></td>
                                    <td><?php echo $r['harga_pelajar']; ?></td>
                                    <td><?php echo $r['keberangkatan']; ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/jurusan/edit/<?php echo $r['kd_jurusan']; ?>"><i class="fa-solid fa-edit"></i></a>
                                        <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['kd_jurusan']; ?>); "><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            $no++;
                            }
                            ?>
                        </tbody>
                </table>
            </div>
                <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    function hapusConfig(id) {
        Swal.fire({
            title: 'Anda yakin mau menghapus data ini?',
            text: "Jika setuju data akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya hapus !'
        }).then((result) => {
            if (result.isConfirmed) {
                  window.location.href='<?php echo base_url(); ?>/jurusan/hapus/' + id;

            }
        })
    }
</script>
<?php
echo $this->endSection();