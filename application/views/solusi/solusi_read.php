<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Solusi Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
        
            <table class="table">
				<tr>
                    <td>Kode</td><td><?php echo $kode; ?></td>
                </tr>
				<tr>
                    <td>Solusi</td><td><?php echo $solusi; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('solusi') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>