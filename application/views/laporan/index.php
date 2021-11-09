<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pencarian</h4>
                    </div>
                    <div class="card-body textHitam">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="basic-form">
                                    <div class="form-group">
                                        <select id="list-rusun-laporan" class="form-control">
                                            <?php foreach ($rusun as $rsn) : ?>
                                                <?php if ($rsn['id'] == $this->uri->segment(3)) : ?>
                                                    <option value="<?= $rsn['id']; ?>" selected><?= $rsn['nama_rusun']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $rsn['id']; ?>"><?= $rsn['nama_rusun']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="basic-form">
                                    <div class="form-group">
                                        <input type="text" id="yearpicker" class="form-control datepicker" placeholder="Pilih Bulan" />
                                    </div>
                                    <div class="form-group">
                                        <button id="search-laporan" name="search" type="submit" class="btn btn-primary">Cari!</button>
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title jdlbyr">Laporan Tahunan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm table-bordered">
                                <thead class="text-center">

                                    <tr>
                                        <th class="align-middle" rowspan="6">No. Kamar</th>
                                        <th class="align-middle" rowspan="2">Nama</th>
                                        <th class="align-middle" rowspan="2">Pekerjaan</th>
                                        <th class="align-middle" colspan="12">Pembayaran Bulanan</th>
                                        <th class="align-middle" rowspan="2">Jumlah</th>
                                    </tr>
                                    <tr>
                                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                                            <th><?= $i; ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($kamar as $kmr) : ?>
                                        <tr>

                                            <?php
                                            $query = "SELECT `kamar`.*, `lantai`.`harga_lantai`, `penghuni`.*, `tagihan`.`tgl_tenggat`, `tagihan`.`is_bayar`, SUM(`lantai`.`harga_lantai`) AS jumlah
                                            FROM `penghuni`
                                            LEFT JOIN `tagihan` ON `penghuni`.`id` = `tagihan`.`penghuni_id`
                                            LEFT JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
                                            LEFT JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
                                            LEFT JOIN `rusun` ON `lantai`.`rusun_id` = `rusun`.`id`
                                            WHERE `penghuni`.`kamar_id` = $kmr[id] AND YEAR(`tagihan`.`tgl_tenggat`) = $tahun
                                            GROUP BY `penghuni`.`id`";
                                            $penghuni = $this->db->query($query)->result_array();
                                            ?>

                                            <?php if (count($penghuni) > 1) : ?>
                                                <td rowspan="<?= count($penghuni) ?>"><?= $kmr['no_kamar']; ?></td>
                                            <?php else : ?>
                                                <td><?= $kmr['no_kamar']; ?></td>
                                            <?php endif; ?>

                                            <?php foreach ($penghuni as $pghn) : ?>
                                                <td><?= $pghn['nama_penghuni']; ?></td>
                                                <td><?= $pghn['pekerjaan']; ?></td>

                                                <?php for ($i = 1; $i <= 12; $i++) : ?>

                                                    <?php if ($i == date('m', strtotime($pghn['tgl_tenggat'])) && $pghn['is_bayar'] == 1) : ?>
                                                        <td class="text-center"><i class="fas fa-check"></td>
                                                    <?php elseif ($i == date('m', strtotime($pghn['tgl_tenggat'])) && $pghn['is_bayar'] != 1) : ?>
                                                        <td class="text-center"><i class="fas fa-times"></i></td>
                                                    <?php elseif ($i < date('m', strtotime($pghn['tgl_masuk']))) : ?>
                                                        <td></td>
                                                    <?php else : ?>
                                                        <td></td>
                                                    <?php endif; ?>
                                                <?php endfor; ?>

                                                <?php if ($pghn['is_bayar'] == 1) : ?>
                                                    <td><?= rupiah($pghn['jumlah']); ?></td>
                                                <?php else : ?>
                                                    <td><?= rupiah(0); ?></td>
                                                <?php endif; ?>

                                        </tr>
                                    <?php endforeach; ?>

                                <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>