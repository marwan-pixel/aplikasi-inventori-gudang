<section class="content">
    <div class="modal fade" id="insert-barang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Insert Barang</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('insert_data_barang'); ?>" method="post" id="insertBarang">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputKategori">Kategori</label>
                                <select name="idkategori" id="idkategori" class="form-control select2" <?= count($kategori) == 0 ? "disabled" : "" ?> style="width: 100%;">
                                    <?php
                                    foreach ($kategori as $key => $value) {
                                    ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['kategori'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <!-- <small id="idkategori-error" class="text-danger"></small> -->
                            </div>
                            <div class="form-group">
                                <label for="inputBarang">Barang</label>
                                <input name="barang" type="text" class="form-control" id="inputBarang" placeholder="Masukkan Barang">
                                <small id="barang-error" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="inputStok">Stok</label>
                                <input name="stok" type="number" class="form-control" id="inputStok" placeholder="Masukkan Stok">
                                <small id="stok-error" class="text-danger"></small>
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
    <div class="modal fade" id="update-barang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update Barang</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('update_data_barang'); ?>" method="post" id="updateBarang">
                        <div class="box-body">
                            <div class="form-group" hidden>
                                <label for="ubahBarang">Barang</label>
                                <input name="id" type="text" class="form-control" id="ubahBarang" placeholder="Masukkan Barang">
                            </div>
                            <div class="form-group">
                                <label for="inputKategori">Kategori</label>
                                <select name="idkategori" id="idkategori" class="form-control select2" <?= count($kategori) == 0 ? "disabled" : "" ?> style="width: 100%;">
                                    <?php
                                    foreach ($kategori as $key => $value) {
                                    ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['kategori'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ubahBarang">Barang</label>
                                <input name="barang" type="text" class="form-control" id="ubahBarang" placeholder="Masukkan Barang">
                                <small id="barang-errorUpdate" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="ubahStok">Stok</label>
                                <input name="stok" type="number" class="form-control" id="ubahStok" placeholder="Masukkan Barang">
                                <small id="stok-errorUpdate" class="text-danger"></small>
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

    <div class="modal fade" id="delete-barang-confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Barang</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger delete-barang-confirm">Iya</button>
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
                    <h3 class="box-title"><strong>Data Barang</strong></h3>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insert-barang">Tambah Barang</button>
                    <table id="barang" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Barang</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($barang) > 0):
                                foreach ($barang as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $value['kategori_id'] ?></td>
                                        <td><?= $value['barang'] ?></td>
                                        <td><?= $value['stok'] ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning"
                                                    data-id="<?= $value['id']; ?>" data-idkategori="<?= $value['kategori_id']; ?>" data-barang="<?= $value['barang'] ?>" data-stok="<?= $value['stok'] ?>" data-toggle="modal" data-target="#update-barang">Ubah Data</button>
                                                <button type="button" data-id="<?= $value['id']; ?>" class="btn btn-danger delete-barang"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            endif;
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>