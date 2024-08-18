<section class="content">
    <div class="modal fade" id="insert-kategori">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('insert_data_kategori'); ?>" method="post" id="insertKategori">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputKategori">Kategori</label>
                                <input name="kategori" type="text" class="form-control" id="inputKategori" placeholder="Masukkan Kategori">
                                <small id="kategori-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="update-kategori">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update Kategori</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('update_data_kategori'); ?>" method="post" id="updateKategori">
                        <div class="box-body">
                            <div class="form-group" hidden>
                                <label for="inputKategori">Kategori</label>
                                <input name="idKategori" type="text" class="form-control" id="inputKategori" placeholder="Masukkan Kategori">
                            </div>
                            <div class="form-group">
                                <label for="inputKategori">Kategori</label>
                                <input name="kategori" type="text" class="form-control" id="inputKategori" placeholder="Masukkan Kategori">
                                <small id="kategori-errorUpdate" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="delete-confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Kategori</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger delete-confirm">Iya</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>Data Kategori</strong></h3>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insert-kategori">Tambah Kategori</button>
                    <table id="kategori" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $value['kategori'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning"
                                                data-idkategori="<?= $value['id']; ?>" data-kategori="<?= $value['kategori'] ?>" data-toggle="modal" data-target="#update-kategori">Ubah Data</button>
                                            <button type="button" data-idkategori="<?= $value['id']; ?>" class="btn btn-danger delete-kategori"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>