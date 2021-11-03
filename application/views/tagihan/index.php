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
                                        <select id="list-rusun-daftartagihan" class="form-control">
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
                                        <button id="search-daftartagihan" name="search" type="submit" class="btn btn-primary">Cari!</button>
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
                        <h4 class="card-title jdlbyr">Tagihan Bulan <?= $this->uri->segment(4); ?> <?= $this->uri->segment(5); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPembayaran" class="table table-responsive-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No. Kamar</th>
                                        <th>Jumlah Tagihan</th>
                                        <th>Status</th>
                                        <th>#</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php if (count($tagihan) <= 0) : ?>
                                        <tr>
                                            <td colspan="6" class="text-center"><em>Tidak ada data dalam bulan ini</em></td>
                                        </tr>
                                    <?php else : ?>

                                        <?php foreach ($tagihan as $tghn) : ?>
                                            <tr>
                                                <td><?= $tghn['nama_penghuni']; ?></td>
                                                <td><?= $tghn['no_kamar']; ?></td>
                                                <td><?= rupiah($tghn['harga_lantai']); ?></td>

                                                <?php if ($tghn['is_bayar'] == 1) : ?>
                                                    <td><span class="badge badge-success"><?= ucwords('lunas'); ?></span></td>
                                                    <td>
                                                        <i class="btn btn-success fa fa-check"></i>
                                                    </td>
                                                <?php else : ?>
                                                    <td><span class="badge badge-warning"><?= ucwords('belum bayar'); ?></span></td>
                                                    <td>
                                                        <a href="<?= base_url('main/bayar/' . $tghn['penghuni_id'] . '/' . $tghn['bulan'] . '/' . $tghn['tahun']) ?>" class="btn btn-warning bayar-tagihan" data-id="" data-bayar="<?= $tghn['harga_lantai']; ?>" data-toggle="tooltip" data-placement="top" title="Bayar"><i class="fa fa-cart-plus"></i></a>
                                                    </td>
                                                <?php endif; ?>

                                            </tr>
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