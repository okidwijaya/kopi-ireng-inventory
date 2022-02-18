<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Jenis Produk</h1>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <div style="float:right">
                            <a href="#AddPart" class="btn btn-mini btn-block btn-success" data-toggle="modal"><span class="fa fa-plus"></span> Tambah</a>
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
                                    <th style="text-align: center;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (isset($jns_produk)) {
                                    foreach ($jns_produk as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->kd_jns; ?></td>
                                            <td><?php echo $row->nama_produk; ?></td>
                                            <td align="center">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#updatejns">Edit</button>
                                                <a class="btn btn-danger" href="<?php echo site_url('jns/hapus/' . $row->id); ?>" onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="modal fade" id="updatejns" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h3 class="modal-title">Edit Jenis Produk</h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body form">
                                        <form class="form" method="post" action="<?php echo site_url('jns/edit'); ?>">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Kode Produk</label>
                                                        <input placeholder="" class="form-control" name="kode_produk">
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label class="form-label">Nama Produk</label>
                                                        <input placeholder="" class="form-control" name="nama_produk">
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
</div>
</section>

<div class="modal fade" id="AddPart" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close">&times;</button>
                <h3 class="modal-title">Tambah Jenis Produk</h3>
            </div>
            <div class="modal-body form">
                <form class="form" method="post" action="<?php echo site_url('jns/tambah'); ?>">
                    <div class="row">

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label class="form-label">Kode Produk</label>
                                <input placeholder="" class="form-control" name="kode_produk">
                            </fieldset>

                            <fieldset class="form-group">
                                <label class="form-label">Nama Produk</label>
                                <input placeholder="" class="form-control" name="nama_produk">
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