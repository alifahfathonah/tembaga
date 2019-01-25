<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <a href="<?php echo base_url('index.php/TollingResmi'); ?>"><i class="fa fa-angle-right"></i> Tolling Titipan</a>
            <i class="fa fa-angle-right"></i> 
            Create Tolling
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['add_spb']==1) ){
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
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/TollingResmi/save'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan Rongsok <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="sj_id" name="sj_id" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $header['no_sj_resmi'];?>">
                            <input type="hidden" id="sj_id" name="sj_id" value="<?php echo $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Proses Surat Jalan </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_pembuat" name="nama_pembuat" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                </div>    
            </div>
        </form>
        <div class="portlet box blue-ebonyclay">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-word-o"></i>Detail Surat Jalan
                    </div>
                    <div class="tools">    
                    
                    </div>    
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Berat Pallete</th>
                                <th>Nomor Pallete</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            $total = 0;
                            foreach ($myDetail as $row){ 
                                $berat_palette = $row->bruto - $row->netto;
                            ?>
                                <tr>
                                <td style="text-align:center"><?=$no;?></td>
                                <td><?=$row->nama_item;?></td>
                                <td style="text-align:right;"><?=$row->bruto;?></td>
                                <td style="text-align:right;"><?=$row->netto;?></td>
                                <td style="text-align:right;"><?=$berat_palette;?></td>
                                <td><?=$row->no_packing;?></td>
                                <td><?=$row->line_remarks;?></td>
                                </tr>
                            <?php
                                $total += $row->netto;
                                $no++;
                            }
                            ?>
                            <tr>
                            <td colspan="3" style="text-align:right"><strong>Total (Kg) </strong></td>
                            <td style="text-align:right; background-color:green; color:white"><strong><?=$total;?></strong></td>
                            <td colspan="3"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
<script>
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    } else if($.trim($("#sj_id").val()) == ""){
        $('#message').html("No Surat Jalan harus dipilih, tidak boleh kosong!");
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