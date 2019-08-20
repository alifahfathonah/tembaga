<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood'); ?>"> Pembelian Finish Good</a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood/create_dtbj'); ?>"> Create Data Timbang Barang Jadi (DTBJ) </a> 
        </h5>          
    </div>
</div>

<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_dtbj']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/BeliFinishGood/update_dtbj'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTBJ <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtbj" name="no_dtbj"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?= $header['no_dtbj'];?>">

                            <input type="hidden" id="id" name="id" value="<?= $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?= $header['tanggal'];?>">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>  -->                     
                    <div class="row">
                        <div class="col-md-4">
                            No. SJ <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" placeholder="Nomor Surat Jalan ..."
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?= $header['no_sj'];?>">
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
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="supplier_id" name="supplier_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    echo '<option value="0"'.(('0'==$header['supplier_id'])? 'selected="selected"': '').'>**TIDAK ADA SUPPLIER**</option>';
                                    foreach ($supplier_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['supplier_id'])? 'selected="selected"': '').'>'.$row->nama_supplier.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_packing" name="jenis_packing" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="ROLL">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select  id="no_packing" name="no_packing" placeholder="Silahkan pilih..." class="form-control myline select2me" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php 
                                foreach($packing as $p){
                                ?>
                                <option value="<?=$p->nomor_bobbin;?>"><?=$p->nomor_bobbin.' ('.$p->jenis_packing.')';?> </option>
                                <?php } ?>    
                            </select> 
                            <input type="hidden" name="id_packing" id="id_packing">                       
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
                                <th style="width:20%">Nama Item Finish Good</th>
                                <th>UOM</th>
                                <th></th>
                                <th>Netto (Kg)</th>
                                <th>No. Packing</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></td>
                                <td>
                                    <select id="jenis_barang" name="jenis_barang" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value)">
                                        <option value=""></option>
                                        <?php foreach ($list_fg_on_po as $value){ ?>
                                                <option value='<?=$value->id;?>'>
                                                    <?='('.$value->kode.') '.$value->jenis_barang;?>
                                                </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"/></td>
                                <input type="hidden" id="ukuran" name="ukuran">
                                <td><a href="javascript:;" onclick="timbang_netto()" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>
                                <td><input type="text" id="netto" name="netto" class="form-control myline"/></td>
                                <td><input type="text" value="Auto" class="form-control myline" readonly="readonly"></td>
                                <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Create DTBJ </a>

                    <a href="<?php echo base_url('index.php/BeliFinishGood/dtbj_list'); ?>" class="btn blue-hoki"> 
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
// function timbang_netto(){
//     var bruto = $("#bruto").val();
//     var berat_palette = $("#berat_bobbin").val();
//     var total_netto = bruto - berat_palette;
//     const total = total_netto.toFixed(2);
//     $("#netto").val(total);
// }

function simpanData(){
    if($.trim($("#no_dtbj").val()) == ""){
        $('#message').html("Nomor DTBJ harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else if($.trim($("#supplier_id").val()) == ""){
        $('#message').html("Supplier harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else{   
        $('#message').html("");
        $('.alert-danger').hide(); 
        $('#formku').submit();
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/BeliFinishGood/load_detail_roll'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    if(''!=id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliFinishGood/get_uom'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            if(result){
                $('#uom').val(result['uom']);
                $('#ukuran').val(result['ukuran']);
            } else {
                alert('Bobbin/Keranjang tidak ditemukan, coba lagi');
                $('#no_packing').val('');
            }
        }
    });
    }
}

function saveDetail(){
    if($.trim($("#netto").val()) == ""){
        $('#message').html("Silahkan isi netto barang!");
        $('.alert-danger').show(); 
    } else if($.trim($("#no_packing").val()) == ""){
        $('#message').html("Silahkan pilih packing barang!");
        $('.alert-danger').show(); 
    } else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliFinishGood/save_detail_roll'); ?>',
            data:{
                id:$('#id').val(),
                jenis_barang: $('#jenis_barang').val(),
                tanggal: $('#tanggal').val(),
                netto: $('#netto').val(),
                ukuran: $('#ukuran').val(),
                no_packing: $('#no_packing').val(),
                id_packing: $('#id_packing').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $('#jenis_barang').select2('val','');
                    $('#netto').val('');
                    $('#uom').val('');
                    $('#message').html("");
                    $('.alert-danger').hide(); 
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliFinishGood/delete_dtbj_detail'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
}

function printBarcode(id){
    window.open('<?php echo base_url('index.php/BeliFinishGood/print_barcode_kardus?id=');?>'+id,'_blank');
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
        dateFormat: 'yy-mm-dd'
    });
    loadDetail(<?php echo $header['id']; ?>);
});
</script>