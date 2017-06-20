<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Users Detail</h5>
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
                    <td>Email</td><td><?php echo $email; ?></td>
                </tr>
				<tr>
                    <td>Username</td><td><?php echo $username; ?></td>
                </tr>
				<tr>
                    <td>Phone</td><td><?php echo $phone; ?></td>
                </tr>
				<tr>
                    <td>Alamat</td><td><?php echo $alamat; ?></td>
                </tr>
				<tr>
                    <td>User Img</td><td><?php echo $user_img; ?></td>
                </tr>
				<tr>
                    <td>Last Login</td><td><?php echo $last_login; ?></td>
                </tr>
				<tr>
                    <td>Active</td><td><?php echo $active; ?></td>
                </tr>
				<tr>
                    <td>Created On</td><td><?php echo $created_on; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('users') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>