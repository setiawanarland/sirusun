<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="container-fluid">
        

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Submenu Management</h4>
                    <div class="row mr-1">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAddSubmenu">Add Submenu</a>    
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col lg-6">
                            <?= form_error('submenu', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>
                            <?= form_error('menu_id', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>
                            <?= form_error('url', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>
                            <?= form_error('icon', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>', '</div>'); ?>

                        </div>
                        </div>
                        

                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Submenu</th>
                                        <th>Menu</th>
                                        <th>URL</th>
                                        <th>Icon</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($submenus as $submenu) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $submenu['sub_menu']; ?></td>
                                            <td><?= $submenu['menu']; ?></td>
                                            <td><?= $submenu['url']; ?></td>
                                            <td><?= $submenu['icon']; ?></td>
                                            <td>

                                                <?php if ($submenu['is_active'] == 1) : ?>
                                                    <input type="checkbox" class="switcher-submenu" checked data-submenu="<?= $submenu['id']; ?>" data-active="<?= $submenu['is_active']; ?>" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-width="60">
                                                <?php else : ?>
                                                    <input type="checkbox" class="switcher-submenu" data-submenu="<?= $submenu['id']; ?>" data-active="<?= $submenu['is_active']; ?>" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-width="60">
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/editsubmenu/'. $submenu['id']); ?>" data-toggle="tooltip" class="btn btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deletesubmenu/'. $submenu['id']); ?>" data-toggle="tooltip" class="btn btn-danger btn-del" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="modalAddSubmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form action="<?= base_url('admin/submenu'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Submenu title..">
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url..">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon..">
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