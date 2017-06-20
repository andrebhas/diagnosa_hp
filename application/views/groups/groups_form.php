<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Groups</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
                    <label for="varchar">Name <?php echo form_error('name') ?></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                </div>
				<div class="form-group">
                    <label for="varchar">Description <?php echo form_error('description') ?></label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
                </div>
				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('groups') ?>" class="btn btn-default">Cancel</a>
			</form>
        
        </div>
    </div>
</div>