<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/matching'); ?>"> Matching PO - DTR </a>
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['matching']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>

        <div class="modal fade" id="InvModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="frmInv" 
                              id="frmInv">
                            <input type="hidden" id="id_modal_inv" name="id_modal_inv">
                            <div class="row">
                                <div class="col-md-5">
                                    No. Invoice<font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_inv" name="no_inv" class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                    <input type="hidden" id="inv_type" name="inv_type">
                                    <input type="hidden" id="inv_id" name="inv_id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nilai Invoice
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nominal_inv" name="nominal_inv" class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nominal Sudah Di Bayar
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nominal_sdh_bayar" name="nominal_sdh_bayar" class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nominal Di Bayar
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nominal_bayar" name="nominal_bayar" class="form-control myline" style="margin-bottom:5px" onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id); hitungSubTotalInv();">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nominal Potongan/Pembulatan
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nominal_potongan" name="nominal_potongan" class="form-control myline" style="margin-bottom:5px" onkeyup="getComa(this.value, this.id); hitungSubTotalInv();" placeholder="Nominal Potongan ..." value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Sisa Invoice
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="sisa_invoice" name="sisa_invoice" class="form-control myline" style="margin-bottom:5px" value="0" readonly="readonly">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" id="tambah_inv">Tambah</button>
                        <button type="button" class="btn blue" id="simpan_inv">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message2">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="frmDetail" 
                              id="frmDetail">
                            <input type="hidden" id="id_modal" name="id_modal">
                            <input type="hidden" id="id_detail" name="id_detail">
                            <div class="row">
                                <div class="col-md-4">
                                    Keterangan
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="k_1" name="k_1" class="form-control myline" style="margin-bottom:5px" placeholder="Input Keterangan ..." onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    Currency
                                </div>
                                <div class="col-md-4">
                                    <select id="currency" name="currency" class="form-control myline select2me" 
                                        data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cur(this.value);">
                                        <option value="IDR">IDR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                                <div id="show_kurs">
                                <div class="col-md-2">
                                    Kurs
                                </div>
                                <div class="col-md-4">
                                    <input type="number" id="kurs" name="kurs" class="form-control myline" value="1">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Nominal
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nominal" name="nominal" class="form-control myline" style="margin-bottom:5px" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);" placeholder="Input Nominal ...">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" id="tambah_potongan">Tambah</button>
                        <button type="button" class="btn blue" id="simpan_potongan">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
            <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Finance/save_matching'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No Matching<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_matching" name="no_matching" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_matching']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            Status
                        </div>
                        <div class="col-md-8">
                            <?php if($header['status']==0){
                                echo '<div style="background-color:darkkhaki; padding:3px">Belum Balance</div>';
                            }else{
                                echo '<div style="background-color:green; padding:3px; color:white;">Balanced</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                            <input type="hidden" id="id_customer" name="id_customer" value="<?php echo $header['id_customer']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-5">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>List Invoice
                        </div> 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Trx</th>
                                    <th>No Invoice</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="list_inv">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-7">                
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>List Uang Masuk
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>No. Uang Masuk</th>
                                    <th>No. Giro</th>
                                    <th>Status</th>
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="list_um">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>                          
        <div class="row">
            <div class="col-md-5">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Invoice
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Trx</th>
                                    <th>No Invoice</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="data_inv">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-7">                
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Uang Masuk
                        </div>  
                        <div class="tools">    
                            <a class="btn btn-xs btn-circle blue-ebonyclay" style="height: 22px;" id="addPotongan" href="<?=base_url();?>index.php/Finance/add_potongan_matching"> <i class="fa fa-plus"></i> Tambah Potongan</a>                
                        </div>               
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>No. Uang Masuk</th>
                                    <th>No. Giro</th>
                                    <th>Status</th>
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="data_um">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <a href="<?php echo base_url('index.php/Finance/matching'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                        &nbsp;
            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
function simpanData(){
    var result = confirm("Anda yakin untuk menyimpannya ?");
    if (result) {
        $('#formku').submit(); 
    }
}

function numberWithCommas(x) {
     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function hitungSubTotalInv(){
    nominal_inv = $('#nominal_inv').val().toString().replace(/\,/g, "");
    n1 = $('#nominal_sdh_bayar').val().toString().replace(/\,/g, "");
    n2 = $('#nominal_bayar').val().toString().replace(/\,/g, "");
    n3 = $('#nominal_potongan').val().toString().replace(/\,/g, "");
    total_harga = Number(nominal_inv) - (Number(n1) + Number(n2) + Number(n3));
    // console.log(nominal_inv+' | '+n3+' | '+total_harga);
    $('#sisa_invoice').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function hitungSubTotal(){
    nominal = $('#nominal').val().toString().replace(/\,/g, "");
    b1 = $('#b_1').val().toString().replace(/\,/g, "");
    b2 = $('#b_2').val().toString().replace(/\,/g, "");
    total_harga = Number(nominal) + (Number(b1) + Number(b2));
    $('#total_nominal').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function list_inv(id_cust,id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_list_invoice'); ?>",
        type: "POST",
        data: {
            id:id_cust,
            id_match:id
        },
        dataType: "json",
        success: function(result) {
            $('#list_inv').html(result);
        }
    });
}

function input_inv(id,type){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_data_inv'); ?>",
        type: "POST",
        data: {
            id:id,
            type:type
        },
        dataType: "json",
        success: function(result){
            $("#InvModal").find('.modal-title').text('Input Invoice');
            $("#InvModal").modal('show',{backdrop: 'true'});
            $("#tambah_inv").show();
            $("#simpan_inv").hide();
            $("#id_modal_inv").val(<?php echo $header['id'];?>);
            $("#no_inv").val(result['no_invoice']);
            $("#inv_id").val(result['id']);
            $("#inv_type").val(type);
            $("#nominal_inv").val(numberWithCommas(result['nilai_invoice']));
            $("#nominal_sdh_bayar").val(numberWithCommas(result['nilai_sudah_bayar']));
            // $("#nominal_potongan").val(numberWithCommas(result['nilai_pembulatan']));
            $("#nominal_bayar").val(numberWithCommas(result['nominal']));
            $("#sisa_invoice").val(0);
        }
    });
}

