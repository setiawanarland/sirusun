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
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>