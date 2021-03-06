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
                                        <th>Jumlah Pendapatan</th>
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
                                                <td><?= $pdpt['nama_rusun']; ?></td>
                                                <td><?= rupiah($pdpt['jml_pendapatan']); ?></td>
                                            </tr>

                                        <?php endforeach; ?>

                                        <tr>
                                            <th class="text-center">TOTAL</th>
                                            <th><?= rupiah($total_pendapatan['jumlah_pendapatan']); ?></th>
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