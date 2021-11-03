<div class="content-body">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="card">
            		<div class="card-header">
            			<h4 class="card-title">Edit Submenu</h4>
            		</div>
            		<div class="card-body">
            			<div class="basic-form">
            				<div class="col-lg-6">
				            	<?= validation_errors('<div class="alert alert-danger solid alert-dismissible fade show" role="alert"" role="alert">
				            		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            		<span aria-hidden="true">&times;</span>
				            		</button>','</div>'); ?>
	            				<form action="" method="post">
	            					<div class="form-group">
                                        <input type="text" class="form-control" id="submenu" name="submenu" value="<?= $submenu['sub_menu']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option value="">Select Menu</option>
                                            <?php foreach ($menu as $m) : ?>
                                                <?php if ($m['id'] == $submenu['menu_id']) : ?>
                                                    <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                          <?php if ($submenu['is_active'] == 1) : ?>
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                          <?php else : ?>
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active">
                                          <?php endif; ?>
                                          <label class="form-check-label" for="is_active">
                                            Active?
                                          </label>
                                        </div>
                                    </div>
	            					<div class="form-group">
	            						<button type="submit" class="btn btn-primary">Edit</button>
	            					</div>
	            				</form>
	            			</div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>