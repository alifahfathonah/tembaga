<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang FG
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/edit_laporan'); ?>"> Detail Laporan Produksi FG </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/GudangFG/update_laporan'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_produksi" name="no_produksi" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_laporan_produksi']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                            <input type="hidden" id="ukuran" name="ukuran" value="<?php echo $header['ukuran']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?=$header['tanggal'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="pembuat" name="pembuat" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pembuat']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang']; ?>">
                                
                            <input type="hidden" name="jenis_barang_id" value="<?=$header['jenis_barang_id'];?>">                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_packing" name="jenis_packing" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_packing']; ?>">                         
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select  id="no_packing" name="no_packing" placeholder="Silahkan pilih..." onchange="get_packing(this.value)" 
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
            <hr class="divider"/>
            <h4 class="text-center">Detail Produksi List</h4>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th></th>
                                <th>Netto (Kg)</th>
                                <th>Nomor Packing / Barcode</th>
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
    }else{     
        $('#formku').submit(); 
    };
};



function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/GudangFG/load_detail_rambut'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_packing(id){
    if(''!=id){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangFG/get_bobbin'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            if(result){
                $('#id_packing').val(result['id']);
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
            url:'<?php echo base_url('index.php/GudangFG/save_detail_rambut'); ?>',
            data:{
                id:$('#id').val(),
                netto: $('#netto').val(),
                ukuran: $('#ukuran').val(),
                no_packing: $('#no_packing').val(),
                id_packing: $('#id_packing').val()
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
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangFG/delete_detail'); ?>',
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

</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>    
    loadDetail(<?php echo $header['id']; ?>);
</script>
      