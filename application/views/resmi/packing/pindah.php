<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> BPB 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok'); ?>"> BPB FG </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok/ambil_packing'); ?>"> BPB FG List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==16)||($hak_akses['create_lpb']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/R_Rongsok/update_bpb'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">

                            <input type="hidden" id="id" name="id" value="<?=$header['id'];?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="(<?php echo $header['kode'].') '.$header['jenis_barang']; ?>">

                            <input type="hidden" name="id_jenis_barang" value="<?=$header['jenis_barang_id']; ?>">
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
                                    <input type="checkbox" id="check_all" name="check_all" onclick="checkAll()" class="form-control checklist">
                                </th>
                                <th>Ket</th>
                                <th>Nama Item</th>
                                <th>UOM</th>
                                <th>Bruto</th>
                                <th>Berat</th>
                                <th>Netto</th>
                                <th>No Packing</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $total_netto = 0;
                                foreach ($details as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td>';
                                    echo '<input type="checkbox" value="1" id="check_'.$no.'" name="myDetails['.$no.'][check]" 
                                            onclick="check();" class="form-control checklist">';
                                    echo '<input type="hidden" value="'.$row->id.'" id="check_'.$no.'" name="myDetails['.$no.'][id_detail]" class="form-control checklist">';
                                    echo '</td>';
                                    echo '<td>'.(($row->flag_pindah > 0)? '<div style="background-color: red;color: white;"><i class="fa fa-remove"></i></div>' : '<div style="background-color: green;color: white;"><i class="fa fa-check"></i></div>').'</td>';
                                    echo '<td>('.$row->kode.') '.$row->jenis_barang.'</td>';
                                    echo '<td>'.$row->uom.'</td>';          
                                    echo '<td>'.number_format($row->bruto,2,',','.').'</td>';   
                                    echo '<td>'.number_format($row->berat_bobbin,2,',','.').'</td>';  
                                    echo '<td>'.number_format($row->netto,2,',','.').'</td>';
                                    echo '<td>'.$row->no_packing.'</td>';          
                                    echo '</tr>';
                                    $total_netto += $row->netto;
                                    $no++;
                                }
                            ?>
                            </tbody>
                            <tr>
                                <td colspan="6"></td>
                                <td><?=number_format($total_netto,2,',','.');?></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/R_Rongsok/ambil_packing'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>

                    <a href="javascript:;" style="display: none;" class="btn blue pindah" id="btnPindah" onclick="pindahData();"> 
                        <i class="fa fa-floppy-o"></i> Pindah Details </a>
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

function pindahData(){    
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show();
    }else if(confirm('Anda Yakin Barcode ingin di Pindah ?')==true){    
        $('#btnPindah').text('Please Wait ...').prop("onclick", null).off("click");
        $('#message').html("");
        $('.alert-danger').hide(); 
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/R_Rongsok/simpan_pindah_data");
        $('#formku').submit();
    };
};
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
        dateFormat: 'dd-mm-yy'
    }); 

    $(".checklist").click(function() {
      $('.pindah').toggle( $(".checklist:checked").length > 0 );
    });
});
</script>