                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pengaduan</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-solid fa-plus"></i> Tambah</button>
                            <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Isi</th>
                                            <th>Kategori</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Isi</th>
                                            <th>Kategori</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($pengaduan2 as $al) : ?>
                                            <tr>
                                                <input type="hidden" name="kategori" value="<? $al['Kategori'] ?>">
                                                <input type="hidden" name="tgl_pengaduan" value="<? $al['tgl_pengaduan'] ?>">
                                                <input type="hidden" name="status" value="<? $al['status'] ?>">
                                                <input type="hidden" name="isi_laporan" value="<? $al['isi_laporan'] ?>">
                                                <td><?= $i ?></td>
                                                <td><?= $al['isi_laporan'] ?></td>
                                                <td><?= $al['kategori'] ?></td>
                                                <td><?= $al['tgl_pengaduan'] ?></td>
                                                <td> <!-- Button trigger modal -->
                                                    <?php if ($al['status'] == 'segera') : ?>
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ngadu<?= $al['id_pengaduan'] ?>">
                                                            Tindakan
                                                        </button>
                                                    <?php endif ?>
                                                    <?php if ($al['status'] == "proses") : ?>
                                                        <a type="button" class="btn btn-warning" href="<?= base_url('user/statusproses/') . $al['id_pengaduan'] ?>">
                                                            Proses
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if ($al['status'] == "selesai") : ?>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="">
                                                            Selesai
                                                        </button>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach ?>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ajukan Pengaduan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('Home/isipengaduan') ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="mb-3 col-md-15">
                                                                    <label for="exampleInputEmail1">Nik</label>
                                                                    <input type="text" class="form-control" id="nik" name="nik" aria-describedby="emailHelp" disabled value="<?= $al['nik'] ?>"></input>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Kategori</label>
                                                                <select class="form-control" name="kategori" id="kategori">
                                                                    <option value="0">Pilih kategori</option>
                                                                    <?php foreach ($kategori as $kp) : ?>
                                                                        <option value=" <?= $kp['id'] ?>">
                                                                            <?= $kp['kategori'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Sub Kategori</label>
                                                                <select class="form-control" id="subkategori" name="subkategori">
                                                                    <option value="0">Pilih Sub-kategori</option>
                                                                    <?php foreach ($sub_kategori as $kp) : ?>
                                                                        <option value=" <?= $kp['sub_kategori'] ?>">
                                                                            <?= $kp['sub_kategori'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Foto</label>
                                                                <input type="file" class="form-control-file" id="foto" name="foto" placeholder="date">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Isi Laporan Pengaduan</label>
                                                                <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="6"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Ridho</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>