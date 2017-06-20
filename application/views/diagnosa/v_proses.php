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
                    <table class="table">
                        <tr><td>Kode Diagnosa </td><td> : </td><td> <?= $this->session->userdata('temp_kode'); ?></td></tr>
                        <tr><td>Nama </td><td> : </td><td> <?= $this->session->userdata('nama_diagnosa'); ?></td></tr>
                        <tr><td>Email </td><td> : </td><td> <?= $this->session->userdata('email_diagnosa'); ?></td></tr>
                    </table>
                    <hr>
                </div>
            </div>
            <div class="row">
                <br>
                <div class="col-md-12">
                    <a href="<?= base_url('diagnosa/del_session') ?>" class="btn btn-sm btn-info">Ulangi Diagnosa</a>
                    <?php
                        if($kondisi && $jawaban) 
                        {
                            if($heading == "Pertanyaan")
                            {
                                echo '
                                    <table class="table table-bordered">
                                '; 
                                echo "
                                    <tr>
                                        <td rowspan='2' width='10'>".$heading."</td>
                                        <td colspan='2'>".$isi->pertanyaan."</td>
                                    </tr>
                                    <tr>
                                        <td align='center'><a href='".base_url('diagnosa/proses/').$isi->ya."/".$isi->kode."-ya' class='btn btn-success btn-xs'>Ya</a></td>
                                        <td align='center'><a href='".base_url('diagnosa/proses/').$isi->tidak."/".$isi->kode."-tidak' class='btn btn-success btn-xs'>Tidak</a></td>
                                    </tr>
                                ";
                                echo "</table>";
                            } else {
                                echo '
                                    <a href="'.base_url('diagnosa/save_diagnosa/'.$isi->kode).'" class="btn btn-sm btn-info">Simpan</a>
                                    <table class="table table-bordered">
                                '; 
                                echo "
                                    <h2>".$jenis_kerusakan->jenis_kerusakan."</h2>
                                    <tr>
                                        <td rowspan='2' width='10'>".$heading."</td>
                                        <td colspan='2'>".$isi->solusi."</td>
                                    </tr>     
                                ";
                                echo "</table>";
                            }
                        }   
                        else 
                        {
                            echo '<table class="table table-bordered">';
                            foreach ($kondisi_awal as $k) {
                                echo "
                                    <tr>
                                        <td rowspan='2' width='10'>Pertanyaan</td>
                                        <td colspan='2'>".$k->pertanyaan."</td>
                                    </tr>
                                    <tr>
                                        <td align='center'><a href='".base_url('diagnosa/proses/').$k->ya."/".$k->kode."-ya' class='btn btn-success btn-xs'>Ya</a></td>
                                        <td align='center'><a href='".base_url('diagnosa/proses/').$k->tidak."/".$k->kode."-tidak' class='btn btn-success btn-xs'>Tidak</a></td>
                                    </tr>
                                ";
                            }
                            echo "</table>";
                        }
                    ?>

                </div>
            </div>               
        </div>
    </div>
</div>