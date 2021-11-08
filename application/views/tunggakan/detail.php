<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title jdlbyr">Detail Tunggakan <b><?= $rusun['nama_rusun']; ?></b></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPembayaran" class="table table-responsive-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Penghuni</th>
                                        <th>No. Kamar</th>
                                        <th>Tagihan Bulan</th>
                                        <th>Jumlah Tunggakan</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($detail_tunggakan as $dtl_tgk) : ?>

                                        <tr>
                                            <td><?= $dtl_tgk['nama_penghuni']; ?></td>
                                            <td><?= $dtl_tgk['no_kamar']; ?></td>
                                            <td><?= format_bulan_indo($dtl_tgk['tgl_tenggat']); ?></td>
                                            <td><?= rupiah($dtl_tgk['harga_lantai']); ?></td>
                                        </tr>

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