<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Groups Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
        
            <table class="table">
				<tr>
                    <td>Name</td><td><?php echo $name; ?></td>
                </tr>
				<tr>
                    <td>Description</td><td><?php echo $description; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('groups') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>