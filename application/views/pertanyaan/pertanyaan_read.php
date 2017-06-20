<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Pertanyaan Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
        
            <table class="table">
				<tr>
                    <td>Pertanyaan</td><td><?php echo $pertanyaan; ?></td>
                </tr>
				<tr>
                    <td>Kode</td><td><?php echo $kode; ?></td>
                </tr>
				<tr>
                    <td>Id Jenis Kerusakan</td><td><?php echo $id_jenis_kerusakan; ?></td>
                </tr>
				<tr>
                    <td>Ya</td><td><?php echo $ya; ?></td>
                </tr>
				<tr>
                    <td>Tidak</td><td><?php echo $tidak; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('pertanyaan') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>