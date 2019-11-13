<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_TollingResmi/view_tolling'); ?>"> Review Data Timbang Rongsok (DTR) </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==9)||($hak_akses['view_tolling']==1) ){
        ?> 
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <form id="formku" method="post" action="<?= base_url('index.php/R_TollingResmi/update') ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_invoice_resmi']; ?>">
                            <input type="hidden" name="r_dtr_id" id="r_dtr_id" value="<?= $header['id'] ?>">
                            <input type="hidden" name="r_ttr_id" id="r_ttr_id" value="<?= $header['id_ttr'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sj_resmi']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_customer']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                </div>              
            </div>
            <hr>
            <div class="portlet box blue-ebonyclay">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>DTR-KMP.<?=date('Ym', strtotime($header['tanggal']));?>.<input type="text" name="no_dtr_r" id="no_dtr_r" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo substr($header['no_dtr_resmi'],-4);?>" style="color: black; margin-bottom: 5px;" placeholder="No. DTR" />
                        </div>
                        <div class="tools">    
                        
                        </div>    
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama Item Rongsok</th>
                                <th>UOM</th>
                                <th>Jumlah</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>No. Pallete</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $bruto = 0;
                                $netto = 0;
                                foreach ($dtr_detail as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td>'.$row->nama_item.'</td>';
                                    echo '<td>'.$row->uom.'</td>';                                    
                                    echo '<td style="text-align:right">'.$row->qty.'</td>';
                                    echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                                    echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';                                
                                    echo '<td>'.$row->no_pallete.'</td>';
                                    echo '<td>'.$row->line_remarks.'</td>';
                                    echo '</tr>';
                                    $bruto += $row->bruto;
                                    $netto += $row->netto;
                                    $no++;
                                }
                            ?>
                                <tr>
                                    <td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>
                                    <td style="text-align:right"><strong><?php echo number_format($bruto,0,',','.'); ?></strong></td>
                                    <td style="text-align:right"><strong><?php echo number_format($netto,0,',','.'); ?></strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div class="portlet box blue-ebonyclay">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>TTR-KMP.<?=date('Ym', strtotime($header['tanggal']));?>.<input type="text" name="no_ttr_r" id="no_ttr_r" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo substr($header['no_ttr_resmi'], -4);?>" style="color: black; margin-bottom: 5px;" placeholder="No. TTR">
                        </div>
                        <div class="tools">    
                        
                        </div>    
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama Item Rongsok</th>
                                <th>UOM</th>
                                <th>Jumlah</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $bruto = 0;
                                $netto = 0;
                                foreach ($ttr_detail as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td>'.$row->nama_item.'</td>';
                                    echo '<td>'.$row->uom.'</td>';                                    
                                    echo '<td style="text-align:right">'.$row->qty.'</td>';
                                    echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                                    echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
                                    echo '<td>'.$row->line_remarks.'</td>';
                                    echo '</tr>';
                                    $bruto += $row->bruto;
                                    $netto += $row->netto;
                                    $no++;
                                }
                            ?>
                                <tr>
                                    <td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>
                                    <td style="text-align:right"><strong><?php echo number_format($bruto,0,',','.'); ?></strong></td>
                                    <td style="text-align:right"><strong><?php echo number_format($netto,0,',','.'); ?></strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/R_TollingResmi'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                </div>    
            </div>
        </form>
        <?php
            }else{
        ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span id="message">Anda tidak memiliki hak akses ke halaman ini!</span>
        </div>
        <?php
            }
        ?>
    </div>
</div> 
<script type="text/javascript">
    function simpanData(){
        if($.trim($("#no_dtr_r").val()) == ""){
            $('#message').html("No. DTR harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        } else if($.trim($("#no_ttr_r").val()) == ""){
            $('#message').html("No. TTR harus diisi, tidak boleh kosong!");
            $('.alert-danger').show();
        }else{     
            $('#formku').submit(); 
        };
    };
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 
});
</script>