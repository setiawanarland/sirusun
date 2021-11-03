<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">
        

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Role for <small><?= $role['role']; ?></small></h4>
                    
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu</th>
                                        <th>Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($menus as $menu) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $menu['menu']; ?></td>
                                            <td>
                                                <div class="form-check">
                                                  <input type="checkbox" class="role-access" <?= check_access($role['id'], $menu['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $menu['id']; ?>" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger">
                                                </div>
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