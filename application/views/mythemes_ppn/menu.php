<!-- CONTAINER -->
<div class="page-container">
    <!-- SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- SIDEBAR MENU -->
            <?php
            $module_name = $this->uri->segment(1);
            $action_name = $this->uri->segment(2);
            $group_id    = $this->session->userdata('group_id');
            $CI =& get_instance();
            if($group_id != 1){
                $CI->load->model('Model_modules');
                $akses_menu = $CI->Model_modules->akses_menu($group_id);
                // print_r($akses_menu);
            }
            ?>
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">				
                <li class="sidebar-toggler-wrapper">
                    <!-- SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"></div>
                </li>                
                
                
                <?php if($group_id==1 || (isset($akses_menu['BeliSparePart']) || isset($akses_menu['BeliRongsok']) || isset($akses_menu['BeliFinishGood']) || isset($akses_menu['BeliWIP']))){ ?>
                <li <?php if($module_name=="BeliSparePart" || $module_name=="BeliRongsok" || $module_name=="IngotRendah" || $module_name=="BeliFinishGood" || $module_name=="BeliWIP") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="icon-folder"></i>
                    <span class="title">PEMBELIAN</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <?php if($group_id==1 || (isset($akses_menu['BeliSparePart']) && $akses_menu['BeliSparePart']==1)){ ?>
                        <li <?php if($module_name=="BeliSparePart") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span class="title">SPARE PART</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart">
                                    <i class="fa fa-send"></i>
                                    Beli Spare Part </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['po_list']) && $akses_menu['po_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/po_list">
                                    <i class="fa fa-file-word-o"></i>
                                    PO List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['spb_list']) && $akses_menu['spb_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/spb_list">
                                    <i class="fa fa-file-word-o"></i>
                                    SPB List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['bpb_list']) && $akses_menu['bpb_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/bpb_list">
                                    <i class="fa fa-cubes"></i>
                                    BPB List </a>
                                </li> 
                                <?php } if($group_id==1 || (isset($akses_menu['bpb_list']) && $akses_menu['lpb_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/lpb_list">
                                    <i class="fa fa-usd"></i>
                                    LPB List </a>
                                </li>
                                <?php }  if($group_id==1 || (isset($akses_menu['voucher_list']) && $akses_menu['voucher_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliSparePart/voucher_list">
                                    <i class="fa fa-usd"></i>
                                    Voucher List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['view']) && $akses_menu['view']==1)){ ?>
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
                            <?php } ?>
                            </ul>
                        </li>
                        <?php } if($group_id==1 || (isset($akses_menu['BeliRongsok']) && $akses_menu['BeliRongsok']==1)){ ?>
                        <li <?php if($module_name=="BeliRongsok") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-rocket"></i>
                            <span class="title">RONGSOK</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok">
                                    <i class="fa fa-file-word-o"></i>
                                    PO List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['create_dtr']) && $akses_menu['create_dtr']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/dtr_list">
                                    <i class="fa fa-file-excel-o"></i>
                                    DTR List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['matching']) && $akses_menu['matching']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/matching">
                                    <i class="fa fa-chain"></i>
                                    Matching PO - DTR</a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['ttr_list']) && $akses_menu['ttr_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/ttr_list">
                                    <i class="fa fa-file-powerpoint-o"></i>
                                    TTR List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['voucher_list']) && $akses_menu['voucher_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/voucher_list">
                                    <i class="fa fa-usd"></i>
                                    Voucher List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['view_laporan']) && $akses_menu['view_laporan']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/laporan_list">
                                    <i class="fa fa-briefcase"></i>
                                    Laporan Rongsok </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliRongsok/gudang_rongsok">
                                    <i class="fa fa-cubes"></i>
                                    Gudang Rongsok </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        
                        <!-- <li <?php if($module_name=="IngotRendah") echo 'class="start active open"'; ?>>
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
                        </li> -->
                        <?php if($group_id==1 || (isset($akses_menu['BeliFinishGood']) && $akses_menu['BeliFinishGood']==1)){ ?>
                        <li <?php if($module_name=="BeliFinishGood") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                                <i class="fa fa-cubes"></i>
                                <span class="title">FINISH GOOD</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                            <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliFinishGood">
                                        <i class="fa fa-file-word-o"></i>
                                        PO List
                                    </a>
                                </li>
                            <?php } if($group_id==1 || (isset($akses_menu['dtbj_list']) && $akses_menu['dtbj_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliFinishGood/dtbj_list">
                                        <i class="fa fa-file-text-o"></i>
                                        DTBJ List
                                    </a>
                                </li>
                            <?php } if($group_id==1 || (isset($akses_menu['matching']) && $akses_menu['matching']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliFinishGood/matching">
                                        <i class="fa fa-chain"></i>
                                        Matching PO - DTBJ
                                    </a>
                                </li>
                            <?php } ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliFinishGood/voucher_list">
                                        <i class="fa fa-usd"></i>
                                        Voucher List
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } if($group_id==1 || (isset($akses_menu['BeliWIP']) && $akses_menu['BeliWIP']==1)){ ?>
                        <li <?php if($module_name=="BeliWIP") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                                <i class="fa fa-life-ring"></i>
                                <span class="title">WIP</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliWIP">
                                        <i class="fa fa-file-word-o"></i>
                                        PO List
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliWIP/dtwip_list">
                                        <i class="fa fa-file-text-o"></i>
                                        DTWIP List
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliWIP/matching">
                                        <i class="fa fa-chain"></i>
                                        Matching PO - DTWIP
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/BeliWIP/voucher_list">
                                        <i class="fa fa-usd"></i>
                                        Voucher List
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    </ul>
                </li>
                <?php } if($group_id==1 || (isset($akses_menu['Tolling']) && $akses_menu['Tolling']==1)){ ?>
                <li <?php if($module_name=="Tolling") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">TOLLING TITIPAN</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li <?php if($module_name=="Tolling") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Tolling Dari Customer</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling">
                                    <i class="fa fa-truck"></i>
                                    Sales Order</a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['dtr_list']) && $akses_menu['dtr_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/dtr_list">
                                    <i class="fa fa-file-excel-o"></i>
                                    DTR List </a>
                                </li>
                                <?php } if($group_id==1 || (isset($akses_menu['ttr_list']) && $akses_menu['ttr_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/ttr_list">
                                    <i class="fa fa-file-powerpoint-o"></i>
                                    TTR List </a>
                                </li>
                                <!-- <li>
                                    <a href="<?php //echo base_url(); ?>index.php/Tolling/produksi_ampas">
                                    <i class="fa fa-trash"></i>
                                    Produksi Ampas </a>
                                </li> -->
                            <?php } if($group_id==1 || (isset($akses_menu['surat_jalan']) && $akses_menu['surat_jalan']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/surat_jalan">
                                    <i class="fa fa-truck"></i>
                                    Surat Jalan </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                        <li <?php if($module_name=="Tolling") echo 'class="start active open"'; ?>>
                            <a href="javascript:;">
                            <i class="fa fa-rocket"></i>
                            <span class="title">Tolling Ke Customer</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                            <?php if($group_id==1 || (isset($akses_menu['spb_list']) && $akses_menu['spb_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/spb_list">
                                    <i class="fa fa-file-word-o"></i>
                                    SPB Keluar </a>
                                </li>
                            <?php } if($group_id==1 || (isset($akses_menu['surat_jalan']) && $akses_menu['surat_jalan']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/surat_jalan_keluar">
                                    <i class="fa fa-truck"></i>
                                    Surat Jalan Keluar </a>
                                </li>
                            <?php } if($group_id==1 || (isset($akses_menu['po_list']) && $akses_menu['po_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/po_list">
                                    <i class="fa fa-cubes"></i>
                                    PO List </a>
                                </li>
                            <?php } if($group_id==1 || (isset($akses_menu['dtr_list']) && $akses_menu['dtr_list']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/dtt_list">
                                        <i class="fa fa-book"></i>
                                        DTT LIST
                                    </a>
                                </li>
                            <?php } if($group_id==1 || (isset($akses_menu['matching']) && $akses_menu['matching']==1)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/matching">
                                        <i class="fa fa-file-text-o"></i>
                                        Matching Tolling
                                    </a>
                                </li>
                            <?php } ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Tolling/cek_balance">
                                    <i class="fa fa-truck"></i>
                                    Cek Balance </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php } if($group_id==1 || (isset($akses_menu['Ingot']) && $akses_menu['Ingot']==1)){ ?>
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
                    <?php if($group_id==1 || (isset($akses_menu['spb_list']) && $akses_menu['spb_list']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ingot/spb_list">
                            <i class="fa fa-file-excel-o"></i>
                            SPB List </a>
                        </li>
                    <?php } ?>
                        <!-- <li>
                            <a href="<?php echo base_url(); ?>index.php/Ingot/skb_list">
                            <i class="fa fa-file-powerpoint-o"></i>
                            SKB List </a>
                        </li> -->
                    <?php if($group_id==1 || (isset($akses_menu['hasil_produksi']) && $akses_menu['hasil_produksi']==1)){ ?>
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
                    <?php } ?>
                    </ul>
                </li>
            <?php } if($group_id==1 || ( (isset($akses_menu['GudangWIP'])&&$akses_menu['GudangWIP']==1) || (isset($akses_menu['GudangFG'])&&$akses_menu['GudangFG']==1) ) ){ ?>
                <li <?php if(($module_name=="GudangRongsok") || ($module_name=="GudangWIP") || ($module_name=="GudangFG")) echo 'class="start active open"'; ?>>
                    <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span class="title">GUDANG</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li <?php if($module_name=="GudangRongsok") echo 'class="start active open"'; ?>>
                        <a href="#">
                        <i class="fa fa-circle"></i>
                        <span class="title">RONGSOK</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                        <?php if($group_id==1 || (isset($akses_menu['view_laporan']) && $akses_menu['view_laporan']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangRongsok/index">
                                <i class="fa fa-search"></i>
                                Laporan Rongsok </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangRongsok/laporan_list">
                                <i class="fa fa-briefcase"></i>
                                Laporan Rongsok Bulanan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangRongsok/gudang_rongsok">
                                <i class="fa fa-cubes"></i>
                                Gudang Rongsok </a>
                            </li>
                            <?php } ?>
                        </ul>
                        </li>

                        <li <?php if($module_name=="GudangWIP") echo 'class="start active open"'; ?>>
                        <a href="#">
                        <i class="fa fa-circle"></i>
                        <span class="title">WIP</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                        <?php if($group_id==1 || (isset($akses_menu['spb_list']) && $akses_menu['spb_list']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/spb_list">
                                <i class="fa fa-file-word-o"></i>
                                SPB WIP </a>
                            </li>
                        <?php } if($group_id==1 || (isset($akses_menu['bpb_list']) && $akses_menu['bpb_list']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/bpb_list">
                                <i class="fa fa-file-excel-o"></i>
                                BPB WIP </a>
                            </li>
                        <?php } if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP">
                                <i class="fa fa-cubes"></i>
                                Gudang WIP </a>
                            </li>
                        <?php } if($group_id==1 || (isset($akses_menu['hasil_produksi']) && $akses_menu['hasil_produksi']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/produksi_wip">
                                <i class="fa fa-hourglass"></i>
                                Produksi WIP </a>
                            </li>
                        <?php } if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/laporan_list">
                                <i class="fa fa-briefcase"></i>
                                Laporan WIP </a>
                            </li>
                        <?php } if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangWIP/stok_wip">
                                <i class="fa fa-inbox"></i>
                                Stok WIP </a>
                            </li>
                        <?php } ?>
                        </ul>
                        </li>

                        <li <?php if($module_name=="GudangFG") echo 'class="start active open"'; ?>>
                        <a href="#">
                        <i class="fa fa-circle"></i>
                        <span class="title">FINISH GOOD</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                        <?php if($group_id==1 || (isset($akses_menu['produksi']) && $akses_menu['produksi']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/produksi_fg">
                                <i class="fa fa-hourglass"></i>
                                Produksi FG </a>
                            </li>
                        <?php } ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/spb_list">
                                <i class="fa fa-file-word-o"></i>
                                SPB FG </a>
                            </li>
                        <?php if($group_id==1 || (isset($akses_menu['bpb_list']) && $akses_menu['bpb_list']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/bpb_list">
                                <i class="fa fa-file-excel-o"></i>
                                BPB FG </a>
                            </li>
                        <?php } if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/laporan_list">
                                <i class="fa fa-briefcase"></i>
                                Laporan FG </a>
                            </li>
                        <?php } if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/GudangFG/">
                                <i class="fa fa-cubes"></i>
                                Gudang FG </a>
                            </li>
                        <?php } ?>
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
            <?php } if($group_id==1 || (isset($akses_menu['PengirimanAmpas']) && $akses_menu['PengirimanAmpas']==1)){ ?>
                <li <?php if($module_name=="PengirimanAmpas") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-jsfiddle"></i>
                    <span class="title">AMPAS</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas">
                            <i class="fa fa-file-word-o"></i>
                            PO List </a>
                        </li><!-- 
                        <?php } if($group_id==1 || (isset($akses_menu['dtr_list']) && $akses_menu['dtr_list']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/dtr_list">
                            <i class="fa fa-file-excel-o"></i>
                            DTA List </a>
                        </li> -->
                        <?php } if($group_id==1 || (isset($akses_menu['spb_list']) && $akses_menu['spb_list']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/spb_list">
                                <i class="fa fa-file-text-o"></i>
                                SPB List
                            </a>
                        </li>
                        <?php } if($group_id==1 || (isset($akses_menu['bpb_list']) && $akses_menu['bpb_list']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/bpb_list">
                                <i class="fa fa-file-text-o"></i>
                                BPB List
                            </a>
                        </li>
                        <?php } if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
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
                        <?php } ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/PengirimanAmpas/surat_jalan">
                            <i class="fa fa-truck"></i>
                            Surat Jalan</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>                        
                <!-- <li <?php if($module_name=="PengirimanSample") echo 'class="start active open"'; ?>>
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
                </li> -->
            <?php if($group_id==1 || (isset($akses_menu['Retur']) && $akses_menu['Retur']==1)){ ?>
                <li <?php if($module_name=="Retur") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-undo"></i>
                    <span class="title">RETUR</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                    <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur">
                                <i class="fa fa-file-text-o"></i>
                                Terima Retur
                            </a>
                        </li>
                    <?php } if($group_id==1 || (isset($akses_menu['view_retur']) && $akses_menu['view_retur']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur/fulfilment_list">
                                <i class="fa fa-cubes"></i>
                                Retur Fulfilment
                            </a>
                        </li>
                    <?php } if($group_id==1 || (isset($akses_menu['surat_jalan']) && $akses_menu['surat_jalan']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Retur/surat_jalan">
                                <i class="fa fa-truck"></i>
                                Surat Jalan
                            </a>
                        </li>
                    <?php } ?>
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
            <?php } ?>
                <!-- <li <?php if($module_name=="RollingKawatHitam") echo 'class="start active open"'; ?>>
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
                </li> -->
                <?php if($group_id==1 || (isset($akses_menu['GudangBobbin']) && $akses_menu['GudangBobbin']==1)){ ?>
                <li <?php if($module_name=="GudangBobbin") echo 'class="start active open"'; ?> >
                    <a href="javascript:;">
                    <i class="fa fa-bullseye"></i>
                    <span class="title">GUDANG BOBBIN</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin">
                            <i class="fa fa-bullseye"></i>
                            Bobbin Register </a>
                        </li>
                        <?php } if($group_id==1 || (isset($akses_menu['spb_list']) && $akses_menu['spb_list']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/spb_list">
                            <i class="fa fa-file-word-o"></i>
                            SPB Bobbin </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/bobbin_request">
                            <i class="fa fa-file-word-o"></i>
                            Bobbin Request </a>
                        </li>
                        <?php if($group_id==1 || (isset($akses_menu['add']) && $akses_menu['add']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/bobbin_terima">
                            <i class="fa fa-file-word-o"></i>
                            Bobbin Terima Barang </a>
                        </li>
                    <?php } ?>
                    </ul>
                </li>
            <?php } if($group_id==1 || (isset($akses_menu['SalesOrder']) && $akses_menu['SalesOrder']==1)){ ?>
                <li <?php if($module_name=="SalesOrder") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">SALES ORDER</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <?php if($group_id==1 || (isset($akses_menu['index']) && $akses_menu['index']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/SalesOrder">
                            <i class="fa fa-file-word-o"></i>
                            Sales Order (SO) </a>
                        </li>
                        <?php } if($group_id==1 || (isset($akses_menu['spb_list']) && $akses_menu['spb_list']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/SalesOrder/spb_list">
                            <i class="fa fa-file-word-o"></i>
                            SPB List </a>
                        </li>
                        <?php } if($group_id==1 || (isset($akses_menu['surat_jalan']) && $akses_menu['surat_jalan']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/SalesOrder/surat_jalan">
                            <i class="fa fa-file"></i>
                            Surat Jalan </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } if($group_id==1 || (isset($akses_menu['Finance']) && $akses_menu['Finance']==1)){ ?>
                <li <?php if($module_name=="Finance") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span class="title">FINANCE</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                    <?php if($group_id==1 || (isset($akses_menu['view_um']) && $akses_menu['view_um']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance">
                            <i class="fa fa-file-word-o"></i>
                            Uang Masuk </a>
                        </li>
                    <?php } if($group_id==1 || (isset($akses_menu['matching']) && $akses_menu['matching']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/pembayaran">
                            <i class="fa fa-file-o"></i>
                            Matching Pembayaran </a>
                        </li>
                    <?php } if($group_id==1 || (isset($akses_menu['view_invoice']) && $akses_menu['view_invoice']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/invoice">
                            <i class="fa fa-file-word-o"></i>
                            Invoice </a>
                        </li>
                    <?php } if($group_id==1 || (isset($akses_menu['matching']) && $akses_menu['matching']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/matching">
                            <i class="fa fa-files-o"></i>
                            Matching Invoice </a>
                        </li>
                    <?php } if($group_id==1 || (isset($akses_menu['list_kas']) && $akses_menu['list_kas']==1)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/list_kas">
                            <i class="fa fa-book"></i>
                            List Kas </a>
                        </li>
                    <?php  } if($group_id==1 || (isset($akses_menu['voucher_list']) && $akses_menu['voucher_list']==1)){?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/voucher_list">
                            <i class="fa fa-file-excel-o"></i>
                            Voucher List </a>
                        </li>
                    <?php  } ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Finance/slip_setoran">
                            <i class="fa fa-chain-broken"></i>
                            Slip Setoran </a>
                        </li>
                    </ul>
                </li>
            <?php } if($group_id==1 || (isset($akses_menu['VoucherCost']) && $akses_menu['VoucherCost']==1)){ ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/VoucherCost">
                    <i class="fa fa-usd"></i>
                    <span class="title">VOUCHER COST</span>
                    <span class="arrow"></span>
                    </a>
                </li>
            <?php } ?>
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
            
            