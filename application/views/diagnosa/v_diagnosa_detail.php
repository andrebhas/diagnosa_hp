<script src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js') ?>"></script>
<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Diagnosa Detail <?= $diagnosa->temp_code ?></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
            <div class="row">
                <div class="col-md-5 text-left">
                    <a href="<?= base_url('diagnosa') ?>" class="btn btn-success btn-xs" data-popup="tooltip-custom" title="back">Back</a>
				</div><br><br>
            </div>
            <div class="row">
                <div class="col-md-7">
                <h2>Daitail Diagnosa</h2>
                     <table class="table table-sm table-striped">
                        <tr><td>Tanggal Diagnosa</td><td>:</td><td><?= gmdate("Y-m-d | H:i:s", $diagnosa->temp_code)?></td></tr>
                        <tr><td>Nama</td><td>:</td><td><?= $diagnosa->nama ?></td></tr>
                        <tr><td>Email</td><td>:</td><td><?= $diagnosa->email ?></td></tr>
                        <tr><td>Jenis Kerusakan</td><td>:</td><td><?= $diagnosa->jenis_kerusakan ?></td></tr>
                        <tr><td>Solusi</td><td>:</td><td><?= $diagnosa->solusi ?></td></tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <h2>Daitail Jawaban</h2>
                    <table class="table table-sm table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        $start = 0;
                        foreach ($temp_detail as $dt)
                        {
                    ?>
                            <tr>
                                <td><?php echo $dt->pertanyaan ?></td>
                                <td><?php echo $dt->jawaban ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>
    </div>
</div>