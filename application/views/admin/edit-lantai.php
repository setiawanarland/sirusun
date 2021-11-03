<div class="content-body">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="card">
            		<div class="card-header">
            			<h4 class="card-title">Edit Lantai</h4>
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
                                        <select id="rusun-id" name="rusun-id" class="form-control">
                                            <option value="">Pilih Rusun</option>
                                            <?php foreach ($rusun as $rsn) : ?>
                                                <?php if ($rsn['id'] == $lantai['rusun_id']) : ?>
                                                    <option value="<?= $rsn['id']; ?>" selected><?= $rsn['nama_rusun']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $rsn['id']; ?>"><?= $rsn['nama_rusun']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama-lantai" name="nama-lantai" value="<?= $lantai['nama_lantai']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="harga-lantai" name="harga-lantai" value="<?= $lantai['harga_lantai']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                          <?php if ($lantai['is_active'] == 1) : ?>
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