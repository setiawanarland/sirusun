<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
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
                                        <select id="list-rusun-daftarpendapatan" class="form-control">
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
                                        <input type="text" id="datepicker" class="form-control datepicker" placeholder="Pilih Bulan" />
                                    </div>
                                    <div class="form-group">
                                        <button id="search-daftarpendapatan" name="search" type="submit" class="btn btn-primary">Cari!</button>
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
                        <h4 class="card-title jdlbyr">Pendapatan <b><?= $nama_rusun['nama_rusun']; ?></b> Bulan <?= $this->uri->segment(4); ?> <?= $this->uri->segment(5); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPembayaran" class="table table-responsive-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No. Kamar</th>
                                        <th>Tagihan Bulan</th>
                                        <th>Jumlah Bayar</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php if (count($pendapatan) <= 0) : ?>
                                        <tr>
                                            <td colspan="4" class="text-center"><em>Tidak ada data dalam bulan ini</em></td>
                                        </tr>
                                    <?php else : ?>

                                        <?php foreach ($pendapatan as $pdpt) : ?>
                                            <tr>
                                                <td><?= $pdpt['nama_penghuni']; ?></td>
                                                <td><?= $pdpt['no_kamar']; ?></td>
                                                <td><?= format_bulan_indo($pdpt['tgl_tenggat']); ?></td>
                                                <td><?= rupiah($pdpt['harga_lantai']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <tr>
                                            <th colspan="3" class="text-center">TOTAL</th>
                                            <th><?= rupiah($total_pendapatan_rusun['jumlah_pendapatan']); ?></th>
                                        </tr>

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