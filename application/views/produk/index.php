<div class="container-fluid">

    <!-- Page Heading menu menampilkan -->
    <h1 class="h3 mb-4 text-gray-800">Produk</h1>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div style="float:right">
                            <a href="#AddPart" class="btn btn-mini btn-block btn-success" data-toggle="modal"><span class="fa fa-plus"></span> Tambah</a>
                            <a href="<?= site_url("produk/cetakData") ?>" class="btn btn-mini btn-block btn-success" target="_blank">Cetak Data</a>
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
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>keterangan</th>
                                    <th style="text-align: center;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (isset($produk)) {
                                    foreach ($produk as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->id_jns; ?></td>
                                            <td><?= $row->nama_produk; ?></td>
                                            <td><?php echo $row->stok; ?></td>
                                            <td><?php echo $row->harga; ?></td>
                                            <td><?php echo $row->tanggal; ?></td>
                                            <td></td>
                                            <td align="center">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#updateproduk">Edit</button>
                                                <a class="btn btn-danger" href="<?php echo site_url('produk/hapus/' . $row->id); ?>" onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="modal fade" id="updateproduk" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h3 class="modal-title">Edit Produksi</h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body form">
                                        <form class="form" method="post" action="<?php echo site_url('produk/edit'); ?>">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Nama Produk</label>
                                                        <select class="form-control" name="kd_jns">
                                                            <?php foreach ($jns_produk as $jns) : ?>
                                                                <option value="<?= $jns->kd_jns; ?>"><?= $jns->nama_produk; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label class="form-label">Stok</label>
                                                        <input name="stok" placeholder="Stok" class="form-control" type="number" required>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Harga</label>
                                                        <input name="harga" placeholder="Harga" class="form-control" type="number" required>
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label class="form-label">Tanggal</label>
                                                        <input name="tanggal" placeholder="Tanggal" class="form-control" type="date" required>
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
                <form class="form" method="post" action="<?php echo site_url('produk/tambah'); ?>">
                    <div class="row">

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label class="form-label">Nama Produk</label>
                                <select class="form-control" name="kd_jns">
                                    <?php foreach ($jns_produk as $jns) : ?>
                                        <option value="<?= $jns->kd_jns; ?>"><?= $jns->nama_produk; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </fieldset>

                            <fieldset class="form-group">
                                <label class="form-label">Stok</label>
                                <input name="stok" placeholder="Stok" class="form-control" type="number" required>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label class="form-label">Harga</label>
                                <input name="harga" placeholder="Harga" class="form-control" type="number" required>
                            </fieldset>

                            <fieldset class="form-group">
                                <label class="form-label">Tanggal</label>
                                <input name="tanggal" placeholder="Tanggal" class="form-control" type="date" required>
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

<div class="modal fade" id="updatepenjualan" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close">&times;</button>
                <h3 class="modal-title">Update Penjualan</h3>
            </div>
            <div class="modal-body form">
                <form class="form" method="post" action="<?php echo site_url('produk/tambah'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label class="form-label">Stok</label>
                                <input class="form-control" min="0" name="jumlah" type="number">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Nama Produk</label>
                                <input class="form-control" min="0" name="jumlah" type="number">
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
</div>
<!-- End of Main Content -->