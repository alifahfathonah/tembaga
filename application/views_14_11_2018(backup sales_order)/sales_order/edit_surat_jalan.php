<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/surat_jalan'); ?>"> Surat Jalan </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/edit_surat_jalan'); ?>"> Edit Surat Jalan </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit_surat_jalan']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Tolling/update_surat_jalan'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_surat_jalan" name="no_surat_jalan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_jalan']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_barang" name="jenis_barang" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($jenis_barang_list as $row){
                                        echo '<option value="'.$row->jenis_barang.'" '.(($row->jenis_barang==$header['jenis_barang'])? 'selected="selected"': '').'>'.$row->jenis_barang.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_alamat(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="alamat" name="alamat" rows="2" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="sales_order_id" name="sales_order_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value="<?php echo $header['sales_order_id']; ?>"><?php echo $header['no_sales_order']; ?></option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Kendaraan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_kendaraan_id" name="m_kendaraan_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_type_kendaraan(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($kendaraan_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_kendaraan_id'])? 'selected="selected"': '').'>'.$row->no_kendaraan.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Type Kendaraan
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="type_kendaraan" id="type_kendaraan" class="form-control myline" 
                                   style="margin-bottom:5px" readonly="readonly" value="<?php echo $header['type_kendaraan']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Supir
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supir" name="supir" onkeyup="this.value = this.value.toUpperCase()"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['supir']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>UOM</th>                                
                                <th>No. Produksi</th>
                                <th>No. Packing</th>
                                <th>Bruto (Kg)</th>
                                <th>Bobin (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
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
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/Tolling/surat_jalan'); ?>" class="btn blue-hoki"> 
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


function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show(); 
    }else if($.trim($("#m_customer_id").val()) == ""){
        $('#message').html("Silahkan pilih customer");
        $('.alert-danger').show(); 
    }else if($.trim($("#sales_order_id").val()) == ""){
        $('#message').html("Silahkan pilih no. sales order");
        $('.alert-danger').show(); 
    }else if($.trim($("#m_kendaraan_id").val()) == ""){
        $('#message').html("Silahkan pilih kendaraan");
        $('.alert-danger').show();
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Tolling/load_detail_surat_jalan'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Tolling/get_uom_ampas'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#uom').val(result['uom']);
        }
    })
}

function saveDetail(){
    if($.trim($("#ampas_id").val()) == ""){
        $('#message').html("Silahkan pilih item rongsok!");
        $('.alert-danger').show(); 
    }else if($.trim($("#produksi_ampas_id").val()) == ""){
        $('#message').html("Silahkan pilih no. produksi!");
        $('.alert-danger').show(); 
    }else if($.trim($("#bruto").val()) == ""){
        $('#message').html("Berat bruto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#bobin").val()) == ""){
        $('#message').html("Berat bobin tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto").val()) == ""){
        $('#message').html("Berat netto tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Tolling/save_detail_surat_jalan'); ?>',
            data:{
                id:$('#id').val(),
                ampas_id:$('#ampas_id').val(),
                jenis_item: $('#ampas_id option:selected').text(),
                produksi_ampas_id:$('#produksi_ampas_id').val(),
                no_packing:$('#no_packing').val(),
                bruto:$('#bruto').val(),
                bobin:$('#bobin').val(),
                netto:$('#netto').val(),
                line_remarks:$('#line_remarks').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
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
    var r=confirm("Anda yakin menghapus item ampas ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Tolling/delete_detail_surat_jalan'); ?>',
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

function get_type_kendaraan(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/Tolling/get_type_kendaraan'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#type_kendaraan").val(result['type_kendaraan']);
        } 
    });
}

function get_alamat(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/Tolling/get_alamat'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#alamat").val(result['alamat']);           
        } 
    });
    
    $.ajax({
        url: "<?php echo base_url('index.php/Tolling/get_so_list'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#sales_order_id').html(result);
        }
    })
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
    
    loadDetail(<?php echo $header['id']; ?>);
});
</script>
      