<!-- CONTAINER -->
<div class="page-container">
    <!-- SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- SIDEBAR MENU -->
            <?php
            $module_name = $this->uri->segment(1);
            $action_name = $this->uri->segment(2);
            ?>
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">				
                <li class="sidebar-toggler-wrapper">
                    <!-- SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"></div>
                </li>                
                <li class="sidebar-search-wrapper">
                    <!-- RESPONSIVE QUICK SEARCH FORM -->                        
                    <form class="sidebar-search " action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                        </a>
                        <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                                </span>
                        </div>
                    </form>
                </li>
                
                <li <?php if($module_name=="BeliSparePart" || $module_name=="BeliRongsok" || $module_name=="IngotRendah") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="icon-folder"></i>
                    <span class="title">PEMBELIAN</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li <?php if($module_name=="BeliSparePart") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span class="title">SPARE PART</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart">
                                    <i class="fa fa-send"></i>
                                    Beli Spare Part </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/po_list">
                                    <i class="fa fa-file-word-o"></i>
                                    PO List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/spb_list">
                                    <i class="fa fa-file-word-o"></i>
                                    SPB List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/bpb_list">
                                    <i class="fa fa-cubes"></i>
                                    BPB List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/voucher_list">
                                    <i class="fa fa-usd"></i>
                                    Voucher List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/laporan_list">
                                    <i class="fa fa-usd"></i>
                                    Laporan SP </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/gudang_sparepart">
                                    <i class="fa fa-cubes"></i>
                                    Gudang SP </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if($module_name=="BeliRongsok") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-rocket"></i>
                            <span class="title">RONGSOK</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok">
                                    <i class="fa fa-file-word-o"></i>
                                    PO List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/dtr_list">
                                    <i class="fa fa-file-excel-o"></i>
                                    DTR List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/matching">
                                    <i class="fa fa-chain"></i>
                                    Matching PO - DTR</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/ttr_list">
                                    <i class="fa fa-file-powerpoint-o"></i>
                                    TTR List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/voucher_list">
                                    <i class="fa fa-usd"></i>
                                    Voucher List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/laporan_list">
                                    <i class="fa fa-usd"></i>
                                    Laporan Rongsok </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/gudang_rongsok">
                                    <i class="fa fa-cubes"></i>
                                    Gudang Rongsok </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li <?php if($module_name=="IngotRendah") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-openid"></i>
                            <span class="title">INGOT RENDAH</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/IngotRendah">
                                    <i class="fa fa-file-word-o"></i>
                                    PO List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/IngotRendah/dtr_list">
                                    <i class="fa fa-file-excel-o"></i>
                                    DTR List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/IngotRendah/ttr_list">
                                    <i class="fa fa-file-powerpoint-o"></i>
                                    TTR List </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li <?php if($module_name=="Tolling") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">TOLLING TITIPAN</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Tolling">
                            <i class="fa fa-truck"></i>
                            Sales Order</a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Tolling/dtr_list">
                            <i class="fa fa-file-excel-o"></i>
                            DTR List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Tolling/ttr_list">
                            <i class="fa fa-file-powerpoint-o"></i>
                            TTR List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/Tolling/tolling_fg">
                            <i class="fa fa-trash"></i>
                            Tolling Finish Good
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?php //echo base_url(); ?>index.php/Tolling/produksi_ampas">
                            <i class="fa fa-trash"></i>
                            Produksi Ampas </a>
                        </li> -->
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Tolling/surat_jalan">
                            <i class="fa fa-truck"></i>
                            Surat Jalan </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Tolling/cek_balance">
                            <i class="fa fa-truck"></i>
                            Cek Balance </a>
                        </li>
                    </ul>
                </li>
                <li <?php if($module_name=="Ingot") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">PRODUKSI INGOT</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ingot">
                            <i class="fa fa-flask"></i>
                            Create Produksi</a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ingot/spb_list">
                            <i class="fa fa-file-excel-o"></i>
                            SPB List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ingot/skb_list">
                            <i class="fa fa-file-powerpoint-o"></i>
                            SKB List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ingot/hasil_produksi">
                            <i class="fa fa-fire"></i>
                            Hasil Produksi </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ingot/hasil_produksi2">
                            <i class="fa fa-fire"></i>
                            Hasil Produksi 2 </a>
                        </li>

                    </ul>
                </li>

                <li <?php if(($module_name=="Gudang") || ($module_name=="GudangWIP") || ($module_name=="GudangFG")) echo 'class="start active open"'; ?>>
                    <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span class="title">GUDANG</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                       
                        <li <?php if($module_name=="GudangWIP") echo 'class="start active open"'; ?>>
                        <a href="#">
                        <i class="fa fa-circle"></i>
                        <span class="title">WIP</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/spb_list">
                                <i class="fa fa-file-word-o"></i>
                                SPB WIP </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/bpb_list">
                                <i class="fa fa-file-excel-o"></i>
                                BPB WIP </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP">
                                <i class="fa fa-cubes"></i>
                                Gudang WIP </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/produksi_wip">
                                <i class="fa fa-hourglass"></i>
                                Produksi WIP </a>
                            </li>
                        </ul>
                        </li>

                        <li <?php if($module_name=="GudangFG") echo 'class="start active open"'; ?>>
                        <a href="#">
                        <i class="fa fa-circle"></i>
                        <span class="title">FINISH GOOD</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/produksi_fg">
                                <i class="fa fa-hourglass"></i>
                                Produksi FG </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/spb_list">
                                <i class="fa fa-file-word-o"></i>
                                SPB FG </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/bpb_list">
                                <i class="fa fa-file-excel-o"></i>
                                BPB FG </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/">
                                <i class="fa fa-cubes"></i>
                                Gudang FG </a>
                            </li>
                        </ul>
                        </li>                        
                                                
                         <li>
                            <a href="<?php echo base_url(); ?>index.php/Finishgood">
                            <i class="fa fa-file-word-o"></i>
                            Finish Good </a>
                        </li>

                         <li>
                            <a href="<?php echo base_url(); ?>index.php/Kawatrambut">
                            <i class="fa fa-file-word-o"></i>
                            Kawat Rambut </a>
                        </li>

                       


                    </ul>
                </li>

                <li <?php if($module_name=="PengirimanAmpas") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-jsfiddle"></i>
                    <span class="title">AMPAS</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas">
                            <i class="fa fa-file-word-o"></i>
                            PO List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/dtr_list">
                            <i class="fa fa-file-excel-o"></i>
                            DTR List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/bpb_list">
                                <i class="fa fa-file-text-o"></i>
                                BPB List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>index.php/PengirimanAmpas/gudang_ampas">
                                <i class="fa fa-cubes"></i>
                                Gudang Ampas
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>index.php/PengirimanAmpas/gudang_bs">
                                <i class="fa fa-cubes"></i>
                                Gudang BS
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/surat_jalan">
                            <i class="fa fa-truck"></i>
                            Surat Jalan</a>
                        </li>
                    </ul>
                </li>


                        
                <li <?php if($module_name=="PengirimanSample") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-taxi"></i>
                    <span class="title">PENGIRIMAN SAMPLE</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanSample">
                            <i class="fa fa-file-word-o"></i>
                            Request Sample </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanSample/skb_list">
                            <i class="fa fa-file-excel-o"></i>
                            SKB List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanSample/surat_jalan">
                            <i class="fa fa-truck"></i>
                            Surat Jalan</a>
                        </li>
                    </ul>
                </li>
                    
                
                
                <li <?php if($module_name=="Retur") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-undo"></i>
                    <span class="title">RETUR</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur">
                                <i class="fa fa-file-text-o"></i>
                                Terima Retur
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur/fulfilment_list">
                                <i class="fa fa-cubes"></i>
                                Retur Fulfilment
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur/surat_jalan">
                                <i class="fa fa-truck"></i>
                                Surat Jalan
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur">
                            <i class="fa fa-file-excel-o"></i>
                            DTR List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur/ttr_list">
                            <i class="fa fa-file-text-o"></i>
                            TTR List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur/request_barang_list">
                            <i class="fa fa-file-text-o"></i>
                            Request Barang List </a>
                        </li> -->
                        <!--li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/surat_jalan">
                            <i class="fa fa-truck"></i>
                            Surat Jalan</a>
                        </li-->
                    </ul>
                </li>
                <li <?php if($module_name=="RollingKawatHitam") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-life-ring"></i>
                    <span class="title">ROLLING KAWAT HITAM</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/RollingKawatHitam">
                            <i class="fa fa-file-word-o"></i>
                            Permintaan Barang (SPB) </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/RollingKawatHitam/skb_list">
                            <i class="fa fa-file-powerpoint-o"></i>
                            SKB List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/RollingKawatHitam/hasil_produksi">
                            <i class="fa fa-life-ring"></i>
                            Hasil Produksi </a>
                        </li>
                    </ul>
                </li>
                <li <?php if($module_name=="CuciKawatHitam") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-ge"></i>
                    <span class="title">CUCI KAWAT HITAM</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/CuciKawatHitam">
                            <i class="fa fa-file-word-o"></i>
                            Permintaan Barang (SPB) </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/CuciKawatHitam/skb_list">
                            <i class="fa fa-file-powerpoint-o"></i>
                            SKB List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/CuciKawatHitam/dtr_list">
                            <i class="fa fa-file-text-o"></i>
                            DTR List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/CuciKawatHitam/ttr_list">
                            <i class="fa fa-file"></i>
                            TTR List </a>
                        </li>
                    </ul>
                </li>
 
                <li <?php if($module_name=="GudangBobbin") echo 'class="start active open"'; ?> >
                    <a href="javascript:;">
                    <i class="fa fa-bullseye"></i>
                    <span class="title">GUDANG BOBBIN</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin">
                            <i class="fa fa-bullseye"></i>
                            Bobbin Register </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/spb_list">
                            <i class="fa fa-file-word-o"></i>
                            SPB Bobbin </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/bobbin_request">
                            <i class="fa fa-file-word-o"></i>
                            Bobbin Request </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/bobbin_terima">
                            <i class="fa fa-file-word-o"></i>
                            Bobbin Terima Barang </a>
                        </li>
                    </ul>
                </li>
                <li <?php if($module_name=="SalesOrder") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">SALES ORDER</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/SalesOrder">
                            <i class="fa fa-file-word-o"></i>
                            Sales Order (SO) </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/SalesOrder/spb_list">
                            <i class="fa fa-file-word-o"></i>
                            SPB List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/SalesOrder/surat_jalan">
                            <i class="fa fa-file"></i>
                            Surat Jalan </a>
                        </li>
                    </ul>
                </li>

                <li <?php if($module_name=="Finance") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span class="title">FINANCE</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance">
                            <i class="fa fa-file-word-o"></i>
                            Uang Masuk </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/pembayaran">
                            <i class="fa fa-file-o"></i>
                            Matching Pembayaran </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/invoice">
                            <i class="fa fa-file-word-o"></i>
                            Invoice </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/matching">
                            <i class="fa fa-files-o"></i>
                            Matching Invoice </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/voucher_list">
                            <i class="fa fa-file-excel-o"></i>
                            Voucher List </a>
                        </li>
                    </ul>
                </li>
 
                <li>
                    <a href="<?php echo base_url(); ?>index.php/VoucherCost">
                    <i class="fa fa-usd"></i>
                    <span class="title">VOUCHER COST</span>
                    <span class="arrow"></span>
                    </a>
                </li>
                <li <?php if($module_name=="MNumberings" || $module_name=="Apolo"
                        || $module_name=="MProvinces" || $module_name=="MCities" 
                        || $module_name=="Customer" || $module_name=="Supplier" 
                        || $module_name=="Bank" || $module_name=="Rongsok" 
                        || $module_name=="Sparepart" || $module_name=="JenisBarang" 
                        || $module_name=="Ampas" || $module_name=="TypeKendaraan" 
                        || $module_name=="Kendaraan" || $module_name=="MasterIngotRendah" 
                        || $module_name=="GroupCost" || $module_name=="Cost") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="icon-folder"></i>
                    <span class="title">MASTER</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Supplier">
                            <i class="fa fa-truck"></i>
                            Data Supplier </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Customer">
                            <i class="fa fa-user"></i>
                            Data Customer </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Rongsok">
                            <i class="fa fa-beer"></i>
                            Data Rongsok </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Sparepart">
                            <i class="fa fa-cogs"></i>
                            Data Sparepart </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ampas">
                            <i class="fa fa-trash"></i>
                            Data Ampas </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/MasterIngotRendah">
                            <i class="fa fa-openid"></i>
                            Data Ingot Rendah </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/JenisBarang">
                            <i class="fa fa-rebel"></i>
                            Jenis Barang</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/MNumberings">
                                <i class="fa fa-sort-numeric-asc"></i> Numberings</a>
                        </li>
                        <li <?php if($module_name=="TypeKendaraan" || $module_name=="Kendaraan") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-car"></i> Kendaraan <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">                              
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/TypeKendaraan">
                                        <i class="fa fa-car"></i> Type Kendaraan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Kendaraan">
                                        <i class="fa fa-taxi"></i> Daftar Kendaraan</a>
                                </li>                                
                            </ul>
                        </li>
                        <li <?php if($module_name=="GroupCost" || $module_name=="Cost") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-usd"></i> Cost <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">                              
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/GroupCost">
                                        <i class="fa fa-euro"></i> Group Cost</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Cost">
                                        <i class="fa fa-yen"></i> Master Cost</a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Apolo">
                                <i class="fa fa-bank"></i> Apolo</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Bank">
                                <i class="fa fa-bank"></i> Bank</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/MProvinces">
                                <i class="fa fa-globe"></i> Provinsi</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/MCities">
                                <i class="fa fa-globe"></i> Kota</a>
                        </li>

                          <li>
                            <a href="<?php echo base_url(); ?>index.php/Msumberwip">
                                <i class="fa fa-globe"></i> Sumber WIP </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Mjenisbrgwip">
                                <i class="fa fa-globe"></i> Jenis Barang WIP</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Mmilik">
                                <i class="fa fa-globe"></i> Milik</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Mjenistrx">
                                <i class="fa fa-globe"></i> Jenis Trx</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Spbwip">
                            <i class="fa fa-file-word-o"></i>
                            Spb WIP </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Bpbwip">
                            <i class="fa fa-file-word-o"></i>
                            Bpb WIP </a>
                        </li>


                         <li>
                            <a href="<?php echo base_url(); ?>index.php/Spbfg">
                            <i class="fa fa-file-word-o"></i>
                            Spb FG </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Bpbfg">
                            <i class="fa fa-file-word-o"></i>
                            Bpb FG </a>
                        </li>

                        
                    </ul>
                </li>
                <li <?php if($module_name=="Groups" || $module_name=="Users" || $module_name=="Modules") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title">System and Utility</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Groups">
                            Group Management</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Users">
                            User Management</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Modules">
                            Module Management</a>
                        </li>                                             
                    </ul>
                </li>

                <!--li <?php if($module_name=="SalesOrder") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-ge"></i>
                    <span class="title">APP RESMI</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/ProsesResmi">
                            <i class="fa fa-file-word-o"></i>
                            Create App Resmi</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/ProsesResmi/voucher">
                            <i class="fa fa-file-word-o"></i>
                            Voucher App Resmi</a>
                        </li>

                    

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/ProsesResmi/barcode">
                            <i class="fa fa-file-word-o"></i>
                            Create Barcode Resmi</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/ProsesResmi/surat_jalan">
                            <i class="fa fa-file-word-o"></i>
                            Surat Jalan App Resmi</a>
                        </li>
 
                    </ul>
                </li-->

                 <!--li <?php //if($module_name=="TtrResmi") //echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-ge"></i>
                    <span class="title">TTR RESMI</span>
                    <span class="arrow "></span>
                    </a>
                         <ul class="sub-menu">
                     
                            <li>
                                <a href="<?php //echo base_url(); ?>index.php/ttrresmi">
                                <i class="fa fa-file-word-o"></i>TTR Resmi</a>
                            </li>    

                        </ul> 
                  </li-->

                
                <li class="last ">
                    &nbsp;
                </li>
            </ul>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            
            