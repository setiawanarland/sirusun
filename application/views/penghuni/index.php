<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Penghuni</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="basic-form">

                                    <div class="form-group">
                                        <select id="list-rusun-daftarpenghuni" class="form-control">
                                            <?php foreach ($rusun as $rsn) : ?>
                                                <?php if ($rsn['id'] == $this->uri->segment(3)) : ?>
                                                    <option value="<?= $rsn['id']; ?>" selected><?= $rsn['nama_rusun']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $rsn['id']; ?>"><?= $rsn['nama_rusun']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button id="search-daftarpenghuni" name="search" type="submit" class="btn btn-primary">Cari!</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div id="list-kamar" class="card">

                    <div class="card-header">
                        <!-- <h4 class="card-title">
                            Total Kamar  : <b><?= $total_kamar['kamar']; ?></b> | Total Kosong : <b><?= $total_kosong; ?></b> | Total terisi : <b><?= $total_terisi; ?></b>
                        </h4> -->
                    </div>

                    <div class="card-body">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Penghuni</th>
                                            <th>No. Kamar</th>
                                            <th>Tgl. Masuk</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if (count($penghuni) <= 0) : ?>
                                            <tr>
                                                <td colspan="6" class="text-center"><em>Tidak ada data penghuni pada rusun ini</em></td>
                                            </tr>
                                        <?php else : ?>

                                            <?php $i = 1; ?>
                                            <?php foreach ($penghuni as $pnghn) : ?>

                                                <tr>
                                                    <th><?= $i; ?></th>
                                                    <td><?= $pnghn['nama_penghuni']; ?></td>
                                                    <td><?= $pnghn['no_kamar']; ?></td>
                                                    <td><?= format_indo($pnghn['tgl_masuk']); ?></td>
                                                    <td>
                                                        <a href="<?= base_url('assets/images/penghuni/' . $pnghn['kk_penghuni']); ?>" data-lightbox="foto-<?= $pnghn['kk_penghuni'] ?>" data-title="<?= $pnghn['kk_penghuni'] ?>" data-toggle="tooltip" data-placement="top" title="Lihat KK"><i class="fa fa-credit-card btn btn-primary"></i></a>
                                                        <a href="<?= base_url('assets/images/penghuni/' . $pnghn['ktp_penghuni']); ?>" class="" data-lightbox="foto-<?= $pnghn['ktp_penghuni'] ?>" data-title="<?= $pnghn['ktp_penghuni'] ?>" data-toggle="tooltip" data-placement="top" title="Lihat KTP"><i class="fa fa-id-card btn btn-primary"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('main/penghunicheckout/' . $pnghn['id'] . '/' . $rusun_id); ?>" class="check-out" data-toggle="tooltip" data-placement="top" title="Check Out"><i class="fa fa-sign-out btn btn-danger"></i></a>


                                                    </td>
                                                </tr>

                                                <?php $i++; ?>
                                            <?php endforeach; ?>

                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahPenghuni">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judulModalPenghuni">Tambah Penghuni</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="rusun-id" name="rusun-id">
                        <input type="hidden" id="kamar-id" name="kamar-id">
                        <div class="form-row textHitam">
                            <div class="form-group col-md-12">
                                <label>Nomor Kamar</label>
                                <input type="text" readonly id="no-kamar" name="no-kamar" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nama Penghuni</label>
                                <input type="text" id="nama-penghuni" name="nama-penghuni" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label>NIK Penghuni</label>
                                <input type="text" id="nik-penghuni" name="nik-penghuni" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label>No. KK Penghuni</label>
                                <input type="text" id="no-kk-penghuni" name="no-kk-penghuni" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label>KTP Penghuni</label>
                                <input type="file" id="ktp-penghuni" name="ktp-penghuni" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label>KK Penghuni</label>
                                <input type="file" id="kk-penghuni" name="kk-penghuni" class="form-control" placeholder="" autocomplete="off">
                            </div>

                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" id="btnSavePenghuni" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>