<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok</a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/create_dtr'); ?>"> Create Data Timbang Rongsok (DTR) </a> 
        </h5>          
    </div>
</div>


<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_dtr']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/BeliRongsok/save_dtr'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTR <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
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
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['id']; ?>">
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
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="RONGSOK">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penimbang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    
                </div>              
            </div>
            
           
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>
                                    <input type="checkbox" id="check_all" name="check_all" onclick="checkAll()" class="form-control">
                                </th>
                                <th>Nama Item Rongsok</th>
                                <th>UOM</th>
                                <th>Jumlah PO</th>
                                <th>Bruto (Kg)</th>
                                <th>Berat Palette</th>
                                <th>Netto (Kg)</th>
                                <th></th>
                                <th>No. Pallete</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Create DTR </a>

                    <a href="<?php echo base_url('index.php/BeliRongsok'); ?>" class="btn blue-hoki"> 
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
function timbang_netto(id){
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_palette_"+id).val();
    var total_netto = bruto - berat_palette;
    $("#netto_"+id).val(total_netto);
}
function loadTimbangan(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliRongsok/load_angka_timbangan'); ?>",
        type: "POST",
        data : {},
        success: function (result){
            //console.log(result);
            if(result['type_message'][0]=="error"){
                $("#bruto_"+id).val('0');
                
                $('#message').html(result['message'][0]);
                $('.alert-danger').show(); 
                
            }else if(result['type_message'][0]=="success"){
                $('#message').html("");
                $('.alert-danger').hide(); 
                
                $("#bruto_"+id).val(result['berat'][0]);
            }
        }
    });
}

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/BeliRongsok/load_detail_dtr'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

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


function makepallete_id() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    for (var i = 0; i < 3; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
    
    var d = new Date();
    var strDateTime = '<?=date('dmy');?>' + d.getHours() + d.getMinutes() + d.getSeconds();
    return (strDateTime+text);
}

function simpanData(){
    var item_check = 0;
    $('input').each(function(i){
        if($('#check_'+i).prop("checked")){
            item_check += 1;                    
        }
    });
    
    if($.trim($("#tanggal").val()) == ""){
        $('#c').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else{    
        if(item_check==0){
            $('#message').html("Silahkan pilih item rongsok yang akan di-create DTR!"); 
            $('.alert-danger').show(); 
        }else{
            $('#message').html("");
            $('.alert-danger').hide(); 
            $('#formku').submit(); 
        }
    };
};

function get_uom_po(id, nmr){
    var idpo = $('#po_id').val();
    if($.trim($('#name_rongsok').val())!=''){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliRongsok/get_uom_po'); ?>",
        async: false,
        type: "POST",
        data: {idpo: idpo, iditem: id},
        dataType: "json",
        success: function(result) {
            $('#uom_'+nmr).val(result['uom']);
            $('#qty_'+nmr).val(result['qty']);
            $('#rongsok_id_'+nmr).val(result['rongsok_id']);
            $('#po_id_'+nmr).val(result['id']);
            $('#no_pallete_'+nmr).val(makepallete_id());
        }
    });
    }
}

function saveDetail(id){
    if($.trim($("#name_rongsok").val()) == ""){
        $('#message').html("Silahkan pilih nama item rongsok!");
        $('.alert-danger').show(); 
    }else if($.trim($("#bruto_"+id).val()) == ""){
        $('#message').html("Jumlah bruto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto_"+id).val()) == ""){
        $('#message').html("Jumlah netto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        var tr_selected = $("#netto_"+id).closest("tr").find(".yellow-gold");
        tr_selected.parent().append('<a href="javascript:;" class="btn btn-xs btn-circle red" onclick="deleteDetail('+(id+1)+')" style="margin-top:5px" id="btndeleteDetail"> <i class="fa fa-trash"></i> Hapus </a>');
        tr_selected.remove();
        $("#tabel_dtr>tbody").append(
            '<tr><td style="text-align:center">'+(id+1)+'</td><td><input value="1" id="check_'+(id+1)+'" name="myDetails['+(id+1)+'][check]" onclick="check();" class="form-control" type="checkbox"><input type="hidden" id="po_id_'+(id+1)+'" name="myDetails['+(id+1)+'][po_detail_id]" value=""><input type="hidden" id="rongsok_id_'+(id+1)+'" name="myDetails['+(id+1)+'][rongsok_id]" value=""></td><td><select id="name_rongsok_'+(id+1)+'" name="myDetails['+(id+1)+'][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom_po(this.value,'+(id+1)+');">'+"<?=$option_rongsok;?>"+'</select></td><td><input id="uom_'+(id+1)+'" name="myDetails['+(id+1)+'][uom]" class="form-control myline" readonly="readonly" type="text"></td><td><input id="qty_'+(id+1)+'" name="myDetails['+(id+1)+'][qty]" class="form-control myline" readonly="readonly" type="text"></td><td><input id="bruto_'+(id+1)+'" name="myDetails['+(id+1)+'][bruto]" class="form-control myline" value="0" maxlength="10" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);" type="text"></td><td><input id="netto_'+(id+1)+'" name="myDetails['+(id+1)+'][netto]" class="form-control myline" value="0" maxlength="10" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);" type="text"></td><td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="loadTimbangan('+(id+1)+');"> <i class="fa fa-dashboard"></i> Timbang </a></td><td><input name="myDetails['+(id+1)+'][no_pallete]" id="no_pallete_'+(id+1)+'" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" type="text"></td><td><input name="myDetails['+(id+1)+'][line_remarks]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" type="text"></td><td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+(id+1)+');" style="margin-top:5px" id="btnSaveDetail"> <i class="fa fa-plus"></i> Tambah </a></td></tr>'
        );
    }
    get_uom_po(1,(id+1));
}

function deleteDetail(id){
    var r=confirm("Anda yakin menghapus item rongsok ini?");
    if (r==true){
        $('#uom_'+id).closest('tr').remove();
        }
}
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

    loadDetail('<?=$po_id; ?>'); 
});



</script>
      