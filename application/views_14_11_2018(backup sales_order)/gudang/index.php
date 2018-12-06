<script>
function pilih_data(str) {
    var a = document.getElementById('jenis_barang').value;
    //alert(a);
    if(a == '2'){

        document.getElementById('txtHint').innerHTML="<div class='row'>" + 
        "<div class='col-md-12'> " + 
        "<div class='row'> &nbsp; </div>" + 
        "<div class='row'><div class='col-md-12' >"+
        "<div class='col-md-6' style='margin:auto'>"+
        "<input type='text' id='batang' name='batang'class='form-control myline' style='margin-bottom:5px;' placeholder='Batang'>"+
        "<input type='text' id='spb' name='spb' class='form-control myline' style='margin-bottom:5px;' placeholder='Spb'>"+
        "</div>"+
        "<div class='col-md-6'>"+
        "<input type='text' id='kg' name='kg' class='form-control myline' style='margin-bottom:5px;' placeholder='Kg'>"+
        "<input type='text' id='bpb' name='bpb' class='form-control myline' style='margin-bottom:5px;' placeholder='Bpb'>"+
        ""+
        "</div>"+
        "</div>"+
        "</div></div></div>"+
        "<div class='row'>&nbsp;</div>"+
        "<div class='row'><div class='col-md-2'>&nbsp;</div>"+
        "<div class='col-md-12'>&nbsp; &nbsp; <a href='javascript:;' class='btn green' onclick='simpanData();'><i class='fa fa-floppy-o'></i> Save </a></div>"+
        "</div>";
    } if(a == '3'){

        document.getElementById('txtHint').innerHTML="<div class='row'> "+
        " <div class='col-md-12'><div class='row'> &nbsp; </div>"+
        "<div class='row'><div class='col-md-12' >"+
        "<div class='col-md-6' style='margin:auto'>"+
        "<input type='text' id='roll' name='roll' class='form-control myline' style='margin-bottom:5px;' placeholder='Roll'>"+
        "<input type='text' id='spb' name='spb' class='form-control myline' style='margin-bottom:5px;' placeholder='Spb'>"+
        "</div>"+
        "<div class='col-md-6'>"+
        "<input type='text' id='kg' name='kg' class='form-control myline' style='margin-bottom:5px;' placeholder='Kg'><input type='text' id='bpb' name='bpb' class='form-control myline' style='margin-bottom:5px;' placeholder='Bpb'>"+
        "</div></div><div class='col-md-12' >"+
        "<div class='col-md-6' style='margin:auto'>"+
        "<input type='text' id='susut' name='susut' class='form-control myline' style='margin-bottom:5px;' placeholder='Susut/kg'></div>"+
        "</div></div>"+
        "</div></div>"+
        "<div class='row'>&nbsp;</div>"+
        "<div class='row'><div class='col-md-2'>&nbsp;</div>"+
        "<div class='col-md-12'>&nbsp; &nbsp; <a href='javascript:;' class='btn green' onclick='simpanData();'><i class='fa fa-floppy-o'></i> Save </a></div>"+
        "</div>";

    }if(a == '1' ){
        document.getElementById('txtHint').innerHTML="<div class='row'>"+
        "<div class='col-md-12'>"+
        "<div class='row'> &nbsp; </div>"+
        "<div class='row'>"+ 
        "<div class='col-md-12' >"+
        "<div class='col-md-6' style='margin:auto'>"+
        "<input type='text' id='roll' name='roll' class='form-control myline' style='margin-bottom:5px;' placeholder='Roll'></div>"+
        "<div class='col-md-6'>"+
        "<input type='text' id='kg' name='kg' class='form-control myline' style='margin-bottom:5px;' placeholder='Kg'></div>"+
        "</div>"+
        "<div class='col-md-12' >"+
        "<div class='col-md-6' style='margin:auto'>"+
        "<input type='text' id='keras' name='keras' class='form-control myline' style='margin-bottom:5px;' placeholder='Susut/kg'></div> "+
        "<div class='col-md-6' style='margin:auto'><input type='text' id='bs' name='bs' class='form-control myline' style='margin-bottom:5px;' placeholder='Bs/kg'></div></div> </div></div></div>"+
        "<div class='row'>&nbsp;</div>"+
        "<div class='row'><div class='col-md-2'>&nbsp;</div>"+
        "<div class='col-md-12'>&nbsp; &nbsp; <a href='javascript:;' class='btn green' onclick='simpanData();'><i class='fa fa-floppy-o'></i> Save </a></div></div>";

    }
}
</script>
<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/add_produksi'); ?>"> Gudang WIP </a> 
        </h5>          
    </div>
</div>

   <div class="row">&nbsp;</div>

        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Gudang/save_gudang'); ?>">                            
             <div class="row">
                <div class="col-md-6">


                   <div class="row">
                        <div class="col-md-12">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div> 



                    <div class="row">
                        <div class="col-md-12">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <select  id="jenis_barang" name="no_bpb" 
                                class="form-control myline" style="margin-bottom:5px" onchange="pilih_data(this.value)">
                                <?php 
                                foreach($jenis_barang_list as $jenis_barang){
                                ?>
                                <option value="<?php echo $jenis_barang->id ?>"><?php echo $jenis_barang->jenis_barang ?> </option>
                                <?php } ?>    
                            </select>        

                        </div>
                    </div>

                </div>

                <div id="txtHint"></div>

   </form>




  
   <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i> Gudang WIP 
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Trx</th>
            <th>Hasil Wip ID</th>
            <th>M Jenis Barang Wip ID</th>
            <th>SPb Wip Detail ID</th>
            <th>BPb Wip Detail ID</th>
            <th>Keterangan</th>
             <th>#</th>
       </tr>
     </thead>
     <tbody>
        <?php foreach($gudang as $data) { ?>
        <tr>
            <td><?= $data->id ?></td>
            <td><?= $data->tanggal ?></td>
            <td><?= $data->jenis_trx ?></td>
            <td><?= $data->t_hasil_wip_id ?></td>
            <td><?= $data->m_jenis_brg_wip_id ?></td>
            <td><?= $data->t_spb_wip_detail_id ?></td>
            <td><?= $data->t_bpb_wip_detail_id ?></td>
            <td><?= $data->keterangan ?></td>
            <td> <a href="<?= base_url('index.php/Gudang/send');?>" >Send to Rongsok </a></td>
        </tr>    

    <?php } ?>
    
     </tbody>   
   </table>
</div>
</div>
</div>




<script>
function simpanData(){
  
        $('#formku').submit(); 

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
});
</script>
      