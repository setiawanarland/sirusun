<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="tahun-pendapatan" id="" data-tahun="[<?php foreach ($tahun_pendapatan as $thn_pdpt) : ?><?= $thn_pdpt['tahun'] ?><?php endforeach; ?>]"></div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <a href="<?= base_url('main/totalpendapatan') ?>">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Total Pendapatan </div>
                                <div class="stat-digit"><?= rupiah($total_pendapatan['jumlah_pendapatan']); ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary w-100" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="<?= base_url('main/pendapatanbulanini') ?>">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Pendapatan Bulan Ini</div>
                                <div class="stat-digit"><?= rupiah($pendapatan_bulan_ini['jumlah_pendapatan']); ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success w-100" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="<?= base_url('main/pendapatanbulanlalu') ?>">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Pendapatan Bulan Lalu</div>
                                <div class="stat-digit"><?= rupiah($pendapatan_bulan_lalu['jumlah_pendapatan']); ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="<?= base_url('main/tunggakan') ?>">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Jumlah Tunggakan</div>
                                <div class="stat-digit"><?= rupiah(0); ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger w-100" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>

        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monitor Tagihan Pembayaran Bulan</h4>
                        <div class="row mb-3">
                            <div class="basic-form">
                                <div class="form-group">
                                    <select id="list-rusun-daftartagihan" class="form-control mr-2">
                                        <?php foreach ($rusun as $rsn) : ?>
                                            <option value="<?= $rsn['id']; ?>"><?= $rsn['nama_rusun']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-responsive-sm" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No. Kamar</th>
                                        <th>Jumlah Tagihan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($tagihan as $tghn) : ?>

                                        <tr>
                                            <td><?= $tghn['nama_penghuni']; ?></td>
                                            <td><?= $tghn['no_kamar']; ?></td>
                                            <td><?= rupiah($tghn['harga_lantai']); ?></td>

                                            <?php if ($tghn['is_bayar'] == 1) : ?>
                                                <td><span class='badge badge-success'><?= ucwords('lunas'); ?></span></td>
                                            <?php else : ?>
                                                <td><span class='badge badge-warning'><?= ucwords('belum bayar'); ?></span></td>
                                            <?php endif; ?>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monitor Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>