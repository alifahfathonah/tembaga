<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto(1);"> <i class="fa fa-dashboard"></i> Timbang </a>
        <input type="text" id="netto_1" name="myDetails[1][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly">
    </div>
</div> 
<script>
function timbang_netto(id){
    $.ajax({
        url: "http://192.168.0.201:10000/scaleload",
        method: "POST",
        dataType: "json",
        success: function (result){
            console.log(result);
            $('#netto_'+id).val(result['nett']);
        }
    });
}

// function createVoucherPelunasan(id){
//     $.ajax({
//         url: "<?php echo base_url('index.php/BeliRongsok/create_voucher_pelunasan'); ?>",
//         type: "POST",
//         data : {id: id},
//         success: function (result){
//             //console.log(result);
//             $('#no_po_pelunasan').val(result['no_po']);
//             $('#tanggal_po_pelunasan').val(result['tanggal']);
//             $('#nama_supplier_pelunasan').val(result['nama_supplier']);
//             $('#nilai_po_pelunasan').val(result['nilai_po']);
//             $('#nilai_dp_pelunasan').val(result['nilai_dp']);
            
//             $('#amount_pelunasan').val(result['sisa']);
//             $('#keterangan_pelunasan').val('');
//             $('#id_pelunasan').val(result['id']);
            
//             $('#msg_pelunasan').html("");
//             $('#box_error_pelunasan').hide(); 
            
//             $("#myModalPelunasan").find('.modal-title').text('Create Voucher Pelunasan');
//             $("#myModalPelunasan").modal('show',{backdrop: 'true'});           
//         }
//     });
// }

// function prosesPelunasan(){
//     if($.trim($("#tanggal_pelunasan").val()) == ""){
//         $('#msg_pelunasan').html("Tanggal harus diisi, tidak boleh kosong!");
//         $('#box_error_pelunasan').show(); 
//     }else if($.trim($("#amount_pelunasan").val()) == "" || $("#amount_pelunasan").val()=="0"){
//         $('#msg_pelunasan').html("Amount harus diisi, tidak boleh kosong!");
//         $('#box_error_pelunasan').show();
//     }else{    
//         $('#msg_pelunasan').html("");
//         $('#box_error_pelunasan').hide();
//         $('#frm_pelunasan').attr("action", "<?php echo base_url(); ?>index.php/BeliRongsok/save_voucher_pelunasan");
//         $('#frm_pelunasan').submit(); 
//     };
// };
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
    
    $("#tanggal_jatuh").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    }); 

    $("#tgl_start").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 
    
    $("#tgl_end").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 

    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         