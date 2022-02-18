<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Bahan Baku Produksi dan Oprasional</h1>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div style="float:right">
                            <a href="#AddPart" class="btn btn-mini btn-block btn-success" data-toggle="modal"><span class="fa fa-plus"></span> Tambah</a>
                            <a href="<?= site_url("bahan/cetakData") ?>" class="btn btn-mini btn-block btn-success" target="_blank">Cetak Data</a>
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
                                    <th>Nama bahan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th style="text-align: center;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (isset($pemb_bhn)) {
                                    foreach ($pemb_bhn as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?php echo $row->nm_bhn; ?></td>
                                            <td><?php echo $row->jumlah; ?></td>
                                            <td><?php echo $row->harga; ?></td>
                                            <td><?php echo $row->tanggal; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>
                                            <td align="center">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#updatebahan">Edit</button>
                                                <a class="btn btn-danger" href="<?php echo site_url('bahan/hapus/' . $row->id); ?>" onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>


                        <div class="modal fade" id="updatebahan" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h3 class="modal-title">Edit Bahan Baku</h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body form">
                                        <form class="form" method="post" action="<?php echo site_url('bahan/edit'); ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Nama bahan</label>
                                                        <input name="nm_bhn" placeholder="" class="form-control">
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label class="form-label">jumlah </label>
                                                        <input name="jumlah" placeholder="" class="form-control" type="number">
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Total Harga</label>
                                                        <input name="harga" placeholder="" class="form-control" type="number">
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label class="form-label">Tanggal</label>
                                                        <input name="tanggal" placeholder="" class="form-control" type="date">
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label class="form-label">Keterangan</label>
                                                        <input name="keterangan" placeholder="" class="form-control">
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

                    <div class="modal fade" id="AddPart" role="dialog">
                        <div role="document" class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                                    <h3 class="modal-title">tambah data</h3>

                                    <div class="modal-body form">
                                        <form class="form" method="post" action="<?php echo site_url('bahan/tambah'); ?>">
                                            <div class="row">
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label">Nama bahan</label>
                                                    <input name="nm_bhn" placeholder="" class="form-control">
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <label class="form-label">jumlah </label>
                                                    <input name="jumlah" placeholder="" class="form-control" type="number">
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label">Total Harga</label>
                                                    <input name="harga" placeholder="" class="form-control" type="number">
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <label class="form-label">Tanggal</label>
                                                    <input name="tanggal" placeholder="" class="form-control" type="date">
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <label class="form-label">Keterangan</label>
                                                    <input name="keterangan" placeholder="" class="form-control">
                                                </fieldset>
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
    </section>
</div>

</div>
<!-- End of Main Content -->