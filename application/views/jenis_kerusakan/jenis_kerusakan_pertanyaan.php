<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Data Pertanyaan <?php echo $jenis_kerusakan; ?></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
            <a href="<?php echo site_url('jenis_kerusakan') ?>" class="btn btn-primary btn-xs"><i class="fa fa-chevron-left"> </i> Kembali</a><br><br>
            <table class="table table-responsive">
				<tr>
                    <td>Kode</td><td>:</td><td><?php echo $kode; ?></td>
                </tr>
				<tr>
                    <td>Jenis Kerusakan</td><td>:</td><td><?php echo $jenis_kerusakan; ?></td>
                </tr>
			</table>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-8 text-left">
                    <a href="<?php echo base_url('pertanyaan/pertanyaan_single/'.$id)?>" class="btn btn-default btn-xs" data-popup="tooltip-custom" title="tambah data"><i class="fa fa-plus-square"></i> Buat Pertanyaan</a>
				</div>
                <div class="col-md-4 text-center">
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
						<th width="50px">Kode</th>
						<th>Pertanyaan</th>
						<th width="50px">Ya</th>
						<th width="50px">Tidak</th>
						<th>Action</th>
                    </tr>
                </thead>
				<tbody>
            <?php
                $start = 0;
                foreach ($pertanyaan_data as $pertanyaan)
                {
            ?>
                    <tr>
						<td><?php echo ++$start ?></td>
						<td><?php echo $pertanyaan->kode ?></td>
						<td><?php echo $pertanyaan->pertanyaan ?></td>
						<td><?php echo $pertanyaan->ya ?></td>
						<td><?php echo $pertanyaan->tidak ?></td>
						<td style="text-align:center" width="200px">
						<?php 
							echo anchor(site_url('pertanyaan/update/'.$pertanyaan->id),'Update'); 
							echo ' | '; 
							echo anchor(site_url('pertanyaan/delete/'.$pertanyaan->id.'/'.$pertanyaan->id_jenis_kerusakan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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