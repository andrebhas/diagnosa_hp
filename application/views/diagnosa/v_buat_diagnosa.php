<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Diagnosa HP</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
            <div class="row">
                <div class="col-md-5">
                    <form method="post">
                    <div class="form-group">
                        <label for="varchar">Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required/>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/>
                    </div>
                    <input type="hidden" name="submit" value="submit"/>
                    <button type="submit" id="pilih" class="btn btn-success">Pilih Jenis Kerusakan</button>  
                    <a class="btn btn-default" href="<?=  base_url('diagnosa/buat_diagnosa') ?>">Reset</a>
                    <a class="btn btn-default" href="<?=  base_url('diagnosa/del_session') ?>">Back</a>
                    </form>
                </div>
            </div>
            <?php 
            if ($this->input->post('submit',TRUE)) {
                $nama = $this->input->post('nama',TRUE);
                $email = $this->input->post('email',TRUE);
                $this->session->set_userdata('nama_diagnosa', $nama);
			    $this->session->set_userdata('email_diagnosa', $email);
            ?>
            <div class="row">
                <div class="col-md-12" id="dipilih">
                   <h2>Pilih Jenis Kerusakan</h2>
                   <table class="table table-stripe">
                       <?php
                            $start = 1;
                            foreach ($data_jenis_kerusakan as $d) {
                               echo "
                                    <tr>
                                        <td width='10'>".$start++.".</td>
                                        <td><a href='".base_url('diagnosa/buat_proses/').$d->id."'>".$d->jenis_kerusakan."</a></td>
                                    </tr>
                               ";
                            }
                       ?>
                   </table>
                </div>
            </div>  
            <script type="text/javascript">
                var nama = '<?php echo $nama ?>'; 
                var email = '<?php echo $email ?>'; 
                $('#nama').val(nama);
                $('#nama').prop('disabled', true);
                $('#email').val(email);
                $('#email').prop('disabled', true);
                $('#pilih').prop('disabled', true);
            </script> 
            <?php
            }
            ?>
                        
        </div>
    </div>
</div>