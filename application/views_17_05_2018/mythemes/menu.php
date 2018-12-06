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
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/bpb_list">
                                    <i class="fa fa-cubes"></i>
                                    BPB List </a>
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
                            <a href="<?php echo base_url(); ?>index.php/Tolling/produksi_ampas">
                            <i class="fa fa-trash"></i>
                            Produksi Ampas </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Tolling/surat_jalan">
                            <i class="fa fa-truck"></i>
                            Surat Jalan </a>
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
                        </li>
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
                <li>
                    <a href="<?php echo base_url(); ?>index.php/Bobin">
                    <i class="fa fa-bullseye"></i>
                    REGISTRASI BOBIN </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/VoucherCost">
                    <i class="fa fa-usd"></i>
                    VOUCHER COST </a>
                </li>
                <li <?php if($module_name=="MNumberings" 
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
                
                <li class="last ">
                    &nbsp;
                </li>
            </ul>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            
            