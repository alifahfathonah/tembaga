<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Tolling Ke Customer</a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/create_dtbj'); ?>"> Create Data Timbang Tolling(DTT) </a> 
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
              id="formku" action="<?php echo base_url('index.php/Tolling/save_dtt_detail'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTT <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtt" name="no_dtt" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_dtt'];?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
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
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks'];?></textarea>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo $header['nama_customer'];?>" class="form-control myline" style="margin-bottom:5px" readonly>
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
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select  id="jenis_packing" name="jenis_packing" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
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
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th width="20%">Jenis Barang</th>
                                <th>UOM</th>
                                <th></th>
                                <th>Bruto</th>
                                <th>Berat Packing</th>
                                <th>Netto (Kg)</th>
                                <th width="15%">Nomor Packing</th>
                                <th width="10%">Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></td>
                                <td><select id="jenis_barang" name="jenis_barang" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value);">
                                    <option value=""></option>
                                    <?php foreach ($list_barang as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->jenis_barang;?>
                                            </option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" id="ukuran" name="ukuran">
                                </td>
                                <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                                <td><a href="javascript:;" onclick="timbang_netto()" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>
                                <td><input type="number" id="bruto" name="bruto" class="form-control myline"/></td>
                                <td><input type="number" id="berat_bobbin" = name="berat_bobbin" class="form-control myline"/></td>
                                <td><input type="text" id="netto" name="netto" class="form-control myline" readonly="readonly"/></td>
                                <td><input type="text" id="no_packing" name="no_packing" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="keterangan" name="keterangan" class="form-control myline"/></td>
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
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/GudangFG/produksi_fg'); ?>" class="btn blue-hoki"> 
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
    <?php } ?>
    </div>
</div> 
<script>
function makepallete_id(){
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    for (var i = 0; i < 4; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
    
    var d = new Date();
    var str = $('#jenis_packing').val();
    var res = str.substring(0, 1);
    const u = $('#ukuran').val();
    var strDateTime = '<?=date('dmy');?>' + res + u;
    return (strDateTime+text);
}

function timbang_netto(){
    if($.trim($("#jenis_packing").val()) == ""){
        $('#message').html("Silahkan pilih packing barang!");
        $('.alert-danger').show(); 
    }else{
        var bruto = $("#bruto").val();
        var berat_palette = $("#berat_bobbin").val();
        var total_netto = bruto - berat_palette;
        $("#netto").val(total_netto);
        $("#no_packing").val(makepallete_id());
    }
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Tolling/load_detail_rambut'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliFinishGood/get_uom'); ?>",
        type: "POST",
        data: {id: id},
        dataType: "json",
        success: function(result) {
            $('#uom').val(result['uom']);
            $('#ukuran').val(result['ukuran']);
        }
    });
}

function saveDetail(){
    if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show(); 
    } else if($.trim($("#netto").val()) == ""){
        $('#message').html("Silahkan isi netto barang!");
        $('.alert-danger').show();
    } else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Tolling/save_detail_rambut'); ?>',
            data:{
                id:$('#id').val(),
                jb:$('#jenis_barang').val(),
                bruto:$('#bruto').val(),
                berat:$('#berat_bobbin').val(),
                netto: $('#netto').val(),
                no_packing:$('#no_packing').val(),
                no_bobbin: $('#jenis_packing').val(),
                tanggal: $('#tanggal').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $('#jenis_barang').select2('val','');
                    $('#bruto').val('');
                    $('#berat_bobbin').val('');
                    $('#netto').val('');
                    $('#no_packing').val('');
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
            url:'<?php echo base_url('index.php/Tolling/delete_detail_rambut'); ?>',
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
    window.open('<?php echo base_url('index.php/Tolling/print_barcode_kardus?id=');?>'+id,'_blank');
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>    
    loadDetail(<?php echo $header['id']; ?>);
</script>