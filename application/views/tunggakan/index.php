<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title jdlbyr">Total Tunggakan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPembayaran" class="table table-responsive-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rusun</th>
                                        <th>Jumlah Tunggakan</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php if (count($daftar_tunggakan) <= 0) : ?>
                                        <tr>
                                            <td colspan="4" class="text-center"><em>Tidak ada data dalam bulan ini</em></td>
                                        </tr>
                                    <?php else : ?>

                                        <?php foreach ($daftar_tunggakan as $tgk) : ?>

                                            <tr>
                                                <td><?= $tgk['nama_rusun']; ?></td>
                                                <td><?= rupiah($tgk['jumlah_tunggakan']); ?></td>
                                            </tr>

                                        <?php endforeach; ?>

                                        <tr>
                                            <th class="text-center">TOTAL</th>
                                            <th><?= rupiah($jumlah_tunggakan['jumlah_tunggakan']); ?></th>
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