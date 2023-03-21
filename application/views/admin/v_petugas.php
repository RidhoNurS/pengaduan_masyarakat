<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Petugas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Petugas</h3>
                        <a class="btn btn-primary float-right" href="<?= base_url('auth/admin_register') ?>" role="button">Tambah</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($petugas as $al) : ?>
                                <tr>
                                    <input type="hidden" name="nik" value="<? $al['username'] ?>">
                                    <input type="hidden" name="nama_petugas" value="<? $al['nama_petugas'] ?>">
                                    <input type="hidden" name="telepon" value="<? $al['telp'] ?>">
                                    <input type="hidden" name="status" value="<? $al['status'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['username'] ?></td>
                                    <td><?= $al['nama_petugas'] ?></td>
                                    <td><?= $al['telp'] ?></td>
                                    <td><?= $al['level'] ?></td>
                                    <!-- <td>
                                        <a href="#" class="btn btn btn-warning"><i class="fas fa-undo"></i></a>
                                        <a href="#" class="btn btn btn-danger"><i class="fas fa-lock"></i></a>
                                    </td> -->
                                </tr>
                            <?php $i++;
                            endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>
     <!-- Footer -->
     <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ridho</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->