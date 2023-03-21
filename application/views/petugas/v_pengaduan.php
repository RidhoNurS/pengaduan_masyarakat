<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pengaduan Masyarakat</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>no telepon</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($pengaduanad as $pa) : ?>
                                        <tr>
                                            <input type="hidden" name="nik" value="<? $pa['nik'] ?>">
                                            <input type="hidden" name="name" value="<? $pa['name'] ?>">
                                            <input type="hidden" name="tgl_pengaduan" value="<? $pa['tgl_pengaduan'] ?>">
                                            <input type="hidden" name="telp" value="<? $pa['telp'] ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $pa['nik'] ?></td>
                                            <td><?= $pa['name'] ?></td>
                                            <td><?= $pa['tgl_pengaduan'] ?></td>
                                            <td><?= $pa['telp'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn btn-warning"><i class="fas fa-undo"></i></a>
                                                <a href="#" class="btn btn btn-danger"><i class="fas fa-lock"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>no telepon</th>
                                            <th>Status</th>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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