<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kamar Management</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="basic-form">
                                    
                                        <div class="form-group">
                                            <select id="list-rusun-kamar" class="form-control">
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
                                            <button id="search-kamar" name="search" type="submit" class="btn btn-primary">Cari!</button>
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
                        <h4 class="card-title">Total Kamar : <?= $total_kamar['kamar']; ?> </h4>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAddKamar">Add Kamar</a>    
                    </div>

                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <?= form_error('no-kamar', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('rusun-id', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('lantai-id', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                            </div>
                        </div>
                        

                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. Kamar</th>
                                        <th>Lantai</th>
                                        <th>Harga Kamar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kamar as $kmr) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $kmr['no_kamar']; ?></td>
                                            <td><?= $kmr['nama_lantai']; ?></td>
                                            <td><?= rupiah($kmr['harga_lantai']); ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/editkamar/'. $kmr['id']); ?>" data-toggle="tooltip" class="btn btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deletekamar/'. $kmr['id']); ?>" data-toggle="tooltip" class="btn btn-danger btn-del" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <?php $i++; ?>

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


<!-- Logout Modal-->
    <div class="modal fade" id="modalAddKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Rusun</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form action="<?= base_url('admin/kamar'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="no-kamar" name="no-kamar" placeholder="Nomor Kamar..">
                            </div>
                            <div class="form-group">
                                <select id="rusun-id" name="rusun-id" class="form-control">
                                    <option value="">Pilih Rusun</option>
                                    <?php foreach ($rusun as $rsn) : ?>
                                    <option value="<?= $rsn['id']; ?>"><?= $rsn['nama_rusun']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                             <div class="form-group">
                                <select id="lantai-id" name="lantai-id" class="form-control">
                                    <option value="">Pilih Lantai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="harga-lantai" name="harga-lantai" placeholder="Harga lantai.." readonly>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>