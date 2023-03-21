                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Masyarakat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nik</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Telepon</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nik</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Telepon</th>    
                                        </tr>
                                    </tfoot>
                                    <?php $i = 1 ?>
                                    <?php foreach ($masyarakat as $al) : ?>
                                        <tr>
                                            <input type="hidden" name="nik" value="<? $al['nik'] ?>">
                                            <input type="hidden" name="name" value="<? $al['name'] ?>">
                                            <input type="hidden" name="telepon" value="<? $al['telp'] ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $al['nik'] ?></td>
                                            <td><?= $al['name'] ?></td>
                                            <td><?= $al['telp'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                 <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ridho</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->