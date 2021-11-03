<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title jdlbyr">Total Pendapatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPembayaran" class="table table-responsive-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rusun</th>
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