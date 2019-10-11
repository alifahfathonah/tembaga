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
            if( ($group_id==1 || $group_id==21)||($hak_akses['edit']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
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
                            <input type="text" id="no_prd" name="no_prd" readonly="readonly"
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
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?=$header['remarks'];?></textarea>                           
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
                                value="<?php echo '('.$header['kode'].') '.$header['jenis_barang']; ?>">
                                
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
    <?php
        if((($group_id==1 || $group_id==21) && !$header['flag_result']) || (!$header['flag_result'])){
    ?>
                    
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select  id="no_packing" name="no_packing" placeholder="Silahkan pilih..." 
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
                                <th>No Produksi</th>
                                <th></th>
                                <th>Netto (Kg)</th>
                                <th>Nomor Packing / Barcode</th>
                                <th width="20%">Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></td>
                                <td><input type="text" id="no_produksi" name="no_produksi" class="form-control myline"></td>
                                <td><a href="javascript:;" onclick="timbang_netto()" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>
                                <td><input type="text" id="netto" name="netto" class="form-control myline"/></td>
                                <td><input type="text" value="Auto" class="form-control myline" readonly="readonly"></td>
                                <td style="text-align:center"><button href="javascript:;" class="btn btn-xs btn-circle yellow-gold" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/GudangFG/produksi_fg'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
        </form>
        <?php
        }else{
        ?>
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
                                <th>Bruto</th>
                                <th>Netto (Kg)</th>
                                <th>Nomor Packing / Barcode</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                                $no=0;
                                foreach ($myDetail as $row) {
                                $no++;
                            ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $no; ?></td>
                            <?php 
                            echo '<td style="text-align:right;"><label id="lbl_bruto_'.$no.'">'.number_format($row->bruto,2,',','.').'</label>'.
                            '<input type="text" id="bruto_'.$no.'" name="bruto_'.$no.'" class="form-control myline" value="'.$row->bruto.'"  style="display:none;" maxlength="10" value="0"/></td>';

                            echo '<td style="text-align:right;"><label id="lbl_netto_'.$no.'">'.number_format($row->netto,2,',','.').'</label>'.
                            '<input type="text" id="netto_'.$no.'" name="netto_'.$no.'" class="form-control myline" value="'.$row->netto.'"  style="display:none;" maxlength="10" value="0"/></td>';
                            echo '<td style="text-align:right;"><label id="lbl_no_packing_'.$no.'">'.$row->no_packing_barcode.'</label>'.
                            '<input type="text" id="no_packing_'.$no.'" name="no_packing_'.$no.'" class="form-control myline" value="'.$row->no_packing_barcode.'" readonly style="display:none;" maxlength="10" value="0"/></td>';
                            ?>
                                <td><?php echo $row->keterangan; ?></td>
                                <td style="text-align: center;">
                                <?php
                                echo '<a id="btnEdit_'.$no.'" href="javascript:;" class="btn btn-xs btn-circle green" onclick="editDetail('.$no.');"><i class="fa fa-pencil"></i> Edit </a>'.
                                    '<a id="btnUpdate_'.$no.'" href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="updateDetail('.$no.');" style="margin-top:5px; display:none;"><i class="fa fa-save"></i> Update </a>';
                                echo '<a class="btn btn-circle btn-xs red" href="'.base_url().'index.php/GudangFG/delete_detail_produksi_bpb/'.$row->no_packing_barcode.'/'.$header['id'].'" onclick="return confirm(\'Anda yakin ingin menghapus barcode ini?\');"><i class="fa fa-trash"></i> Delete</a>';?>
                                    <a href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode(<?=$row->id;?>);"><i class="fa fa-print"></i> Print Barcode </a></td>
                            </tr>
                            <?php
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
                    <a href="<?php echo base_url('index.php/GudangFG/produksi_fg'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
        <?php
        }//if flag
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

function editDetail(id){
    $('#btnEdit_'+id).hide();
    $('#lbl_bruto_'+id).hide();
    $('#lbl_netto_'+id).hide();
    $('#lbl_no_packing_'+id).hide();
    
    $('#btnUpdate_'+id).show();
    $('#bruto_'+id).show();
    $('#netto_'+id).show();
    $('#no_packing_'+id).show();
}

function updateDetail(id){
    const jenis = $("#jenis_barang").val();
    if($.trim($("#bruto_"+id).val()) == ""){
        $('#message').html("Bruto tidak boleh kosong");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto_"+id).val()) == ""){
        $('#message').html("Netto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangFG/update_detail_produksi'); ?>',
            data:{
                bruto:$('#bruto_'+id).val(),
                netto:$('#netto_'+id).val(),
                no_packing:$('#no_packing_'+id).val()
            },
            success:function(result){
                // if(result['message_type']=="sukses"){
                //     loadDetailEdit($('#id').val());
                //     $('#message').html("");
                //     $('.alert-danger').hide(); 
                // }else{
                //     $('#message').html(result['message']);
                //     $('.alert-danger').show(); 
                // }   
                location.reload();         
            }
        });
    }
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/GudangFG/load_detail_roll'); ?>',
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

// function saveDetail(){
//     if($.trim($("#netto").val()) == ""){
//         $('#message').html("Silahkan isi netto barang!");
//         $('.alert-danger').show(); 
//     } else if($.trim($("#no_packing").val()) == ""){
//         $('#message').html("Silahkan pilih packing barang!");
//         $('.alert-danger').show(); 
//     } else{
//         console.log($('#no_produksi').val());
//         $.ajax({
//             type:"POST",
//             url:'<?php echo base_url('index.php/GudangFG/save_detail_roll'); ?>',
//             data:{
//                 id:$('#id').val(),
//                 no_produksi: $('#no_produksi').val(),
//                 tanggal: $('#tanggal').val(),
//                 netto: $('#netto').val(),
//                 ukuran: $('#ukuran').val(),
//                 no_packing: $('#no_packing').val(),
//                 id_packing: $('#id_packing').val()
//             },
//             success:function(result){
//                 if(result['message_type']=="sukses"){
//                     loadDetail($('#id').val());
//                     $('#no_produksi').val('');
//                     $('#bruto').val('');
//                     $('#berat_bobbin').val('');
//                     $('#netto').val('');
//                     $('#message').html("");
//                     $('.alert-danger').hide(); 
//                     $('#no_produksi').focus();
//                 }else{
//                     $('#message').html(result['message']);
//                     $('.alert-danger').show(); 
//                 }            
//             }
//         });
//     }
// }

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

function printBarcode(id){
    window.open('<?php echo base_url('index.php/GudangFG/print_barcode_kardus?id=');?>'+id,'_blank');
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$('#btnSaveDetail').click(function(event) {
    event.preventDefault(); /*  Stops default form submit on click */

    if($.trim($("#netto").val()) == ""){
        $('#message').html("Silahkan isi netto barang!");
        $('.alert-danger').show(); 
    }else if($.trim($("#no_packing").val()) == ""){
        $('#message').html("Silahkan pilih packing barang!");
        $('.alert-danger').show(); 
    }else{
        // $('#btnSaveDetail').text('Please Wait ...').prop("onclick", null).off("click");
        $('#btnSaveDetail').prop('disabled',true);
        $('#btnSaveDetail').text('Please Wait ...');
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangFG/save_detail_roll'); ?>',
            data:{
                id:$('#id').val(),
                no_produksi: $('#no_produksi').val(),
                tanggal: $('#tanggal').val(),
                netto: $('#netto').val(),
                ukuran: $('#ukuran').val(),
                no_packing: $('#no_packing').val(),
                id_packing: $('#id_packing').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $('#btnSaveDetail').prop('disabled',false);
                    $('#no_produksi').val('');
                    $('#bruto').val('');
                    $('#berat_bobbin').val('');
                    $('#netto').val('');
                    $('#message').html("");
                    $('.alert-danger').hide(); 
                    $('#no_produksi').focus();
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
});

    loadDetail(<?php echo $header['id']; ?>);
</script>