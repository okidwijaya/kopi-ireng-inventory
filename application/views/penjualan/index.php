<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading menu menampilkan -->
    <h1 class="h3 mb-4 text-gray-800">Penjualan</h1>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div style="float:right">
                            <a href="#AddPart" class="btn btn-mini btn-block btn-success" data-toggle="modal"><span class="fa fa-plus"></span> Tambah</a>
                            <a href="<?= site_url("penjualan/cetakData") ?>" class="btn btn-mini btn-block btn-success" target="_blank">Cetak Data</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        if ($this->session->flashdata('alert')) {
                            echo '<div class="alert alert-danger alert-message">';
                            echo $this->session->flashdata('alert');
                            echo '</div>';
                        }
                        ?>

                        <?php
                        if ($this->session->flashdata('tambah')) {
                            echo '<div class="alert alert-info alert-message">';
                            echo $this->session->flashdata('tambah');
                            echo '</div>';
                        }
                        ?>

                        <?php
                        if ($this->session->flashdata('edit')) {
                            echo '<div class="alert alert-success alert-message">';
                            echo $this->session->flashdata('edit');
                            echo '</div>';
                        }
                        ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode produk</th>
                                    <th>Nama produk</th>
                                    <th>Qauntity</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>keterangan</th>
                                    <th style="text-align: center;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                <?php foreach ($penjualan as $row) : ?>
                                    <tr  >
                                     <td><?= $row->id_produk; ?></td>
                                        <td><?= $row->kode_produk; ?></td>
                                        <td><?= $row->nm_produk; ?></td>
                                        <td><?= $row->qty; ?></td>
                                        <td><?= $row->harga; ?></td>
                                        <td><?= $row->tanggal; ?></td>
                                        <td><?= $row->keterangan_pemb; ?></td>
                                        <td align=" center">
                                            <button type="submit" class="btn btn-danger remove">Hapus</button>
                                        </td>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="AddPart" role="dialog">
        <div role="document" class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                    <h3 class="modal-title">tambah data</h3>
                </div>
                <div class="modal-body form">
                    <form class="form" method="post" action="<?php echo site_url('penjualan/tambah'); ?>">
                        <input name="nama_produk" type="text" id="nama_produk" hidden>
                        <input name="id" type="text" id="id" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label class="form-label">Nama Produk</label>
                                    <select class="form-control" name="kd_jns" id="kd_jns">
                                        <option value="select">Select Option</option>
                                        <?php foreach ($produk as $row) : ?>
                                            <option value="<?= $row->kd_jns; ?>"><?= $row->nama_produk; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label class="form-label">Stok</label>
                                    <input id="stok" name="stok" placeholder="Stok" class="form-control" type="text" readonly>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="form-label">Total Harga</label>
                                    Rp. <input class="form-control" type="text" name="totalHarga" id="totalHarga" placeholder="0">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label class="form-label">Jumlah</label>
                                    <input id="jml" name="jml" placeholder="Jumlah" class="form-control" type="number" required min="0">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="form-label">Tanggal</label>
                                    <input name="tanggal" placeholder="Tanggal" class="form-control" type="date" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="form-label">Keterangan Pembeli</label>
                                    <input class="form-control" type="text" name="keterangan" id="keterangan" placeholder="Keterangan">
                                </fieldset>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script type="text/javascript">
    $(document).ready(function() {
        let jml = 0;
        var harga;
        $('#kd_jns').on('change', function() {
            var kd_jns = $(this).val();
            $.ajax({
                url: "<?php echo site_url('penjualan/getAllKodeJns'); ?>",
                method: "POST",
                data: {
                    kd_jns: kd_jns
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    $('#stok').val(data[0].stok);
                    $('#nama_produk').val(data[0].nama_produk);
                    $('#id').val(data[0].id);
                    harga = data[0].harga;
                    console.log(data);
                }
            })
            $('#jml').on('input', function(e) {
                jml = $(this).val();
                totalHarga = jml * harga;
                $('#totalHarga').text('Rp.' + totalHarga);
                $('#totalHarga').val(totalHarga);
            })
            return false;
        })
    });
</script>
<script type="text/javascript">
    $('.remove').on('click', function() {
        var id = $(this).parents("tr").attr("id");
        var qty = $(this).parents("tr").attr("value");
        var id_produk = $(this).parents("tr").attr("name");
        var stok = $(this).parents("tr").attr("class");
        console.log(stok);
        swal("Apakah anda ingin menghapus data ini?", {
                buttons: {
                    cancel: "Tidak",
                    catch: {
                        text: "Hapus",
                        value: "catch",
                    },
                },
            })
            .then((value) => {
                if (value == "catch") {
                    $.ajax({
                        url: "<?php echo site_url('penjualan/getAllPenjualan'); ?>",
                        method: "post",
                        data: {
                            id: id,
                            qty: qty,
                            id_produk: id_produk,
                            stok: stok
                        },
                        dataType: 'json',
                        success: function(data) {

                        }
                    })
                    return false;
                } else {

                }
            });
    });
</script>