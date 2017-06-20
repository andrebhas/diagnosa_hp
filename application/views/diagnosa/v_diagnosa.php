<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>
<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Diagnosa HP OPPO</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
            <div class="row">
                <div class="col-md-5 text-left">
                    <a href="<?= base_url('diagnosa/buat_diagnosa') ?>" class="btn btn-success btn-xs" data-popup="tooltip-custom" title="tambah data"><i class="fa fa-cogs"></i> Mulai Diagnosa</a>
				</div>
                <div class="col-md-7 text-center">
                    <div style="margin-top: 4px"  id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
            </div>
            <table class="table datatable-responsive table-sm table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="50px">No</th>
						<th>Kode Diagnosa</th>
                        <th>Tanggal</th>
						<th>Nama</th>
						<th>Email</th>
                        <th>Jenis Kerusakan</th>
                        <th>Action</th>
                    </tr>
                </thead>
				<tbody>
            <?php
                $start = 0;
                foreach ($dt_diagnosa as $dt)
                {
            ?>
                    <tr>
						<td><?php echo ++$start ?></td>
						<td><?php echo $dt->temp_code ?></td>
                        <td><?php echo gmdate("Y-m-d | H:i:s", $dt->temp_code);?></td>
						<td><?php echo $dt->nama ?></td>
                        <td><?php echo $dt->email ?></td>
                        <td><?php echo $dt->jenis_kerusakan ?></td>
						<td style="text-align:center" width="200px">
						<?php 
							echo anchor(site_url('diagnosa/detail/'.$dt->temp_code),'Detail');
                            if ($this->ion_auth->logged_in())
		                    {
                                echo ' | '; 
							echo anchor(site_url('diagnosa/delete/'.$dt->temp_code),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                            } 
							
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
            targets: [ 3 ]
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