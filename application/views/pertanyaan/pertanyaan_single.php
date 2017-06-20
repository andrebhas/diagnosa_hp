<?php 
    $ci =& get_instance();;
?>
   
<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form Tambah Pertanyaan</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="int">Jenis Kerusakan <?php echo form_error('id_jenis_kerusakan') ?></label>
                    <input type="hidden" class="form-control" name="id_jenis_kerusakan" id="id_jenis_kerusakan" placeholder="Id Jenis Kerusakan" value="<?php echo $id_jenis_kerusakan; ?>" />
                    <input type="text" class="form-control" value="<?php echo $jenis_kerusakan; ?>" readonly />
                    <input type="hidden" name="from" value="single">
                </div>
                <div class="form-group">
                    <label for="varchar">Kode Pertanyaan <?php echo form_error('kode') ?></label>
                    <input type="text" class="form-control" name="kode" id="kode" placeholder="T00" value="<?php echo $kode; ?>" />
                </div>
				<div class="form-group">
                    <label for="pertanyaan">Pertanyaan <?php echo form_error('pertanyaan') ?></label>
                    <textarea class="form-control" rows="3" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan"><?php echo $pertanyaan; ?></textarea>
                </div>
				<div class="form-group">
                    <label for="int">Ya <?php echo form_error('ya') ?></label>
                    <input type="text" class="form-control" name="isi_ya" id="isi_ya" autocomplete="off">
                    <input type="hidden" name="ya" id="ya">             
                </div>
				<div class="form-group">
                    <label for="int">Tidak <?php echo form_error('tidak') ?></label>
                    <input type="text" class="form-control" name="isi_tidak" id="isi_tidak" autocomplete="off">
                    <input type="hidden" name="tidak" id="tidak" />
                </div>
				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo base_url('jenis_kerusakan/pertanyaan/'.$id_jenis_kerusakan) ?>" class="btn btn-default">Batal</a>
			</form>
        
        </div>
    </div>
</div>
Bootstrap-3-Typeahead
<script src="<?php echo base_url(); ?>assets/js/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script>	

	<!-- bootstrap type a head script -->
	<script>
	 $(document).ready(function(e){
		var site_url = "<?php echo base_url(); ?>";
		var isi_ya = $("input[name=isi_ya]");
			$.get(site_url+'pertanyaan/json_kondisi', function(data){
						isi_ya.typeahead({
						    source: data,
						    minLength: 1,
						});
			}, 'json');

			isi_ya.change(function(){
				var current = isi_ya.typeahead("getActive");
                var res = current.split("-");
				$('#ya').val(res[0]);
			});

        var isi_tidak = $("input[name=isi_tidak]");
			$.get(site_url+'pertanyaan/json_kondisi', function(data){
						isi_tidak.typeahead({
						    source: data,
						    minLength: 1,
						});
			}, 'json');

			isi_tidak.change(function(){
				var current = isi_tidak.typeahead("getActive");
                var res = current.split("-");
				$('#tidak').val(res[0]);
			});

	});
	</script>