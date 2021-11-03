<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">
        

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Management</h4>
                    <div class="row mr-1">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">Add User</a>    
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col lg-6">
                            <?= form_error('username', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>
                            <?= form_error('password', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>
                            <?= form_error('role_id', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>
                        </div>
                        </div>
                        

                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Role Access</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($users as $user) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $user['username']; ?></td>
                                            <td><?= $user['role']; ?></td>
                                            <td>
                                                <?php if ($user['is_active'] == 1) : ?>
                                                    <input type="checkbox" class="switcher-user" checked data-user="<?= $user['id']; ?>" data-active="<?= $user['is_active']; ?>" data-toggle="toggle" data-onstyle="outline-success lg" data-offstyle="outline-danger" data-width="60">
                                                <?php else : ?>
                                                    <input type="checkbox" class="switcher-user" data-user="<?= $user['id']; ?>" data-active="<?= $user['is_active']; ?>" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-width="60">

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/resetpassword/'. $user['id']); ?>" data-toggle="tooltip" class="btn btn-danger reset-password" data-user="<?= $user['username']; ?>" data-placement="top" title="Reset"><i class="fa fa-gear"></i></a>
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
    <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control input-default" id="username" name="username" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-default" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-default" id="password2" name="password2" placeholder="Repeat Password">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="role_id" name="role_id">
                                    <option value="">Select User Role</option>
                                    <?php foreach ($roles as $role) : ?>
                                        <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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