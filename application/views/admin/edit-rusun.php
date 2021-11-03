<div class="content-body">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="card">
            		<div class="card-header">
            			<h4 class="card-title">Edit Rusun</h4>
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
                                        <input type="text" class="form-control" id="nama-rusun" name="nama-rusun" value="<?= $rusun['nama_rusun']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="alamat-rusun" name="alamat-rusun" value="<?= $rusun['alamat_rusun']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                          <?php if ($rusun['is_active'] == 1) : ?>
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