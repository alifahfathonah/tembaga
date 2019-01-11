<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/matching'); ?>"> Matching PO - DTR </a>
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['matching']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="frmDetail" 
                              id="frmDetail">
                            <input type="hidden" id="id_modal" name="id_modal">
                            <div class="row">
                                <div class="col-md-4">
                                    Pilih Invoice <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <select id="invoice_id" name="invoice_id" class="form-control select2me myline"  style="margin-bottom:5px;" onchange="get_data_invoice(this.value);">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Harga<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="harga_invoice" name="harga_invoice" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Pilih Uang Masuk <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <select id="um_id" name="um_id" class="form-control select2me myline"  style="margin-bottom:5px;" onchange="get_data_um(this.value);">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Nominal<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="harga_um" name="harga_um" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Sisa Invoice
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="sisa_invoice" name="sisa_invoice" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Sisa Uang Masuk
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="sisa_um" name="sisa_um" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onclick="saveDetail();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-6">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Invoice
                        </div>
                        <div class="tools">    
                        <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="javascript:;" onclick="input();"> <i class="fa fa-plus"></i> Input Invoice</a>
                        </div>    
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Invoice</th>
                                    <th>Total</th>
                                    <th>Sisa</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_invoice = 0;
                                    $total_sisa = 0;
                                    foreach ($details_invoice as $row){
                                        echo '<tr>';
                                        echo '<td style="text-align:center;">'.$no.'</td>';
                                        echo '<td>'.$row->no_invoice.'</td>';
                                        echo '<td style="text-align:right;">'.number_format($row->total,0,',','.').'</td>';
                                        $sisa = $row->total - $row->sisa_invoice;
                                        echo '<td>'.number_format($sisa,0,',','.').'</td>';
                                        $total_invoice += $row->total;
                                        $total_sisa += $sisa;
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:right;" colspan="2"><strong>Total Harga </strong></td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($total_invoice,0,',','.'); ?></strong>
                                        </td>
                                        <td><strong><?php echo number_format($total_sisa,0,',','.'); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-md-6">                
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Uang Masuk
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis<br>Pembayaran</th>
                                    <th>Bank<br>Pembayaran</th>
                                    <th>Nomor Cek/<br>Rekening</th>
                                    <th>Currency</th> 
                                    <th>Nominal</th>                      
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_nominal = 0;
                                    foreach ($details_um as $row){
                                        echo '<tr>';
                                        echo '<td style="text-align:center;">'.$no.'</td>';
                                        echo '<td>'.$row->jenis_pembayaran.'</td>';
                                        echo '<td>'.$row->bank_pembayaran.'</td>';
                                        echo '<td>'.$row->nomor.'</td>';
                                        echo '<td>'.$row->currency.'</td>';
                                        echo '<td style="text-align:right;">'.number_format($row->nominal,0,',', '.').'</td>';
                                        echo '</tr>';
                                        $total_nominal += $row->nominal;
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:right;" colspan="5"><strong>Total Harga </strong></td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($total_nominal,0,',','.'); ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>                          
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Detail Matching Invoice
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>No. Invoice</th>
                                    <th style="border-right:2px solid #000;">Total Invoice</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Nomor Cek/Rekening</th>
                                    <th>Total Nominal</th>
                                    <th>Sisa Invoice</th>
                                    <th>Sisa UM</th>
                                </thead>
                                <tbody id="boxDetailUm">
                                    <?php
                                        $no = 1;
                                        foreach ($details_matching as $row){
                                            echo '<tr>';
                                            echo '<td style="text-align:center;">'.$no.'</td>';
                                            echo '<td>'.$row->no_invoice.'</td>';
                                            echo '<td style="border-right:2px solid #000;">'.number_format($row->total,0,',', '.').'</td>';
                                            echo '<td>'.$row->jenis_pembayaran.'</td>';
                                            echo '<td>'.$row->nomor.'</td>';
                                            echo '<td style="text-align:right;">'.number_format($row->nominal,0,',', '.').'</td>';
                                            echo '<td style="text-align:right;">'.number_format($row->sisa_invoice,0,',', '.').'</td>';
                                            echo '<td style="text-align:right;">'.number_format($row->sisa_um,0,',', '.').'</td>';
                                            echo '</tr>';
                                            $no++;
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <a href="<?php echo base_url('index.php/Finance/matching'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
            </div>
        </div>
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
function numberWithCommas(x) {
     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function load_invoice(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_invoice_list'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#invoice_id').html(result);
        }
    })
}

function get_data_invoice(id){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_data_invoice'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#harga_invoice').val(numberWithCommas(result['total']-result['sisa_invoice']));
                var myInv = $('#harga_invoice').val();
                var newInv = myInv.replace(/\./g, '');
                var myUm = $('#harga_um').val();
                var newUm = myUm.replace(/\./g, '');
                var sisa  = (newInv-newUm);
                if(sisa>0){
                    $('#sisa_invoice').val(numberWithCommas(sisa));
                    $('#sisa_um').val(0);
                }else{
                    var sisa1 = (newUm-newInv);
                    $('#sisa_um').val(numberWithCommas(sisa1));
                    $('#sisa_invoice').val(0);
                }
            }
        });
    }
}

function load_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_um_list'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#um_id').html(result);
        }
    })
}

function get_data_um(id){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_um'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#harga_um').val(numberWithCommas(result['nominal']-result['sisa_um']));
                var myInv = $('#harga_invoice').val();
                var newInv = myInv.replace(/\./g, '');
                var myUm = $('#harga_um').val();
                var newUm = myUm.replace(/\./g, '');
                var sisa  = (newInv-newUm);
                if(sisa>0){
                    $('#sisa_invoice').val(numberWithCommas(sisa));
                    $('#sisa_um').val(0);
                }else{
                    var sisa1 = (newUm-newInv);
                    $('#sisa_um').val(numberWithCommas(sisa1));
                    $('#sisa_invoice').val(0);
                }
            }
        });
    }
}

// function simpan_matching(id){
//     $.ajax({
//         url: "<?php echo base_url('index.php/Finance/simpan_matching'); ?>",
//         type: "POST",
//         data : {dtr_id: id,po_id: $('#po_id').val()},
//         success: function (result){            
//             if(result['type_message']=="sukses"){
//                 alert(result['message']);
//                 location.reload();
//             }else{
//                 alert(result['message']);
//             }
//         }
//     });
// };

function input(){        
    $("#myModal").find('.modal-title').text('Input Matching');
    $("#myModal").modal('show',{backdrop: 'true'});
    $("#id_modal").val(<?php echo $header['id'];?>);
    load_invoice(<?php echo $header['id'];?>);
    load_um(<?php echo $header['id'];?>);
}

function saveDetail(){
    if($.trim($("#harga_invoice").val()) == ""){
        $('#message').html("Invoice harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#harga_um").val()) == ""){
        $('#message').html("Uang Masuk harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#frmDetail').attr("action", "<?php echo base_url(); ?>index.php/Finance/add_matching");
        $('#frmDetail').submit(); 
    }
}
</script>