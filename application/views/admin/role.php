<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">
        

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Role</h4>
                    <div class="row mr-1">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAddRole">Add Role</a>    
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col lg-6">
                            <?= form_error('role', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>
                        </div>
                        </div>
                        

                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($roles as $role) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $role['role']; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/roleaccess/'. $role['id']); ?>" data-toggle="tooltip" class="btn btn-primary" data-placement="top" title="Access"><i class="fa fa-universal-access"></i></a>
                                                <a href="<?= base_url('admin/editrole/'. $role['id']); ?>" data-toggle="tooltip" class="btn btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deleterole/'. $role['id']); ?>" data-toggle="tooltip" class="btn btn-danger btn-del" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control input-default" id="role" name="role" placeholder="Role Name" autocomplete="off">
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