<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1">Tambah</button>
                            <h4 class="card-title">Kategori</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($kategori as $al) : ?>
                                        <tr>
                                            <th><?= $i ?></th>
                                            <input type="hidden" name="Kategori" value="<? $al['Kategori'] ?>">
                                            <td><?= $al['kategori'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_kp_Modal<?php echo $al['id']; ?>"> Edit</button>
                                                <a class="btn btn-danger" href="<?= base_url('C_ridho_admin/delete_kategori/' . $al['id'] . '/') ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit_kp_Modal<?php echo $al['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">edit Kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url('C_ridho_admin/edit_kategori/') . $al['id'] ?>" method="post">
                                                                <div class="form-group">
                                                                    <label for="kategori">Kategori</label>
                                                                    <input type="kategori" class="form-control" name="kategori" id="kategori" value="<?= $al['kategori'] ?>">
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
                                        </div>
                            </div>
                        <?php $i++;
                                    endforeach ?>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url('C_ridho_admin/tambahkategori') ?>" method="post">
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <input type="kategori" class="form-control" name="kategori" id="kategori">
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
                        </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahsubkategori">Tambah</button>
                        <h4 class="card-title">Sub-Kategori</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Sub-Kategori</th>
                                    </tr>
                                </thead>
                                <?php $a = 1 ?>
                                <?php foreach ($sub_kategori as $sk) : ?>
                                    <tr>
                                        <th><?= $a ?></th>
                                        <input type="hidden" name="kategori" value="<? $sk['kategori'] ?>">
                                        <input type="hidden" name="sub_kategori" value="<? $sk['sub_kategori'] ?>">
                                        <td><?= $sk['kategori'] ?></td>
                                        <td><?= $sk['sub_kategori'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_kp_Modal21<?php echo $sk['id']; ?>"> Edit</button>
                                            <a class="btn btn-danger" href="<?= base_url('C_ridho_admin/delete_subkategori/' . $sk['id'] . '/') ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                                        </td>
                                    </tr>

                                    <tfoot>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit_kp_Modal21<?php echo $sk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('C_ridho_admin/editsubkategori/') . $sk['id'] ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="kategori">Kategori</label>
                                                                <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $sk['kategori'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sub_kategori">Sub-Kategori</label>
                                                                <input type="text" class="form-control" name="sub_kategori" id="sub_kategori" value="<?= $sk['sub_kategori'] ?>">
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
                                    <?php $a++;
                                endforeach ?>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahsubkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('C_ridho_admin/tambahsubkategori/') ?>" method="post">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <!-- <input type="text" class="form-control" name="kategori" id="kategori"> -->
                        <select name="kategori" id="" class="form-control">
                            <?php foreach ($kategori as $al) : ?>
                                <option value=" <?= $al['id'] ?>"><?= $al['kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_kategori">Sub-Kategori</label>
                        <input type="text" class="form-control" name="sub_kategori" id="sub_kategori">
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
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ridho</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->