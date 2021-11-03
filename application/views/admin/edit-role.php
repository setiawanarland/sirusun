<div class="content-body">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="card">
            		<div class="card-header">
            			<h4 class="card-title">Edit Role</h4>
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
	            						<input type="text" id="role" name="role" class="form-control input-default " value="<?= $role['role']; ?>">
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