<div class="content-body">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    
    <?php $this->session->set_flashdata('flash', ''); ?>
    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lantai Management</h4>  
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="basic-form">
                                    
                                        <div class="form-group">
                                            <select id="list-rusun-kamar" class="form-control">
                                                <?php foreach ($rusun as $rsn) : ?>
                                                    <?php if ($rsn['id'] == $this->uri->segment(3)) : ?>
                                                        <option value="<?= $rsn['id']; ?>" selected><?= $rsn['nama_rusun']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $rsn['id']; ?>"><?= $rsn['nama_rusun']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button id="search-lantai" name="search" type="submit" class="btn btn-primary">Cari!</button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div id="list-lantai" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Total Lantai : <?= $total_lantai['lantai']; ?> </h4>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAddLantai">Add Lantai</a>  
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <?= form_error('rusun-id', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('nama-lantai', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                                <?= form_error('harga-lantai', '<div class="alert alert-danger solid" role="alert"><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>', '</div>'); ?>
                            </div>
                        </div>
                        

                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lantai</th>
                                        <th>Harga Lantai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($lantai as $lnt) : ?>

                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td id="nama-lantai"><?= $lnt['nama_lantai']; ?></td>
                                            <td id="harga-lantai"><?= rupiah($lnt['harga_lantai']); ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/editlantai/'. $lnt['id']); ?>" data-toggle="tooltip" class="btn btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deletelantai/'. $lnt['id']); ?>" data-toggle="tooltip" class="btn btn-danger btn-del" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="modalAddLantai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Lantai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form action="<?= base_url('admin/lantai'); ?>" method="post">
                            <div class="form-group">
                                <select id="rusun-id" name="rusun-id" class="form-control">
                                    <option value="">Pilih Rusun</option>
                                    <?php foreach ($rusun as $rsn) : ?>
                                    <option value="<?= $rsn['id']; ?>"><?= $rsn['nama_rusun']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama-lantai" name="nama-lantai" placeholder="Nama lantai..">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="harga-lantai" name="harga-lantai" placeholder="Harga lantai..">
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