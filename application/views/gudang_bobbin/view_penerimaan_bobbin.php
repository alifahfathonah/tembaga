<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Bobbin
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangBobbin/view_spb'); ?>"> View Surat Penerimaan Bobbin</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Penerimaan Bobbin</b></h3>
        <hr class="divider" />
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <form class="eventInsForm" method="post" target="_self" name="frmReject" 
                              id="frmReject">                            
                            <div class="row">
                                <div class="col-md-4">
                                    Reject Remarks <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="reject_remarks" name="reject_remarks" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>
                                    
                                    <input type="hidden" id="header_id" name="header_id">
                                </div>
                            </div>                           
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="rejectData();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
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
        <?php
            if( ($group_id==1)||($hak_akses['view_spb']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Penerimaan<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_penerimaan']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['created_at'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['realname']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" style="margin-bottom: 5px" readonly name="nama_pemohon" value="<?php echo $header['surat_jalan'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px" readonly name="jenis_packing" value="<?php echo $header['pengirim'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Peminjaman
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px" readonly name="jenis_packing" value="<?php echo $header['no_surat_peminjaman'] ?>">

                            <input type="hidden" name="id_jenis" id="id_jenis" value="<?php echo $header['no_surat_peminjaman'] ?>">
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
            <br><br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Penerimaan Bobbin</h4>
                            <div class="table-scrollable">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <th style="text-align: center;">No</th>
                                        <th>Nomor Bobbin</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($myDetail as $row) {
                                        $no++;
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $no; ?></td>
                                            <td><?php echo $row->nomor_bobbin; ?></td>
                                            <?php
                                                if($row->status==0){
                                                    echo '<td style="background-color:green; color:white; padding:4px">Ready</td>';
                                                }else if($row->status==1){
                                                    echo '<td style="background-color:blue; color:white; padding:4px">Used</td>';
                                                }else if($row->status==2){
                                                    echo '<td style="background-color:yellow; color:white; padding:4px">Delivered</td>';
                                                }else if($row->status==3){
                                                    echo '<td style="background-color:orange; color:white; padding:4px">Booked</td>';
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                        }
                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    

                    <a href="<?php echo base_url('index.php/GudangBobbin/bobbin_terima'); ?>" class="btn blue-hoki"> 
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
 /*   $('#barang_1').change(function() { // When the select is changed
        var id_barang=$(this).val(); // Get the chosen value
        console.log(id_barang);
        $.ajax({
            type: "POST",
            url: "<?php //echo base_url('index.php/GudangFG/get_no_packing'); ?>", // The new PHP page which will get the option value, process it and return the possible options for second select
            data: {id: id_barang}, // Send the slected option to the PHP page
        });
    });*/

function approveData(){
    var r=confirm("Anda yakin meng-approve permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangBobbin/approve_spb");    
        $('#formku').submit(); 
    }
};

function showRejectBox(){
    var r=confirm("Anda yakin me-reject permintaan barang ini?");
    if (r==true){
        $('#header_id').val($('#id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Reject Permintaan Barang');
        $("#myModal").modal('show',{backdrop: 'true'}); 
    }
}

function rejectData(){
    if($.trim($("#reject_remarks").val()) == ""){
        $('#message').html("Reject remarks harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/GudangBobbin/reject_spb");
        $('#frmReject').submit(); 
    }
}

function check_duplicate(){
    var valid = true;
        $.each($("input[name$='[id_barang]']"), function (index1, item1) {
            $.each($("input[name$='[id_barang]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
        return valid;
}

function get_tsfd_id(id){
    id_spb = $("#id").val();
    console.log('id_spb' + id_spb);
    console.log('id_barang' + id);
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('index.php/GudangFG/get_tsfd_id'); ?>",
        data: {
            id_spb : id_spb,
            id_barang : id
        },
        success:function(result){
            console.log('tsfd id =' + result['id']);
            $('#tsfd_id').val(result['id']);     
        }
    });
}

function get_no_packing_detail(id){
    $("#packing_id_"+id).val($("#packing_"+id).val());
    var id_packing = $("#packing_"+id).val();
    console.log('ID PACKING'+id_packing);
    if(id_packing!=''){    
        var check = check_duplicate();
        if(check){
            $.ajax({
                url: "<?php echo base_url('index.php/GudangFG/get_no_packing_detail'); ?>",
                type: "POST",
                data : {no_packing: id_packing},
                dataType: "json",
                success: function(result) {
                    console.log('uom' + result['uom']);
                    console.log('netto' + result['netto']);
                    $('#uom_'+id).val(result['uom']);
                    $('#netto_'+id).val(result['netto']);
                }
            });
        } else {
            alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
        }
    }
}

function get_no_packing(id){
    $("#barang_id_"+id).val($("#barang_"+id).val());
    var id_barang = $("#barang_"+id).val();
    console.log(id_barang);
    if(id_barang!=''){    
        var check = check_duplicate();
        if(check){
            $.ajax({
                url: "<?php echo base_url('index.php/GudangFG/get_no_packing'); ?>",
                type: "POST",
                data : {id: id_barang},
                success:function(result){
                    $('#no_packing').html(result);     
                }
            });
        } else {
            alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
        }
    }
}

/*function getBarang(id){
    $("#barang_id_"+id).val($("#barang_"+id).val());
    var id_barang = $("#barang_"+id).val();
    console.log(id_barang);
    if(id_barang!=''){    
        var check = check_duplicate();
        if(check){
            $.ajax({
                url: "<?php// echo base_url('index.php/GudangFG/get_uom_spb'); ?>",
                type: "POST",
                data : {id: id_barang},
                success: function (result){
                    if (result!=null){
                        $("#spb_id_"+id).val(result['id']);
                        $("#uom_"+id).val(result['uom']);
                        $("#btn_"+id).removeClass('disabled');
                        $("#barang_"+id).attr('disabled','disabled');
    
                        create_new_input(id);
                    } else {
                        alert('Gagal menambahkan, silahkan ulangi kembali');
                        $("#barang_"+id).val('');
                    }
                }
            });
        } else {
            alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
            $("#no_pallete_"+id).val('');
        }
    }
}*/

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('index.php/GudangFG/load_detail_saved_item'); ?>",
        data: "id="+ id,
        success:function(result){
            $('#boxSavedItem').html(result);     
        }
    });
}

function saveDetail(){
    if($.trim($("#barang_1").val()) == ""){
        $('#message').html("Silahkan pilih nama barang !");
        $('.alert-danger').show(); 
    }else if($.trim($("#packing_1").val()) == ""){
        $('#message').html("Silahkan pilih nomor packing !");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangFG/save_detail_spb_fg_detail'); ?>',
            data:{
                t_spb_fg_id:$('#id').val(),
                tsfd_detail_id:$('#tsfd_id').val(),
                no_spb:$('#no_spb').val(),
                id_packing:$('#packing_1').val(),
                keterangan:$('#keterangan_1').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    console.log('SUKSES TAMBAH');
                    loadDetail(<?php echo $myData['id'];?>);
                    $('#barang_1').val(''); // set the value to blank with empty quotes
                    $('#uom_1').val('');
                    $('#packing_1').val('').hide();
                    $('#netto_1').val('');
                    $('#keterangan_1').val('');
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
/*
function create_new_input(id){
       var new_id = id+1; 
        $("#tabel_barang>tbody").append('<tr><td><div id="no_tabel_'+new_id+'">'+new_id+'</div><input id="spb_id_'+new_id+'" name="details['+new_id+'][spb_detail_id]" type="hidden"></td><td><select id="barang_'+new_id+'" class="form-control" placeholder="pilih jenis barang" name="details['+new_id+'][jenis_barang]" onchange="getBarang('+new_id+')"><option value=""></option><?php //foreach($list_barang as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}?></select><input name="details['+new_id+'][id_barang]" id="barang_id_'+new_id+'" type="hidden"></td><td><input id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly" type="text"></td><td><input id="qty_'+new_id+'" name="details['+new_id+'][qty]" class="form-control myline" type="text"></td><td><input id="berat_'+new_id+'" name="details['+new_id+'][berat]" class="form-control myline" type="text"></td><td><input id="keterangan_'+new_id+'" name="details['+new_id+'][keterangan]" class="form-control myline" type="text" onkeyup="this.value = this.value.toUpperCase()"></td><td style="text-align:center"><a id="btn_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td></tr>');
}*/

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus pemenuhan SPB FG ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangFG/delete_spb_fg_detail'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    console.log('BERHASIL DELETE');
                    loadDetail(<?php echo $myData['id'];?>);
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
<script type="text/javascript">
$(function(){    
    loadDetail(<?php echo $myData['id']; ?>);
});
</script>
      