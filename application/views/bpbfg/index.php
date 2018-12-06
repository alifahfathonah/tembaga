<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Master 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Bpbfg'); ?>"> Bpb Fg </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>



  
   <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i> BPB FG 
                </div>             

                 <div class="tools">    
            
                    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url('index.php/Bpbfg/add')?>"> 
                        <i class="fa fa-plus"></i> Add Bpb Fg  </a>
                    
                                   
                </div>

            </div> 

   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>Tanggal</th>
            <th>Nomor BPB</th>
            <th>Keterangan</th>
            <th>M Sumber Wip ID</th>
            <th>M Jenis Packing ID</th>
            <th>Delete</th>
       </tr>
     </thead>
     <tbody>
       <?php
        foreach($jenis_barang_list as $data){

            echo"<tr>";    
                 echo"<td> $data->id </td>";
                echo"<td> $data->tanggal </td>";
                echo"<td> $data->no_spb </td>";
                echo"<td> $data->keterangan </td>";
                echo"<td> $data->m_sumber_wip_id </td>";
                echo"<td> $data->m_jenis_packing_id </td>";
                 echo"<td> <a href='#'> Delete </a> </td>";
            echo"</tr> ";

        
        }    
       ?>
     </tbody>   
   </table>
</div>
</div>
</div>




<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
var dsState;

function newData(){
    $('#nama_customer').val('');    
    $('#pic').val('');
    $('#telepon').val('');
    $('#hp').val('');
    $('#alamat').val('');
    $('#m_province_id').select2('val', '');
    $('#m_city_id').select2('val', '');
    $('#kode_pos').val('');
    $('#m_bank_id').select2('val', '');
    $('#kcp').val('');
    $('#no_rekening').val('');
    $('#keterangan').val('');
    $('#id').val('');
    dsState = "Input";
    
    $('#message').html("");
    $('.alert-danger').hide(); 
    
    $("#myModal").find('.modal-title').text('Input Data Customer');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
    if($.trim($("#nama_customer").val()) == ""){
        $('#message').html("Nama customer harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#pic").val()) == ""){
        $('#message').html("Nama penanggung jawab harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#alamat").val()) == ""){
        $('#message').html("Alamat harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#m_province_id").val()) == ""){
        $('#message').html("Silahkan pilih provinsi!");
        $('.alert-danger').show();
    }else if($.trim($("#m_city_id").val()) == ""){
        $('#message').html("Silahkan pilih kota!");
        $('.alert-danger').show();
    }else{     
        $('#message').html("");
        $('.alert-danger').hide();
        if(dsState=="Input"){                                   
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Customer/save");                                               
        }else{
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Customer/update");
        }
        $('#formku').submit();  
    };
};

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/Customer/edit'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#nama_customer').val(result['nama_customer']);            
            $('#pic').val(result['pic']);
            $('#telepon').val(result['telepon']);
            $('#hp').val(result['hp']);
            $('#alamat').val(result['alamat']);
            $('#m_province_id').select2('val',result['m_province_id']);
            get_city_list(result['m_province_id']);
            
            $('#m_city_id').select2('val',result['m_city_id']);
            $('#kode_pos').val(result['kode_pos']);
            $('#keterangan').val(result['keterangan']);
            $('#m_bank_id').select2('val',result['m_bank_id']);
            $('#kcp').val(result['kcp']);
            $('#no_rekening').val(result['no_rekening']);
            $('#id').val(result['id']);
            
            $("#myModal").find('.modal-title').text('Edit Customer');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function get_city_list(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Customer/get_city_list'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#m_city_id').html(result);
        }
    })
}

$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         