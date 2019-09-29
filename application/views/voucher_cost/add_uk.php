<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Voucher Cost 
            <a href="<?php echo base_url('index.php/VoucherCost/kas_keluar'); ?>"> Tambah Uang Keluar Manual </a>
        </h4>          
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
              id="formku" action="<?php echo base_url('index.php/VoucherCost/save_uk'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Uang Keluar <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_uk" name="no_uk" class="form-control myline" style="margin-bottom:5px" placeholder="Nomor Uang Keluar..." onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Jatuh Tempo <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_jatuh" name="tgl_jatuh" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d'); ?>">
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
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Bank <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bank_id" name="bank_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($bank_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->kode_bank.' ('.$row->nomor_rekening.')</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Giro
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nomor_giro" name="nomor_giro" class="form-control myline" value="" placeholder="Nomor Giro..." style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             Currency
                        </div>
                        <div class="col-md-8">
                            <select id="currency" name="currency" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cur(this.value);">
                            <option value="IDR">IDR</option>
                            <option value="USD">USD</option>
                            </select>         
                        </div>
                    </div>
                    <div class="row" id="show_kurs">
                        <div class="col-md-4">
                            Kurs
                        </div>
                        <div class="col-md-8">
                            <input type="number" id="kurs" name="kurs" class="form-control myline" value="1" style="margin-bottom:5px">
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
                                <th>Nama Group Cost</th>
                                <th>Nama Cost</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                <td>
                                    <select id="group_cost_id_1" name="myDetails[1][group_cost_id]" class="form-control select2me myline"  data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cost(this.value,1);">
                                        <option value=""></option>
                                        <?php foreach ($list_group_cost as $value){ ?>
                                                <option value='<?=$value->id;?>'>
                                                    <?=$value->nama_group_cost;?>
                                                </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select id="cost_id_1" name="myDetails[1][cost_id]" class="form-control myline select2me" 
                                        data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                        <option value=""></option>
                                    </select>
                                    <input type="text" id="nm_cost_1" name="myDetails[1][nm_cost]" style="margin-bottom:5px" class="form-control myline hidden" disabled="disabled" placeholder="Nama Cost" onkeyup="this.value = this.value.toUpperCase()">
                                </td>
                                <td><input type="text" id="line_remarks_1" name="myDetails[1][line_remarks]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                <td><input type="text" id="nominal_1" name="myDetails[1][nominal]" class="form-control myline" onkeyup="getComa(this.value, this.id);"></td>
                                <td style="text-align:center">
                                    <a id="save_1" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail(1);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="text-align: right;"><strong>Total :</strong></td>
                                    <td><input type="text" id="total_nominal" name="total_nominal" class="form-control" readonly="readonly"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <button href="javascript:;" class="btn green" id="simpanData"> 
                        <i class="fa fa-floppy-o"></i> Simpan </button>

                    <a href="<?php echo base_url('index.php/VoucherCost/kas_keluar'); ?>" class="btn blue-hoki">
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
function get_cur(id){
    if(id=='USD'){
        $('#show_kurs').show();
    }else if(id=='IDR'){
        $('#show_kurs').hide();
        $('#kurs').val(1);
    }
}

function getComa(value, id){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function get_cost(id,row){   
    if (id == 3) {
        $('#cost_id_'+row).attr('disabled','disabled');
        $('#cost_id_'+row).addClass('hidden');
        $('#nm_cost_'+row).attr('disabled',false);
        $('#nm_cost_'+row).removeClass('hidden');
    } else {
        $('#cost_id_'+row).val('');
        $('#cost_id_'+row).removeAttr('disabled');
        $('#cost_id_'+row).removeClass('hidden');
        $('#nm_cost_'+row).attr('disabled','disabled');
        $('#nm_cost_'+row).addClass('hidden');
        $.ajax({
            url: "<?php echo base_url('index.php/VoucherCost/get_cost_list'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "html",
            success: function(result) {
                $('#cost_id_'+row).html(result);
            }
        });
    }
}

function saveDetail(id){
    if($.trim($("#group_cost_id_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nama item rongsok!");
        $('.alert-danger').show(); 
    }else if($.trim($("#nominal_"+id).val()) == "" || 0){
        $('#message').html("Jumlah bruto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        nominal = $('#nominal_'+id).val().toString().replace(/\,/g, "");
        total_nominal = $('#total_nominal').val().toString().replace(/\,/g, "");
        total_harga = Number(total_nominal) + Number(nominal); 
        total_harga = total_harga.toFixed(2);
        $('#total_nominal').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#save_"+id).hide();
        $('#group_cost_id_'+id).attr('readonly','readonly');
        $('#cost_id_'+id).attr('readonly','readonly');
        $('#nm_cost_'+id).attr('readonly','readonly');
        $('#line_remarks_'+id).attr('readonly','readonly');
        $('#nominal_'+id).attr('readonly','readonly');
        $("#delete_"+id).removeClass('disabled');
        var new_id = id+1; 
        $("#tabel_dtr>tbody").append(
            '<tr>'+
                '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<td><select id="group_cost_id_'+new_id+'" name="myDetails['+new_id+'][group_cost_id]" class="form-control select2me myline"  data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cost(this.value,'+new_id+');">'+
                    '<option value=""></option>'+
                    '<?php foreach($list_group_cost as $v){ print('<option value="'.$v->id.'">'.$v->nama_group_cost.'</option>');}?>'+
                '</select>'+
                '</td>'+
                '<td><select id="cost_id_'+new_id+'" name="myDetails['+new_id+'][cost_id]" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px">'+
                    '<option value=""></option>'+
                    '</select>'+
                    '<input type="text" id="nm_cost_'+new_id+'" name="myDetails['+new_id+'][nm_cost]" style="margin-bottom:5px" class="form-control myline hidden" disabled="disabled" placeholder="Nama Cost" onkeyup="this.value = this.value.toUpperCase()">'+
                '</td>'+
                '<td><input type="text" id="line_remarks_'+new_id+'" name="myDetails['+new_id+'][line_remarks]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'+
                '<td><input type="text" id="nominal_'+new_id+'" name="myDetails['+new_id+'][nominal]" class="form-control myline" onkeyup="getComa(this.value, this.id);"></td>'+
                '<td style="text-align:center"><a id="save_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                    '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
                ' <a id="print_'+new_id+'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('+new_id+');" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a>'+
                '</td>'+
            '</tr>'
        );
        $('#group_cost_id_'+new_id).select2();
        $('#cost_id_'+new_id).select2();
    }
}

function deleteDetail(id){
    var r=confirm("Anda yakin menghapus item rongsok ini?");
    if (r==true){
        nominal = $('#nominal_'+id).val().toString().replace(/\,/g, "");
        total_nominal = $('#total_nominal').val().toString().replace(/\,/g, "");
        total_harga = Number(total_nominal) - Number(nominal); 
        total_harga = total_harga.toFixed(2);
        $('#total_nominal').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#no_tabel_'+id).closest('tr').remove();
        }
}
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $('#show_kurs').hide();
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
    $("#tgl_jatuh").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    $('#simpanData').click(function(event) {
        event.preventDefault(); /*  Stops default form submit on click */

        if($.trim($("#tanggal").val()) == ""){
            $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($("#no_uk").val() == ""){
            $('#message').html("Supplier harus diisi, tidak boleh kosong!");
            $('.alert-danger').show();
        }else if($.trim($("#bank_id").val()) == ""){
            $('#message').html("Bank Belum Dipilih!");
            $('.alert-danger').show();
        }else if($.trim($("#total_nominal").val()) == ""){
            $('#message').html("Nominal harus diisi, tidak boleh kosong!");
            $('.alert-danger').show();
        }else{   
            // console.log('b ajax');
            $('#simpanData').prop('disabled',true);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/BeliRongsok/get_no_uang_keluar'); ?>",
                data: {
                    no_uk: $('#no_uk').val(),
                    tanggal: $('#tanggal').val(),
                    bank_id: $('#bank_id').val()
                },
                cache: false,
                success: function(result) {
                    // console.log('a ajax');
                    var res = result['type'];
                    if(res=='duplicate'){
                        $('#simpanData').prop('disabled',false);
                        $('#message').html("Nomor Uang Keluar sudah ada, tolong coba lagi!");
                        $('.alert-danger').show();
                    }else{
                        $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                        $('#message').html("");
                        $('.alert-danger').hide(); 
                        $('#formku').submit();
                    }
                }
            });
        }
    });
});
</script>