<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Produksi Ingot
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/create_skb'); ?>"> Create Surat Keluar Barang (SKB)</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_skb']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Ingot/save_skb'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. SKB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_skb" name="no_skb" readonly="readonly"
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
                            No. SPB
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb']; ?>">                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Produksi
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_produksi" name="no_produksi" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_produksi']; ?>">
                            
                            <input type="hidden" id="spb_id" name="spb_id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Pemohon
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="pemohon" name="pemohon" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
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
                                <th>No. Pallete</th>
                                <th>Qty</th>
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
                                    echo '<input type="hidden" name="myDetails['.$no.'][spb_detail_id]" value="'.$row->id.'">';
                                    echo '<input type="hidden" name="myDetails['.$no.'][rongsok_id]" value="'.$row->rongsok_id.'">';
                                    echo '</td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][nama_item]" '
                                            . 'class="form-control myline" value="'.$row->nama_item.'" '
                                            . 'readonly="readonly"></td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][uom]" '
                                            . 'class="form-control myline" value="'.$row->uom.'" '
                                            . 'readonly="readonly"></td>';                                    
                                    echo '<td><input type="text" name="myDetails['.$no.'][no_pallete]" '
                                            . 'class="form-control myline" value="'.$row->no_pallete.'" '
                                            . 'readonly="readonly"></td>'; 
                                    
                                    echo '<td><input type="text" id="qty_'.$no.'" name="myDetails['.$no.'][qty]" '
                                            . 'class="form-control myline" value="0" maxlength="10" '
                                            . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>'; 
                                    
                                    echo '<td><input type="text" name="myDetails['.$no.'][line_remarks]" '
                                            . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
                                    echo '</tr>';
                                    $no++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Create SKB </a>

                    <a href="<?php echo base_url('index.php/Ingot'); ?>" class="btn blue-hoki"> 
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
}

function check(){
    $('#uniform-check_all span').attr('class', '');
    $('#check_all').attr('checked', false);    
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
    }else{    
        if(item_check==0){
            $('#message').html("Silahkan pilih item rongsok yang akan di-create SKB!"); 
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
      