$('#tambah_inv').click(function(event) {
    event.preventDefault(); /*  Stops default form submit on click */

    if($.trim($("#nominal_bayar").val()) == ("" || 0)){
        $('#message').html("Nominal di Bayar harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $(this).prop('disabled', true);
        $.ajax({// Run getUnlockedCall() and return values to form
            url: "<?php echo base_url('index.php/Finance/add_inv_match'); ?>",
            data:{
               id_modal:$('#id_modal_inv').val(),
               id_inv:$('#inv_id').val(),
               nominal_sdh_bayar:$('#nominal_sdh_bayar').val(),
               nominal_bayar:$('#nominal_bayar').val(),
               nominal_potongan:$('#nominal_potongan').val(),
               sisa_invoice:$('#sisa_invoice').val(),
               inv_type:$('#inv_type').val()
            },
            type: "POST",
            success: function(result){
                if (result['message_type'] == 'sukses') {
                    $("#InvModal").modal('hide'); 
                    list_inv(<?php echo $header['id_customer'].','.$header['id'];?>);
                    data_inv(<?php echo $header['id'];?>);
                    $('#tambah_inv').prop('disabled', false);
                } else {
                    $("#InvModal").modal('hide'); 
                }
            }
        });
    }
});

// function addInv(id){
//     $.ajax({
//         type:"POST",
//         url:'<?php echo base_url('index.php/Finance/add_inv_match'); ?>',
//         data:{
//            id:$('#id').val(),
//            id_inv:id
//         },
//         success:function(result){
//             if(result['message_type']=="sukses"){
//                 list_inv(<?php echo $header['id_customer'];?>);
//                 data_inv(<?php echo $header['id'];?>);
//             }else{
//                 $('#message').html(result['message']);
//                 $('.alert-danger').show(); 
//             }            
//         }
//     });
// }

function delInv(id,id_inv){
    if(confirm('Anda yakin menghapus invoice ini?')){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Finance/del_inv_match'); ?>',
            data:{
               id:id,
               id_inv:id_inv
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    list_inv(<?php echo $header['id_customer'].','.$header['id'];?>);
                    data_inv(<?php echo $header['id'];?>);
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
}

function data_inv(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_data_invoice'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#data_inv').html(result);
            load_sisa();
        }
    });
}

