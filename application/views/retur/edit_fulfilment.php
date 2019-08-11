<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Retur 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Retur/add_fulfilment'); ?>"> Input Retur Fulfilment </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Retur/update_fulfilment'); ?>">                            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_retur" name="no_retur" readonly="readonly" class="form-control myline" style="margin-bottom:5px"  value="<?= (($this->session->userdata('user_ppn') == 1)? $header['nama_customer'] : $header['nama_customer_kh']) ?>">
                            <!-- <input type="hidden" name="retur_id" id="retur_id"> -->
                            <!-- <input type="text" id="no_retur" name="no_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Auto generate"> -->
                            <input type="hidden" name="id" id="id" value="<?php echo $header['id']; ?>">
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
                    <div class="row">&nbsp;</div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Retur
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_retur" name="no_retur" readonly="readonly" class="form-control myline" style="margin-bottom:5px"  value="<?php echo $header['no_retur']; ?>">
                        </div>
                    </div>
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
                </div>              
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center">Detail Permintaan Retur</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>Netto (Kg)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $netto = 0;
                                            foreach ($myDetail as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->netto.'</td>';
                                                echo '<td>'.$row->line_remarks.'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $netto += $row->netto;
                                            }
                                        ?>
                                        <!-- <tr>
                                            <td style="text-align: right;" colspan="2">Total</td>
                                            <td><?php echo $netto; ?></td>
                                            <td></td>
                                        </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB FG</h4>
                            <div class="table-scrollable">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <th style="width:40px">No</th>
                                        <th width="25%;">Nama Barang</th>
                                        <th>Netto (kg)</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="boxDetail">
                                        
                                    </tbody>                 
                                    <tr>
                                        <td style="text-align:center"><i class="fa fa-plus"></i></td>
                                        <td>
                                        <select id="jenis_barang_id" name="jenis_barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="check(this.value);">
                                        <option value=""></option>
                                           <?php foreach ($jenis_barang_list as $value){
                                                echo "<option value='".$value->id."'>(".$value->kode.') '.$value->jenis_barang."</option>";
                                            } ?>
                                        </select>
                                        </td>
                                        <td><input type="text" id="netto" name="netto" class="form-control myline"/></td>
                                        <td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                        <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/Retur'); ?>" class="btn blue-hoki"> 
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
function check(){
    var valid = true;
        $.each($("input[id$='jenis_barang_id']"), function (index1, item1) {
            $.each($("input[id$='id_jenis_barang']"), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
    if(valid=false){
        alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
    }
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
}

function loadDetail(id){
    console.log(id);
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('index.php/Retur/load_detail_fulfilment'); ?>",
        data:"id="+ id,
        success:function(result){
            console.log(result);
            $('#boxDetail').html(result);     
        }
    });
}

function saveDetail(){
    if($.trim($("#jenis_barang_id").val()) == ""){
        $('#message').html("Silahkan pilih detail item retur!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto").val()) == ""){
        $('#message').html("Netto tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:"<?php echo base_url('index.php/Retur/save_detail_fulfilment'); ?>",
            data:{
                id:$('#id').val(),
                jenis_barang_id:$('#jenis_barang_id').val(),
                netto:$('#netto').val(),
                line_remarks:$('#line_remarks').val()
            },
            success:function(result){
                console.log(result);
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $('#jenis_barang_id').select2('val','');
                    $('#netto').val('');
                    $('#line_remarks').val('');
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
    var r=confirm("Anda yakin menghapus item ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Retur/delete_detail_fulfilment'); ?>',
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

// function get_retur(id){
//     $.ajax({
//         type: "POST",
//         url: "<?php echo base_url('index.php/Retur/get_retur'); ?>",
//         async: false,
//         data: "id="+id,
//         dataType: "html",
//         success: function(result) {
//             $('#retur_id').html(result);
//         }
//     });
// }
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tgl_spare_part").datepicker({
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
      