<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>

<div class="content">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Users List</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
            <div class="row">
                <div class="col-md-5 text-left">
                    <?php echo anchor(site_url('users/create'), '<i class="fa fa-plus-square"></i> Tambah', 'class="btn btn-default btn-xs" data-popup="tooltip-custom" title="tambah data"'); ?>
				</div>
                <div class="col-md-7 text-center">
                    <div style="margin-top: 4px"  id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
            </div>          
            <br>
            <table class="table datatable-responsive table-sm table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="50px">No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Username</th>
						<th>Phone</th>
						<th>Alamat</th>
						<th>User Img</th>
						<th>Last Login</th>
                        <th>Level</th>
						<th>Action</th>
                    </tr>
                </thead>
				<tbody>
            <?php
                $start = 0;
                foreach ($users_data as $users)
                {
            ?>
                    <tr>
						<td><?php echo ++$start ?></td>
						<td><?php echo $users->nama ?></td>
						<td><?php echo $users->email ?></td>
						<td><?php echo $users->username ?></td>
						<td><?php echo $users->phone ?></td>
						<td><?php echo $users->alamat ?></td>
						<td><img width="35" height="35" src="<?= base_url('images/users/'. $users->user_img)?>"></td>
						<td><?php echo date('d/m/Y', $users->last_login); ?></td>
                        <td><?php $level = $this->ion_auth->get_users_groups($users->id)->result(); foreach ($level as $lvl) {
                            echo $lvl->name." , ";
                        }?></td>
						<td style="text-align:center" width="200px">
						<?php 
							echo anchor(site_url('users/read/'.$users->id),'Detail'); 
							echo ' | '; 
							echo anchor(site_url('users/update/'.$users->id),'Update'); 
							echo ' | '; 
							echo anchor(site_url('users/delete/'.$users->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
						?>
						</td>
					</tr>
            <?php
                }
            ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


<script type="text/javascript">
$(function() {

    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Cari :</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'Cari' : 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic responsive configuration
    $('.datatable-responsive').DataTable();


    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Ketik ...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    });
    
});
</script>