function view_inv(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/view_data_inv'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result){
            $("#InvModal").find('.modal-title').text('Input Invoice');
            $("#InvModal").modal('show',{backdrop: 'true'});
            $("#tambah_inv").hide();
            $("#simpan_inv").hide();
            $("#id_modal_inv").val(result['id']);
            $("#inv_type").val(result['inv_type']);
            $("#no_inv").val(result['no_invoice']);
            $("#inv_id").val(result['id_inv']);
            $("#nominal_inv").val(numberWithCommas(result['nilai_invoice']));
            $("#nominal_sdh_bayar").val(numberWithCommas(result['inv_bayar']));
            $("#nominal_potongan").val(numberWithCommas(result['inv_pembulatan']));
            $("#nominal_bayar").val(numberWithCommas(result['inv_bayar']));
            // hitungSubTotalInv();
        }
    });
}

$('#simpan_inv').click(function(event) {
    event.preventDefault(); /*  Stops default form submit on click */

    if($.trim($("#nominal_bayar").val()) == ("" || 0)){
        $('#message').html("Nominal di Bayar harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $(this).prop('disabled', true);
        $.ajax({// Run getUnlockedCall() and return values to form
            url: "<?php echo base_url('index.php/Finance/save_inv_match'); ?>",
            data:{
               id_modal:$('#id_modal_inv').val(),
               id_inv:$('#inv_id').val(),
               nominal_sdh_bayar:$('#nominal_sdh_bayar').val(),
               nominal_bayar:$('#nominal_bayar').val(),
               nominal_potongan:$('#nominal_potongan').val(),
               sisa_invoice:$('#sisa_invoice').val(),
               inv_type:$('#inv_type').val()
            },
            type: "POST",
            success: function(result){
                if (result['message_type'] == 'sukses') {
                    $("#InvModal").modal('hide'); 
                    list_inv(<?php echo $header['id_customer'].','.$header['id'];?>);
                    data_inv(<?php echo $header['id'];?>);
                    $('#simpan_inv').prop('disabled', false);
                } else {
                    $("#InvModal").modal('hide'); 
                }
            }
        });
    }
});

/** UM DIBAWAH **/
function list_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_list_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#list_um').html(result);
        }
    });
}

function input_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_data_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result){
            $("#myModal").find('.modal-title').text('Input Matching');
            $("#myModal").modal('show',{backdrop: 'true'});
            $("#tambah").show();
            $("#simpan").hide();
            $("#id_modal").val(<?php echo $header['id'];?>);
            $("#no_um").val(result['no_uang_masuk']);
            $("#um_id").val(result['id']);
            $("#nominal").val(numberWithCommas(result['nominal']));
            $("#total_nominal").val(numberWithCommas(result['nominal']));
        }
    });
}

function addUM(){
    var result = confirm("Anda yakin untuk menambahnya ?");
    if (result) {
        $('#frmDetail').attr("action", "<?php echo base_url(); ?>index.php/Finance/add_um_match");
        $('#frmDetail').submit(); 
    }
}

function instantADDUM(id){
    // console.log($('#id').val());
    $('.addUM').prop('disabled', true);
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Finance/add_instant_um_match'); ?>',
        data:{
           um_id:id,
           id_modal:$('#id').val()
        },
        success:function(result){
            if(result['message_type']=="sukses"){
                $('.addUM').prop('disabled', false);
                list_um(<?php echo $header['id_customer'];?>);
                data_um(<?php echo $header['id'];?>);
            }else{
                $('#message').html(result['message']);
                $('.alert-danger').show(); 
            }            
        }
    });
}

function saveUM(){
    var result = confirm("Anda yakin untuk menyimpan ?");
    if (result) {
        $('#frmDetail').attr("action", "<?php echo base_url(); ?>index.php/Finance/save_um_match");
        $('#frmDetail').submit(); 
    }
}

function view_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/view_data_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result){
            $("#myModal").find('.modal-title').text('Edit Potongan');
            $("#myModal").modal('show',{backdrop: 'true'});
            $("#tambah_potongan").hide();
            $("#simpan_potongan").show();
            $("#id_modal").val(<?php echo $header['id'];?>);
            $("#id_detail").val(result['id']);
            $('#k_1').val(result['keterangan'])
            $('#currency').select2('val',result['currency']);
            $('#kurs').val(result['kurs']);
            $("#nominal").val(numberWithCommas(result['biaya']));
        }
    });
}

