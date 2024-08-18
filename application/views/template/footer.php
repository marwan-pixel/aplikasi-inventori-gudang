<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<!-- jQuery 3 -->
<script src="<?= base_url('assets/template') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/template') ?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/template') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/template') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('assets/template') ?>/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/template') ?>/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/template') ?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/template') ?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/template') ?>/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/template') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/template') ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/template') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/template') ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/template') ?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
<script>
    $(function() {
        $("#kategori").DataTable();
        $("#barang").DataTable();
    });

    $(document).ready(function() {
        $('#insertKategori').on('hide.bs.modal', function(event) {
            $(this).find('.text-danger');
        });

        $('#insertKategori').on('submit', function(event) {
            event.preventDefault();
            const form = $(this);
            const kategori = form.find('input[name="kategori"]').val();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                        $('#insert-kategori').modal('hide');
                        form.find('input[name="kategori"]').val() = "";
                    } else {
                        var errors = response.errors;
                        $.each(errors, function(field, message) {
                            let errorElement = $('#' + field + '-error');
                            errorElement.html(message);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr, status, error);
                }
            });
        });

        $('#update-kategori').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);

            // Isi nilai pada field
            modal.find(`input[name="idKategori"]`).attr("value", div.data(`idkategori`));
            modal.find(`input[name="kategori"]`).attr("value", div.data(`kategori`));
        });

        $('#update-kategori').on('hide.bs.modal', function(event) {
            $(this).find('.text-danger');
        });

        $('#updateKategori').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const id = form.find('input[name="idkategori"]').val();
            const kategori = form.find('input[name="kategori"]').val();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                        $('#update-kategori').modal('hide');
                        form.find('input[name="idkategori"]').val() = "";
                        form.find('input[name="kategori"]').val() = "";
                    } else {
                        var errors = response.errors;
                        $.each(errors, function(field, message) {
                            let errorElement = $('#' + field + '-errorUpdate');
                            errorElement.html(message);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('.delete-kategori').on('click', function(event) {
            idkategori = $(this).data('idkategori');
            event.preventDefault();
            $('#delete-confirm').modal('show');
        });

        $('.delete-confirm').click(function() {
            $.ajax({
                url: '<?= base_url('delete_data_kategori'); ?>',
                method: 'POST',
                data: {
                    id: idkategori
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#insertBarang').on('hide.bs.modal', function(event) {
            $(this).find('.text-danger');
        });

        $('#insertBarang').on('submit', function(event) {
            event.preventDefault();
            const form = $(this);
            const idkategori = form.find('input[name="idkategori"]').val();
            const barang = form.find('input[name="barang"]').val();
            const stok = form.find('input[name="stok"]').val();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                        $('#insert-barang').modal('hide');
                        form.find('input[name="idkategori"]').val() = "";
                        form.find('input[name="barang"]').val() = "";
                        form.find('input[name="stok"]').val() = "";
                    } else {
                        var errors = response.errors;
                        $.each(errors, function(field, message) {
                            let errorElement = $('#' + field + '-error');
                            errorElement.html(message);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr, status, error);
                }
            });
        });

        $('#update-barang').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);
            // Isi nilai pada field
            modal.find(`input[name="id"]`).attr("value", div.data(`id`));
            modal.find(`#idkategori`).val(div.data(`idkategori`));
            modal.find(`input[name="barang"]`).attr("value", div.data(`barang`));
            modal.find(`input[name="stok"]`).attr("value", div.data(`stok`));
        });

        $('#update-barang').on('hide.bs.modal', function(event) {
            $(this).find('.text-danger');
        });

        $('#updateBarang').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const id = form.find('input[name="id"]').val();
            const idKategori = form.find('input[name="idkategori"]').val();
            const barang = form.find('input[name="barang"]').val();
            const stok = form.find('input[name="stok"]').val();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                        $('#update-barang').modal('hide');
                        form.find('input[name="id"]').val() = "";
                        form.find('input[name="idkategori"]').val() = "";
                        form.find('input[name="barang"]').val() = "";
                        form.find('input[name="stok"]').val() = "";
                    } else {
                        var errors = response.errors;
                        $.each(errors, function(field, message) {
                            let errorElement = $('#' + field + '-errorUpdate');
                            errorElement.html(message);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('.delete-barang').on('click', function(event) {
            id = $(this).data('id');
            event.preventDefault();
            $('#delete-barang-confirm').modal('show');
        });

        $('.delete-barang-confirm').click(function() {
            $.ajax({
                url: '<?= base_url('delete_data_barang'); ?>',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
</body>

</html>