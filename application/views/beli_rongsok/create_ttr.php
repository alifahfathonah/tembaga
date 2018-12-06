<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/create_ttr'); ?>"> Create Tanda Terima Rongsok (TTR) </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_ttr']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/BeliRongsok/save_ttr'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. TTR <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_ttr" name="no_ttr" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Auto Generate">
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
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Supplier
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supplier" name="supplier" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_supplier']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            No. Reff/ DTR 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_dtr']; ?>">
                            
                            <input type="hidden" id="dtr_id" name="dtr_id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div> 
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>
                                    <input type="checkbox" id="check_all" name="check_all" onclick="checkAll()" class="form-control">
                                </th>
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
                                foreach ($details as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td>';
                                    echo '<input type="checkbox" value="1" id="check_'.$no.'" name="myDetails['.$no.'][check]" 
                                            onclick="check();" class="form-control">';
                                    echo '<input type="hidden" name="myDetails['.$no.'][dtr_detail_id]" value="'.$row->id.'">';
                                    echo '<input type="hidden" name="myDetails['.$no.'][rongsok_id]" value="'.$row->rongsok_id.'">';
                                    echo '<input type="hidden" name="myDetails['.$no.'][qty]" value="'.$row->qty.'">';
                                    echo '<input type="hidden" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" value="'.$row->bruto.'">';
                                    echo '<input type="hidden" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" value="'.$row->netto.'">';
                                    echo '<input type="hidden" name="myDetails['.$no.'][line_remarks]" value="'.$row->line_remarks.'">';
                                    
                                    echo '</td>';
                                    echo '<td>'.$row->nama_item.'</td>';
                                    echo '<td>'.$row->uom.'</td>';                                    
                                    echo '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
                                    echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                                    echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
                                    echo '<td>'.$row->no_pallete.'</td>';
                                    echo '<td>'.$row->line_remarks.'</td>';
                                    echo '</tr>';
                                    $no++;
                                }
                            ?>
                                <tr>
                                    <td colspan="5" style="text-align:right"><strong>Total (Kg) </strong></td>
                                    <td style="text-align:right"><strong><div id="bruto"></div></strong></td>
                                    <td style="text-align:right"><strong><div id="netto"></div></strong></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Create TTR </a>

                            <a href="<?php echo base_url('index.php/BeliRongsok/dtr_list'); ?>" class="btn blue-hoki"> 
                                <i class="fa fa-angle-left"></i> Kembali </a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-5">
                            Jumlah Afkiran
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="jmlh_afkiran" name="jmlh_afkiran" class="form-control myline" maxlength="10" 
                                style="margin-bottom:4px" onkeydown="return myCurrency(event);" 
                                onkeyup="getComa(this.value, this.id);" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            Jumlah Pengepakan
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="jmlh_pengepakan" name="jmlh_pengepakan" class="form-control myline" maxlength="10" 
                                style="margin-bottom:4px" onkeydown="return myCurrency(event);" 
                                onkeyup="getComa(this.value, this.id);" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            Jumlah Lain-lain
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="jmlh_lain" name="jmlh_lain" class="form-control myline" maxlength="10" 
                                style="margin-bottom:4px" onkeydown="return myCurrency(event);" 
                                onkeyup="getComa(this.value, this.id);" value="0">
                        </div>
                    </div>
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
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}
    
function checkAll(){
    if ($('#check_all').prop("checked")) {  
        $('input').each(function(i){
            $('#uniform-check_'+i+' span').attr('class', 'checked');
            $('#check_'+i).attr('checked', true);
        });
    }else{
        $('input').each(function(i){
            $('#uniform-check_'+i+' span').attr('class', '');
            $('#check_'+i).attr('checked', false);
        });
    }  
    hitung_total();
}

function check(){
    $('#uniform-check_all span').attr('class', '');
    $('#check_all').attr('checked', false);   
    hitung_total();
}

function hitung_total(){    
    var bruto = 0;
    var netto = 0;
    $('input').each(function(i){
        if($('#check_'+i).prop("checked")){
            netto += Number($('#netto_'+i).val());     
            bruto += Number($('#bruto_'+i).val());   
        }
    });
    $('#bruto').html(bruto.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    $('#netto').html(netto.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanData(){
    var item_check = 0;
    $('input').each(function(i){
        if($('#check_'+i).prop("checked")){
            item_check += 1;                    
        }
    });
    
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jmlh_afkiran").val()) == ""){
        $('#message').html("Jumlah afkiran harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jmlh_pengepakan").val()) == ""){
        $('#message').html("Jumlah pengepakan harus diisi, tidak boleh kososng!");
        $('.alert-danger').show();
    }else if($.trim($("#jmlh_lain").val()) == ""){
        $('#message').html("Jumlah lain-lain harus diisi, tidak boleh kososng!");
        $('.alert-danger').show();
    }else{    
        if(item_check==0){
            $('#message').html("Silahkan pilih item rongsok yang akan di-create TTR!"); 
            $('.alert-danger').show(); 
        }else{
            $('#message').html("");
            $('.alert-danger').hide(); 
            $('#formku').submit(); 
        }
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
      