function delUM(id,id_um){
    $('#delInv').prop('disabled', true);
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Finance/del_um_match'); ?>',
        data:{
           id:id,
           id_um:id_um
        },
        success:function(result){
            if(result['message_type']=="sukses"){
                $('#delInv').prop('disabled', false);
                list_um(<?php echo $header['id_customer'];?>);
                data_um(<?php echo $header['id'];?>);
            }else{
                $('#message').html(result['message']);
                $('.alert-danger').show(); 
            }            
        }
    });
}

function data_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_data_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#data_um').html(result);
            load_sisa();
        }
    });
}

function load_sisa(){
    var sisa_invoice = $('#load_total_nominal').val()-$('#load_total_invoice').val();
    var sisa_nominal = $('#load_total_invoice').val()-$('#load_total_nominal').val();
    if(sisa_invoice>=0){
        $('#view_total_invoice').css({'color': 'white', 'background-color':'green'});
    }else{
        $('#view_total_invoice').css({'color': 'white', 'background-color':'red'});
    }

    if(sisa_nominal>=0){
        $('#view_total_nominal').css({'color': 'white', 'background-color':'green'});
    }else{
        $('#view_total_nominal').css({'color': 'white', 'background-color':'red'});
    }
    $('#view_total_invoice').html(numberWithCommas(sisa_invoice));
    $('#view_total_nominal').html(numberWithCommas(sisa_nominal));
}

$('#addPotongan').click(function(event) {
    event.preventDefault();
    $("#myModal").find('.modal-title').text('Tambah Potongan');
    $("#myModal").modal('show',{backdrop: 'true'});
    $('#id_modal').val($('#id').val());
    $('#k_1').val('');
    $('#nominal').val('');
    $('#id_detail').val('');
    $('#simpan_potongan').hide();
    $('#tambah_potongan').show();
});

$('#tambah_potongan').click(function(event) {
    event.preventDefault(); /*  Stops default form submit on click */

    if($.trim($("#nominal").val()) == ("" || 0)){
        $('#message2').html("Nominal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#k_1").val()) == ("" || 0)){
        $('#message2').html("Keterangan harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $.ajax({// Run getUnlockedCall() and return values to form
            url: "<?php echo base_url('index.php/Finance/add_potongan_match'); ?>",
            data:{
               id_modal:$('#id_modal').val(),
               k_1:$('#k_1').val(),
               currency:$('#currency').val(),
               kurs:$('#kurs').val(),
               nominal:$('#nominal').val()
            },
            type: "POST",
            success: function(result){
                if (result['message_type'] == 'sukses') {
                    $("#myModal").modal('hide'); 
                    list_um(<?php echo $header['id_customer'].','.$header['id'];?>);
                    data_um(<?php echo $header['id'];?>);
                    $('#k_1').val('');
                    $('#currency').val('');
                    $('#nominal').val('');
                } else {
                    $("#myModal").modal('hide'); 
                }
            }
        });
    }
});

$('#simpan_potongan').click(function(event) {
    event.preventDefault(); /*  Stops default form submit on click */
    if($.trim($("#nominal").val()) == ("" || 0)){
        $('#message2').html("Nominal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#k_1").val()) == ("" || 0)){
        $('#message2').html("Keterangan harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $.ajax({// Run getUnlockedCall() and return values to form
            url: "<?php echo base_url('index.php/Finance/save_potongan_match'); ?>",
            data:{
               id_modal:$('#id_modal').val(),
               id_detail:$('#id_detail').val(),
               k_1:$('#k_1').val(),
               nominal:$('#nominal').val(),
               currency:$('#currency').val(),
               kurs:$('#kurs').val()
            },
            type: "POST",
            success: function(result){
                if (result['message_type'] == 'sukses') {
                    $("#myModal").modal('hide'); 
                    list_um(<?php echo $header['id_customer'].','.$header['id'];?>);
                    data_um(<?php echo $header['id'];?>);
                    $('#k_1').val('');
                    $('#currency').val('');
                    $('#nominal').val('');
                } else {
                    $("#myModal").modal('hide'); 
                }
            }
        });
    }
});

function get_cur(id){
    if(id=='USD'){
        $('#show_kurs').show();
    }else if(id=='IDR'){
        $('#show_kurs').hide();
        $('#kurs').val(1);
    }
}

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
    list_inv(<?php echo $header['id_customer'].','.$header['id']; ?>);
    list_um(<?php echo $header['id_customer']; ?>);
    data_inv(<?php echo $header['id']; ?>);
    data_um(<?php echo $header['id']; ?>);
    load_sisa();
    $('#show_kurs').hide();
});
</script>