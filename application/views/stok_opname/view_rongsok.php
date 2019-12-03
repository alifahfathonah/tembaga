<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Stok Opname 
            <!-- <i class="fa fa-angle-right"></i>
            <a href="<?php echo base_url('index.php/StokOpname/'); ?>"> Scan FG</a> -->
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/StokOpname/update'); ?>">  
              <input type="hidden" name="id" id="id" value="<?= $header['id'] ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d', strtotime($header['tanggal'])); ?>" readonly>
                        </div>
                    </div>
                </div>             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <tr>
                                    <th style="width:40px" rowspan="2">No</th>
                                    <th rowspan="2">Kode</th>
                                    <th rowspan="2">Nama Item</th>
                                    <th rowspan="2">No. Palette</th>
                                    <th rowspan="2">UOM</th>
                                    <th rowspan="2">Tanggal Masuk</th>
                                    <th colspan="3" style="border-bottom: 1px solid lightgrey;">Berat</th>
                                    <th rowspan="2">Keterangan</th>
                                </tr>
                                <tr>
                                    <th>Bruto</th>
                                    <th>Palette</th>
                                    <th>Netto</th>
                                </tr>
                            </thead>
                            <tbody id="boxDetail">
                                <!-- <?php 
                                    if($details !== null) { 
                                        $no = 1;
                                        foreach ($details as $detail) {
                                ?>

                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $detail->kode_rongsok ?></td>
                                    <td><?= $detail->nama_item ?></td>
                                    <td><?= $detail->no_packing ?></td>
                                    <td><?= $detail->uom ?></td>
                                    <td><?= date('d-m-Y', strtotime($detail->tanggal_masuk)) ?></td>
                                    <td align="right"><?= number_format($detail->bruto,2,'.',',') ?></td>
                                    <td align="right"><?= number_format($detail->berat_palette,2,'.',',') ?></td>
                                    <td align="right"><?= number_format($detail->netto,2,'.',',') ?></td>
                                    <td><?= $detail->keterangan ?></td>
                                </tr>
                                <?php
                                            $no++;
                                        }
                                    }
                                ?> -->

                                <!-- <tr>
                                    <td><div id="no_tabel_1">1</div></td>
                                    <td><input type="text" id="no_packing_1" name="details[1][no_packing]" class="form-control myline" onchange="get_packing(1);"></td>
                                    <input type="hidden" name="details[1][id_barang]" id="barang_id_1">
                                    <td><input type="text" id="nama_barang_1" name="details[1][nama_barang]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                    </td>
                                    <td><input type="text" id="netto_1" name="details[1][berat]" class="form-control myline" readonly="readonly" /></td>
                                    <td><input type="text" id="keterangan_1" name="details[1][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                    <td style="text-align:center">
                                         <a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
                                 </tr> -->
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/StokOpname/report/rongsok'); ?>" class="btn blue-hoki"> 
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
    function loadDetail(id){
        id = $('#id').val();
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/StokOpname/load_detail_view_rongsok'); ?>',
            data:{
                id: id,
            },
            success:function(result){
                $('#boxDetail').html(result);     
            }
        });
    }

    function hapusDetail(id){
        var r=confirm("Anda yakin menghapus packing ini?");
        if (r==true){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/StokOpname/delete_detail_fg'); ?>",
                data: {
                    id: id,
                },
                cache: false,
                success: function(result) {
                    var res = result['response'];
                    if(res=='success'){
                        loadDetail($("#id").val());
                    }else{
                        // $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                        // $('#message').html("");
                        // $('.alert-danger').hide(); 
                        // $('#formku').submit();
                    }
                }
            });
        }
    }
    function refreshData(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/StokOpname/refreshData'); ?>",
            data: {
                id: $('#id').val(),
            },
            cache: false,
            success: function(result) {
                var res = result['response'];
                if(res=='success'){
                    loadDetail($("#id").val());
                }else{
                    // $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                    // $('#message').html("");
                    // $('.alert-danger').hide(); 
                    // $('#formku').submit();
                }
            }
        });
    }

    $(function(){
        loadDetail($('#id').val());
    });
</script>