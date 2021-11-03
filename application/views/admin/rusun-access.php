<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">
        

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Access for <small><?= $rusun['nama_rusun']; ?></small></h4>
                    
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($users as $user) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $user['username']; ?></td>
                                            <td>
                                                <div class="form-check">
                                                  <input type="checkbox" class="rusun-access" <?= check_rusun_access($rusun['id'], $user['id']); ?> data-rusun="<?= $rusun['id']; ?>" data-user="<?= $user['id']; ?>" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-width="60">
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