<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />

<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> User</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
            <?php if ($button == 'Update'): ?>
                <?php echo form_open($action); ?>
            <?php else: ?>
                <?php echo form_open_multipart($action);?>
            <?php endif ?>

                <div class="row">
                    
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="varchar">Nama <?php echo form_error('name') ?></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">No Telepon <?php echo form_error('phone') ?></label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                        </div>
                         <?php if ($button == 'Update'): ?>

                            <a data-toggle="modal" href="#modal_foto" class="btn btn-warning" >
                                <img width="150" height="150" src="<?php echo base_url('images/users/'.$user_img) ?>">
                            </a> 

                        <?php else: ?>

                            <div class="form-group">
                                <label for="varchar">User Image <?php echo form_error('user_img') ?></label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" name="user_img" class="default" />
                                        </span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="varchar">User Level<?php echo form_error('group_id') ?></label>
                            <select  <?php if($id == $user->id){ echo 'disabled ';}?> class="form-control" name="group_id" id="group_id">
                                <option value=""> Pilih .... </option>
                                <?php foreach ($grup as $g): ?>
                                   <option <?php if ($groupss == $g->name) echo ' selected="selected" '; ?> value="<?= $g->id ?>"> <?= $g->name ?> </option> 
                                <?php endforeach ?>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Email <?php echo form_error('email') ?></label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Username <?php echo form_error('username') ?></label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                        </div> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        <?php if ($button == 'Update'): ?>
                                <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                                <a data-toggle="modal" href="#modal_password" class="btn btn-warning" > Ubah Password </a> 
                        <?php else: ?>
                                <div class="form-group">
                                    <label for="varchar">Password <?php echo form_error('password') ?></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Konfirmasi Password <?php echo form_error('password2') ?></label>
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" />
                                </div>
                                <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
                        <?php endif ?>                        
                            
                    </div>

                </div>

			</form>
        
        </div>
    </div>
</div>


                            <div class="modal fade" id="modal_foto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Ganti Foto</h4>
                                        </div>
                                        <div class="modal-body">

                                            <?php 
                                                $link = site_url('users/ubah_foto/'.$id);
                                                echo form_open_multipart($link) ;
                                            ?>

                                            <div class="form-group">
                                                <label for="varchar">Foto <?php echo $this->session->flashdata('error_gambar'); ?></label>
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img width="150" height="150" src="<?php echo base_url('images/users/'.$user_img) ?>" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" name="user_img" class="default" value="<?= $user_img?>" />
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-warning" type="submit"> Simpan</button>
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                             <div class="modal fade" id="modal_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Ganti Passwords</h4>
                                        </div>
                                        <div class="modal-body">

                                            <?php 
                                                $link = site_url('users/ubah_password/'.$id);
                                                echo form_open($link);
                                            ?>

                                             <div class="form-group">
                                                <label for="varchar">Password Baru</label>
                                                <input type="password" class="form-control" name="password" id="password"  />
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-warning" type="submit"> Simpan</button>
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>