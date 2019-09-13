<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/create_lpb'); ?>"> Create Bukti Penerimaan Barang </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_lpb']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/BeliSparePart/save_lpb'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. BPB Terakhir 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_bpb_terakhir" name="no_bpb_terakhir" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $bpb['no_bpb']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. BPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                        <?php if($this->session->userdata('user_ppn')==1){
                            echo '<input type="text" id="no_bpb" name="no_bpb" class="form-control myline" style="margin-bottom:5px" placeholder="Silahkan isi Nomor BPB..." onkeyup="this.value = this.value.toUpperCase()">';
                        }else{
                            echo '<input type="text" id="no_bpb" name="no_bpb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Auto Generate">';
                        }?>
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
                    <div class="row">
                        <div class="col-md-4">
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['id']; ?>">
                            <input type="hidden" id="kurs" name="kurs" value="<?php echo $header['kurs']; ?>">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Supplier
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supplier" name="supplier" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_supplier']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Pengirim <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="pengirim" name="pengirim" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penerima 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penerima" name="nama_penerima" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>
                                    <input type="checkbox" id="check_all" name="check_all" onclick="checkAll()" class="form-control">
                                </th>
                                <th>Nama Item Spare Part</th>
                                <th>Unit of Measure</th>
                                <th>Jumlah</th>
                                <th>(Sisa) Yang Diminta</th>
                                <th>Keterangan</th>
                            </thead>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($details as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td>';
                                    echo '<input type="checkbox" value="1" id="check_'.$no.'" name="myDetails['.$no.'][check]" 
                                            onclick="check();" class="form-control">';
                                    echo '<input type="hidden" id="alias_'.$no.'" name="myDetails['.$no.'][alias]" value="'.$row->alias.'">';
                                    echo '<input type="hidden" id="po_detail_id_'.$no.'" name="myDetails['.$no.'][po_detail_id]" value="'.$row->id.'">';
                                    echo '<input type="hidden" id="sparepart_id_'.$no.'" name="myDetails['.$no.'][sparepart_id]" value="'.$row->sparepart_id.'">';
                                    echo '</td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][nama_item]" '
                                            . 'class="form-control myline" value="'.$row->nama_item.'" '
                                            . 'readonly="readonly"></td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][uom]" '
                                            . 'class="form-control myline" value="'.$row->uom.'" '
                                            . 'readonly="readonly"></td>';          
                                    echo '<td><input type="text" id="qty_'.$no.'" name="myDetails['.$no.'][qty]" class="form-control myline" onchange="check_qty('.$no.')"></td>';
                                    echo '<input type="hidden" id="qty_asli_'.$no.'" name="myDetails['.$no.'][qty_asli]" class="form-control myline" readonly="readonly" value="'.$row->qty.'">';
                                    echo '<input type="hidden" id="amount_'.$no.'" name="myDetails['.$no.'][amount]" class="form-control myline" readonly="readonly" value="'.$row->amount.'">';
                                    echo '<td><input type="text" data-id="'.$no.'" id="qty_full_'.$no.'" name="myDetails['.$no.'][qty_full]" class="form-control myline likesAjax" readonly="readonly"></td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][line_remarks]" '
                                            . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
                                    echo '</tr>';
                                    $no++;
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
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Create BPB </a>

                    <a href="<?php echo base_url('index.php/BeliSparePart/po_list'); ?>" class="btn blue-hoki"> 
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
<script type="text/javascript">
$(".likesAjax").each(function() {
    var ID = $(this).attr("data-id");
    check_sisa(ID);
});

function check_sisa(ID){
    var po_detail_id = $("#po_detail_id_"+ID).val();
    var sparepart_id = $("#sparepart_id_"+ID).val();
    $.ajax({
        url:"<?php echo base_url('index.php/BeliSparePart/show_cek_qty'); ?>",
        type:"POST",
        data : {
            po_id: po_detail_id,
            sp_id: sparepart_id
        },
        dataType: "json",
        success:function(result){
            qty_asli=$('#qty_asli_'+ID).val();
            $('#qty_'+ID).val(qty_asli-result['total']);
            $('#qty_full_'+ID).val(qty_asli-result['total']);     
        }
    });
}

function check_qty(id){
    if (Number($('#qty_'+id).val()) > Number($('#qty_full_'+id).val())){
        if (confirm('Apa anda yakin jumlah melebihih Sisa yang diminta ?')) {
            // Save it!
        } else {
            $('#message').html("Jumlah melebihi permintaan"); 
            $('.alert-danger').show();
            $('#qty_'+id).val(0);
        }
    }
}
function checkAll(){
    if ($('#check_all').prop("checked")) {  
        $('input').each(function(i){
            $('#uniform-check_'+i+' span').attr('class', 'checked');
            $('#check_'+i).attr('checked', true);
        });
    }else{
        $('input').each(function(i){
            $('#uniform-check_'+i+' span').attr('class', '');
            $('#check_'+i).attr('checked', false);
        });
    }   
}

function check(){
    $('#uniform-check_all span').attr('class', '');
    $('#check_all').attr('checked', false);    
}

function simpanData(){
    var item_check = 0;
    $('input').each(function(i){
        if($('#check_'+i).prop("checked")){
            item_check += 1;
        }
    });
    
    if($.trim($("#no_bpb").val()) == ""){
        $('#message').html("Nomor harus diisi, tidak boleh kososng!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show();
    }else{    
        if(item_check==0){
            $('#message').html("Silahkan pilih item spare part yang diterima!"); 
            $('.alert-danger').show();  
        }else{
            $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
            $('#message').html("");
            $('.alert-danger').hide(); 
            $('#formku').submit(); 
        }
    };
};
</script>
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
});
</script>
      