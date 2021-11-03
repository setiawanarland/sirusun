<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">
        

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rusun Management</h4>
                    <div class="row mr-1">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAddRusun">Add Rusun</a>    
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <?= form_error('nama-rusun', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('alamat-rusun', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('jml-lantai', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('jml-kamar', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>

                            </div>
                        </div>
                        

                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rusun</th>
                                        <th>Total Lantai</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($rusun as $rsn) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $rsn['nama_rusun']; ?></td>
                                            <td><?= $rsn['lantai']; ?></td>
                                            <td>

                                                <?php if ($rsn['is_active'] == 1) : ?>
                                                    <input type="checkbox" class="switcher-rusun" checked data-rusun="<?= $rsn['id']; ?>" data-active="<?= $rsn['is_active']; ?>" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-width="60">
                                                <?php else : ?>
                                                    <input type="checkbox" class="switcher-rusun" data-rusun="<?= $rsn['id']; ?>" data-active="<?= $rsn['is_active']; ?>" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-width="60">
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/rusunaccess/'. $rsn['id']); ?>" data-toggle="tooltip" class="btn btn-primary" data-placement="top" title="Access"><i class="fa fa-universal-access"></i></a>
                                                <a href="<?= base_url('admin/editrusun/'. $rsn['id']); ?>" data-toggle="tooltip" class="btn btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deleterusun/'. $rsn['id']); ?>" data-toggle="tooltip" class="btn btn-danger btn-del" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                <!-- <a href="<?= base_url('admin/inforusun/'. $rsn['id']); ?>" data-toggle="tooltip" class="btn btn-secondary" data-placement="top" title="Info"><i class="fa fa-info-circle"></i></a> -->
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
    <div class="modal fade" id="modalAddRusun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form action="<?= base_url('admin/rusun'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama-rusun" name="nama-rusun" placeholder="Nama Rusun..">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat-rusun" name="alamat-rusun" placeholder="Alamat Rusun..">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                  <label class="form-check-label" for="is_active">
                                    Active?
                                  </label>
                                </div>
                            </div>   
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