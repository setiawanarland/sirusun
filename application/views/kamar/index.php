<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Kamar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="basic-form">

                                    <div class="form-group">
                                        <select id="list-rusun-daftarkamar" class="form-control">
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
                                        <button id="search-daftarkamar" name="search" type="submit" class="btn btn-primary">Cari!</button>
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
                        <h4 class="card-title">
                            Total Kamar : <b><?= $total_kamar['kamar']; ?></b> | Total Kosong : <b><?= $total_kosong; ?></b> | Total terisi : <b><?= $total_terisi; ?></b>
                        </h4>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <?= form_error('nama-penghuni', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('nik-penghuni', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('no-kk-penghuni', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('ktp-penghuni', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('kk-penghuni', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                            </div>
                        </div>

                        <div class="card-body">

                            <?php $i = 1; ?>
                            <?php foreach ($lantai as $lnt) : ?>

                                <?php

                                $this->db->where('status', 0);
                                $this->db->where('lantai_id', $lnt['id']);
                                $kamar_kosong = $this->db->count_all_results('kamar');

                                $this->db->where('status', 1);
                                $this->db->where('lantai_id', $lnt['id']);
                                $kamar_terisi = $this->db->count_all_results('kamar');

                                ?>

                                <div id="accordion<?= $i; ?>" class="accordion accordion-header-shadow accordion-rounded ">
                                    <div class="accordion__item">
                                        <div class="accordion__header" data-toggle="collapse" data-target="#default_collapse<?= $i; ?>">
                                            <span class="accordion__header--text">
                                                <b><?= $lnt['nama_lantai']; ?>, <?= rupiah($lnt['harga_lantai']); ?></b> <i class="fas fa-ellipsis-v"></i> <i class="far fa-check-circle textHitam text-success" data-toggle="tooltip" data-replacement="top" title="<?= $kamar_kosong; ?> Kamar Kosong"></i> <i class="far fa-times-circle textHitam text-danger" data-toggle="tooltip" data-replacement="top" title="<?= $kamar_terisi; ?> Kamar Terisi"></i>
                                            </span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>

                                        <?php

                                        $lantai_id = $lnt['id'];
                                        $query = "SELECT `kamar`.`id` AS `kamar_id`, `kamar`.*
                                                      FROM `kamar`
                                                      JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
                                                      WHERE `kamar`.`lantai_id` = $lantai_id
                                                      ";
                                        // execute query sub menu
                                        $kamar = $this->db->query($query)->result_array();

                                        ?>

                                        <div class="row">
                                            <?php foreach ($kamar as $kmr) : ?>

                                                <div id="default_collapse<?= $i; ?>" class="collapse accordion__body show" data-parent="#accordion<?= $i; ?>">

                                                    <div class="accordion__body--text">
                                                        <div class="card kamar view view-first mb-0 ml-0" data-status="<?= $kmr['status']; ?>">
                                                            <div class="textHitam">
                                                                <b><?= $kmr['no_kamar']; ?></b>
                                                            </div>
                                                            <div>
                                                                <i class="fas fa-door-open fa-5x textHitam"></i>
                                                            </div>
                                                            <div class="mask">
                                                                <div class="tools tools-bottom">
                                                                    <a href="penghuni/tambah" id="btnTambahPenghuni" class="btnTambahPenghuni" data-toggle="modal" data-target="#modalTambahPenghuni" data-nomor="<?= $kmr['no_kamar']; ?>" data-id="<?= $kmr['kamar_id']; ?>" title="Tambah"><i class="fa fa-plus fa-3x"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        </div>


                                    </div>
                                </div>

                                <?php $i++; ?>
                            <?php endforeach; ?>

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