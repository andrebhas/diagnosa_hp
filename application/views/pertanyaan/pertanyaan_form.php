<?php 
    $ci =& get_instance();;
?>

<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Pertanyaan</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
                    <label for="pertanyaan">Pertanyaan <?php echo form_error('pertanyaan') ?></label>
                    <textarea class="form-control" rows="3" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan"><?php echo $pertanyaan; ?></textarea>
                </div>
				<div class="form-group">
                    <label for="varchar">Kode <?php echo form_error('kode') ?></label>
                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                </div>
				<div class="form-group">
                    <label for="int">Id Jenis Kerusakan <?php echo form_error('id_jenis_kerusakan') ?></label>
                    <input type="text" class="form-control" name="id_jenis_kerusakan" id="id_jenis_kerusakan" placeholder="Id Jenis Kerusakan" value="<?php echo $id_jenis_kerusakan; ?>" />
                </div>
				<div class="form-group">
                    <label for="int">Ya <?php echo form_error('ya') ?></label>
                    <input type="text" class="form-control" name="ya" id="ya" placeholder="Ya" value="<?php echo $ya; ?>" />
                </div>
				<div class="form-group">
                    <label for="int">Tidak <?php echo form_error('tidak') ?></label>
                    <input type="text" class="form-control" name="tidak" id="tidak" placeholder="Tidak" value="<?php echo $tidak; ?>" />
                </div>
				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('pertanyaan') ?>" class="btn btn-default">Cancel</a>
			</form>
        
        </div>
    </div>
</div>