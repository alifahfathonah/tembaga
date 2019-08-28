<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Tolling Ke Customer</a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/create_dtbj'); ?>"> Edit Data Timbang Tolling(DTT) </a> 
        </h5>          
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
              id="formku" action="<?php echo base_url('index.php/Tolling/update_dtt_header'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTT <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtt" name="no_dtt" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_dtt'];?>">

                            <input type="hidden" name="id" value="<?php echo $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No Surat Jalan
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" 
                                class="form-control myline" style="margin-bottom:5px"
                                value="<?php echo $header['no_sj'];?>">
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
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks'];?></textarea>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo $header['nama_supplier'];?>" class="form-control myline" style="margin-bottom:5px" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penimbang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang'];?>">
                        </div>
                    </div>
                    <?php if($header['jenis_barang']=='FG'){?>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_packing" name="jenis_packing" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_packing'];?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                        <h3 align="center">Detail</h4>
                    <div class="table-scrollable">
                        <?php if($header['jenis_barang']=='FG'){?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%">Nama Item</th>
                                <th>UOM</th>
                                <th>Bruto (Kg)</th>
                                <th>Berat Bobbin</th>
                                <th>Netto (Kg)</th>
                                <th>No. Packing</th>
                                <th>No. Packing</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                            <?php
                            $no = 1;
                            $bruto = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center;">'.$no.'</td>';
                                echo '<td>'.$row->jenis_barang.'</td>';
                                echo '<td>'.$row->uom.'</td>';
                                echo '<td style="text-align:right;">'.number_format($row->bruto,2,',',',').'</td>';
                                echo '<td style="text-align:right;">'.number_format($row->berat_bobbin,2,',','.').'</td>';
                                echo '<td style="text-align:right;">'.number_format($row->netto,2,',','.').'</td>';
                                echo '<td style="text-align:right;">'.$row->no_bobbin.'</td>';
                                echo '<td>'.$row->no_packing.'</td>';
                                echo '<td style="text-align:right;">'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $netto += $row->netto;
                                $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php }else if($header['jenis_barang'] == 'WIP'){ ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%">Nama Item</th>
                                <th>UOM</th>
                                <th>Qty</th>
                                <th>Berat (Kg)</th>
                                <th></th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $qty = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center;">'.$no.'</td>';
                                echo '<td>'.$row->jenis_barang.'</td>';
                                echo '<td>'.$row->uom.'</td>';
                                echo '<td style="text-align:right;">'.number_format($row->qty,0,',',',').'</td>';
                                echo '<td style="text-align:right;">'.number_format($row->netto,2,',','.').'</td>';
                                echo '<td style="text-align:right;">'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $qty += $row->qty;
                                $netto += $row->netto;
                                $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>

                    <a href="<?php echo base_url('index.php/Tolling/dtt_list'); ?>" class="btn blue-hoki"> 
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
function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show();
    }else{   
        $('#message').html("");
        $('.alert-danger').hide(); 
        $('#formku').submit();
    };
};

function printBarcode(id){
    const fg = $('#jb_id_'+id).val();
    const b = $('#bruto_'+id).val();
    const bp = $('#berat_bobbin_'+id).val();
    const n = $('#netto_'+id).val();
    const np = $('#no_packing_'+id).val();
    console.log(id+' | '+fg+' | '+b+' | '+bp+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/Tolling/print_barcode_dtt?fg='+fg+'&b='+b+'&bp='+bp+'&n='+n+'&np='+np,'_blank');
}
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
});
</script>