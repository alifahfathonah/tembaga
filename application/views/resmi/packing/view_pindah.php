<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok/ambil_packing'); ?>"> Ambil Packing </a> 
            <i class="fa fa-angle-right"></i> 
            View
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($group_id==16) ){
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
              id="formku" action="<?php echo base_url('index.php/R_BPB/update_bpb'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>" readonly="readonly">
                        </div>
                    </div>
                </div>           
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 19%">Nama Item</th>
                                <th>UOM</th>
                                <th>Bruto (Kg)</th>
                                <th>Berat</th>
                                <th>Netto (Kg)</th>
                                <th style="width: 15%">No. Packing</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no=1; 
                                    $total_n = 0;
                                    $last_series = null;
                                    $bruto = 0;
                                    $berat = 0;
                                    $netto = 0;
                                    foreach ($list_data as $row) {
                                echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                if($row->jenis_barang!=$last_series && $last_series!=null){
                                    echo '<tr>
                                                <td style="text-align: right;" colspan="3"><strong>Total</strong></td>
                                                <td style="background-color: green; color: white;">'.number_format($bruto,2,',','.').'</td>
                                                <td style="background-color: green; color: white;">'.number_format($berat,2,',','.').'</td>
                                                <td style="background-color: green; color: white;">'.number_format($netto,2,',','.').'</td>
                                                <td colspan="2"></td>
                                            </tr>';
                                            $bruto = 0;
                                            $berat = 0;
                                            $netto = 0;
                                            $no = 1;
                                        }else{
                                            echo '</tr>';
                                        }
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->jenis_barang; ?></td>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo number_format($row->bruto,2,',','.'); ?></td>
                                    <td><?php echo number_format($row->berat_bobbin,2,',','.'); ?></td>
                                    <td><?php echo number_format($row->netto,2,',','.'); ?></td>
                                    <td><?php echo $row->no_packing; ?></td>
                                    <td><?php echo $row->keterangan; ?></td>
                                <?php
                                        if($row->jenis_barang==$last_series){
                                            echo '<tr>';
                                        }
                                    $last_series = $row->jenis_barang;
                                    $no++;
                                    $bruto += $row->bruto;
                                    $berat += $row->berat_bobbin;
                                    $netto += $row->netto;
                                    $total_n += $row->netto;
                                    }
                                ?>
                                <tr>
                                    <td style="text-align: right;" colspan="3"><strong>Total</strong></td>
                                    <td style="background-color: green; color: white;"><?=number_format($bruto,2,',','.');?></td>
                                    <td style="background-color: green; color: white;"><?=number_format($berat,2,',','.');?></td>
                                    <td style="background-color: green; color: white;"><?=number_format($netto,2,',','.');?></td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;"><strong>Total Netto :</strong></td>
                                    <td><?=number_format($total_n,2,',','.');?></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/R_Rongsok/ambil_packing'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
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
<script>
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#no_bpb").val()) == ""){
        $('#message').html("Nomor BPB Harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#flag_po").val()) == ""){
        $('#message').html("Silahkan pilih PO!");
        $('.alert-danger').show();
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show();
    }else{   
        $('#formku').submit(); 
    };
};

function get_alamat(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/R_SuratJalan/get_alamat'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#alamat").val(result['alamat']);           
        } 
    });
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    // $("#tanggal").datepicker({
    //     showOn: "button",
    //     buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
    //     buttonImageOnly: true,
    //     buttonText: "Select date",
    //     changeMonth: true,
    //     changeYear: true,
    //     dateFormat: 'dd-mm-yy'
    // }); 
});
</script>