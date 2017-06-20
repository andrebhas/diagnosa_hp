<?php 
    $ci =& get_instance();;
?>
<script src="<?= base_url('assets/js/ckeditor/ckeditor.js') ?>"></script>
<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Solusi</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
                    <label for="varchar">Kode <?php echo form_error('kode') ?></label>
                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                </div>
				<div class="form-group">
                    <label for="solusi">Solusi <?php echo form_error('solusi') ?></label>
                    <textarea class="form-control" rows="3" name="solusi" id="solusi" placeholder="Solusi"><?php echo $solusi; ?></textarea>
                </div>
				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('solusi') ?>" class="btn btn-default">Cancel</a>
			</form>
        </div>
    </div>
</div>
 <script>
    CKEDITOR.replace( 'solusi' );
</script>