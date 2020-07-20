<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Master 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok/ambil_packing'); ?>"> Data Pindah </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['index']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
    <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
        id="formku">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                Tanggal Filter
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_start" name="tgl_start" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col-md-1">
                                S/D
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_end" name="tgl_end" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-2">
                                &nbsp; &nbsp; <a href="javascript:;" onclick="filterData()" class="btn green"><i class="fa fa-search-plus"></i> Filter</a>        
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </form>
    </div> 
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Data 
                </div>
                <div class="tools">    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter">
                        <i class="fa fa-search"></i> Filter
                    </a>
                    <!-- <input type="checkbox" id="check_all" name="check_all" onclick="checkAll()" class="form-control"> -->
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. Matching</th>
                    <th>Tanggal</th>
                    <th>Nama Customer</th> 
                    <th>PIC</th> 
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->no_matching; ?></td>
                        <td><?php echo $data->tanggal; ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->pic; ?></td>
                        <td>
                            <?php if($data->status==0){
                                echo '<div style="background-color:darkkhaki; padding:3px">Belum Balance</div>';
                            }else{
                                echo '<div style="background-color:green; padding:3px; color:white;">Balanced</div>';
                            }?>
                        </td>
                        <td><input type="checkbox" class="checklist" id="check_<?=$no;?>" name="tick" value="<?=$data->id;?>"></td>
                    </tr>
                    <?php
                        }
                    ?>                                                                                    
                </tbody>
                </table>
            </div>
        </div>
            <a href="javascript:;" class="btn green pindah display-hide" onclick="update_tick();"> <i class="fa fa-paper-plane"></i> Kirim Data </a>
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
$(function(){
    $("#tgl_start").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });        
    $("#tgl_end").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    }); 

    $(".checklist").click(function() {
      $('.pindah').toggle( $(".checklist:checked").length > 0 );
    });
});

// function checkAll(){
//     if ($('#check_all').prop("checked")) {
//         $('.checklist').each(function(i){
//             console.log($(this).val());
//             $(this).prop('checked', this.checked);
//         });
//     }else{
//         $('.checklist').each(function(i){
//             $('#check_'+i).prop('checked', false);
//         });
//     }   
// }
function update_tick(){
    if(confirm('Anda yakin ingin mengirim data ini?')){
        $('.pindah').prop('disabled', true);
        $('.pindah').text('Please Wait...');
        var data = $('#sample_6').dataTable().$('input[type="checkbox"]').serializeArray();
        $.ajax({
            url: "<?=base_url('index.php/R_Rongsok/kirim_matching_data');?>",
            type: "POST",
            data : {data: data},
            success: function (result){
                if(result['response']=='sukses'){
                    location.reload();
                }else{
                    location.reload();
                }
            }
        });
    }
};

function filterData(){
    if(confirm('Anda yakin menghapus data ini?')){
        var s=$('#tgl_start').val();
        var e=$('#tgl_end').val();
        window.location = '<?=base_url();?>index.php/R_Rongsok/kirim_matching/'+s+'/'+e;
    }
}
</script>