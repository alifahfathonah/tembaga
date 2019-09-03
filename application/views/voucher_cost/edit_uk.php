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
        <?php if($header['currency']=='IDR'){
            $c = 'Rp. ';
        }else{
            $c = '$ ';
        }?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/VoucherCost/update_uk'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Uang Keluar <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_uk" name="no_uk" class="form-control myline" style="margin-bottom:5px" placeholder="Nomor Uang Keluar..." value="<?=$header['nomor'];?>" onkeyup="this.value = this.value.toUpperCase()">

                            <input type="hidden" name="id" value="<?=$header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo $header['tanggal'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Jatuh Tempo <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_jatuh" name="tgl_jatuh" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo $header['tgl_jatuh_tempo'];?>">
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
                                        echo '<option value="'.$row->id.'" '.(($header['id_bank']==$row->id)? 'selected':'').'>'.$row->kode_bank.' ('.$row->nomor_rekening.')</option>';
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
                            <input type="text" id="nomor_giro" name="nomor_giro" class="form-control myline" value="" placeholder="Nomor Giro..." style="margin-bottom:5px" value="<?=$header['no_giro'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             Currency
                        </div>
                        <div class="col-md-8">
                            <select id="currency" name="currency" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cur(this.value);">
                            <option value="IDR" <?=($header['currency']=='IDR')? 'selected':'';?>>IDR</option>
                            <option value="USD" <?=($header['currency']=='USD')? 'selected':'';?>>USD</option>
                            </select>         
                        </div>
                    </div>
                    <div class="row" id="show_kurs">
                        <div class="col-md-4">
                            Kurs
                        </div>
                        <div class="col-md-8">
                            <input type="number" id="kurs" name="kurs" class="form-control myline" value="<?php echo $header['kurs'];?>" style="margin-bottom:5px">
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
                                <th>Nama Cost</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                            </thead>
                            <tbody id="boxDetail">
                            
                            <?php 
                            $no = 0;
                            $total_vc = 0;
                                foreach ($list_detail as $row){
                                    $no++;
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no; ?></td>
                                <?php 
                                echo '<input type="hidden" name="details['.$no.'][id_detail]" value="'.$row->id.'">'; 
                                if($row->nm_cost==null){
                                    echo '<input type="hidden" name="details['.$no.'][nm_cost]" value="'.$row->nm_cost.'">';
                                    echo '<td>'.$row->nama.'</td>';
                                    echo '<td><input type="text" class="form-control myline" name="details['.$no.'][keterangan]" value="'.$row->keterangan.'"></td>';
                                }else{
                                    echo '<td><input type="text" class="form-control myline" name="details['.$no.'][nm_cost]" value="'.$row->nama.'"></td>';
                                    echo '<td><input type="text" class="form-control myline" name="details['.$no.'][keterangan]" value="'.$row->no_po.$row->keterangan.'"></td>';
                                };?>
                                <td style="text-align:center"><?='<input text="text" id="amount_'.$no.'" class="form-control myline" onkeyup="getComa(this.value, this.id);" name="details['.$no.'][amount]" value="'.number_format($row->amount,2,'.', ',').'">';?></td>
                            <?php
                                $total_vc += $row->amount;
                            }
                            if($header['currency']=='USD'){
                                $convert = $header['kurs']*$total_vc;
                            ?>
                                <td>Rp. <?=number_format($convert,2,',','.');?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>

                    <?php if($this->uri->segment(4)=='KK'){ ?>
                    <a href="<?php echo base_url('index.php/VoucherCost/kas_keluar'); ?>" class="btn blue-hoki">
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php }else{ ?>
                    <a href="<?php echo base_url('index.php/VoucherCost/bank_keluar'); ?>" class="btn blue-hoki">
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php } ?>
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

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($("#no_uk").val() == ""){
        $('#message').html("Supplier harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#bank_id").val()) == ""){
        $('#message').html("Bank Belum Dipilih!");
        $('.alert-danger').show();
    }else{   
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
                var res = result['type'];
                if(res=='duplicate'){
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
    };
};
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
});
</script>