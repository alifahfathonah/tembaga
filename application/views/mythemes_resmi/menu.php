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
            if($group_id != 9){
                $CI->load->model('Model_modules');
                $akses_menu = $CI->Model_modules->akses_menu($group_id);
                //print_r($akses_menu);
            }
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
                <?php if($group_id==9 || (isset($akses_menu['R_Matching']) && $akses_menu['R_Matching']==1)){ ?>
                <li <?php if ($module_name=="Matching") echo 'class="start active open"'; ?>>
                    <a href="<?php echo base_url(); ?>index.php/R_Matching">
                        <i class="fa fa-chain"></i>
                        <span class="title">MATCHING INVOICE</span>
                    </a>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_Rongsok']) && $akses_menu['R_Rongsok']==1)){ ?>
                <li <?php if ($module_name=="R_Rongsok") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title">KMP Pajak</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/R_Rongsok/po_list">
                            <i class="fa fa-file-word-o"></i>
                            PO List </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/R_Rongsok/matching">
                            <i class="fa fa-chain"></i>
                            Matching PO - DTR</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/R_Rongsok">
                            <i class="fa fa-trash"></i>
                                <span class="title">DTR List</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/R_Rongsok/ttr_list">
                            <i class="fa fa-trash"></i>
                                <span class="title">TTR List</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/R_Rongsok/ambil_packing">
                            <i class="fa fa-level-up"></i>
                                <span class="title">Pindah Packing</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_SuratJalan']) && $akses_menu['R_SuratJalan']==1)){ ?>
                <!-- <li <?php if ($module_name=="SuratJalan") echo 'class="start active open"'; ?>>
                    <a href="<?php echo base_url(); ?>index.php/R_SuratJalan">
                        <i class="fa fa-truck"></i>
                        <span class="title">SURAT JALAN</span>
                    </a>
                </li> -->
                <li <?php if ($module_name=="SuratJalan") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                        <i class="fa fa-truck"></i>
                        <span class="title">SURAT JALAN</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/R_SuratJalan">
                            <i class="fa fa-file-word-o"></i>
                            Rongsok </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/R_SuratJalan/fg">
                            <i class="fa fa-file-word-o"></i>
                            FG </a>
                        </li>
                    </ul>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_BPB']) && $akses_menu['R_BPB']==1)){ ?>
                <li <?php if ($module_name=="BPB") echo 'class="start active open"'; ?>>
                    <a href="<?php echo base_url(); ?>index.php/R_BPB">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">BPB</span>
                    </a>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_TollingResmi']) && $akses_menu['R_TollingResmi']==1)){ ?>
                <li <?php if ($module_name=="TollingResmi") echo 'class="start active open"'; ?>>
                    <a href="<?php echo base_url(); ?>index.php/R_TollingResmi">
                        <i class="fa fa-truck"></i>
                        <span class="title">TOLLING TITIPAN</span>
                    </a>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_PurchaseOrder']) && $akses_menu['R_PurchaseOrder']==1)){ ?>
                <li <?php if ($module_name=="PurchaseOrder") echo 'class="start active open"'; ?>>
                    <a href="<?php echo base_url(); ?>index.php/R_PurchaseOrder">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">PURCHASE ORDER</span>
                    </a>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_SO']) && $akses_menu['R_SO']==1)){ ?>
                <li <?php if ($module_name=="SO") echo 'class="start active open"'; ?>>
                    <a href="<?php echo base_url(); ?>index.php/R_SO">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">SALES ORDER</span>
                    </a>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_InvoiceJasa']) && $akses_menu['R_InvoiceJasa']==1)){ ?>
                <li <?php if ($module_name=="InvoiceJasa") echo 'class="start active open"'; ?>>
                    <a href="<?php echo base_url(); ?>index.php/R_InvoiceJasa">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">INVOICE JASA</span>
                    </a>
                </li>
                <?php } if($group_id==9 || (isset($akses_menu['R_Sinkronisasi']) && $akses_menu['R_Sinkronisasi']==1)){ ?>
                <li <?php if ($module_name=="R_Sinkronisasi") echo 'class="start active open"'; ?>>
                    <a href="javascript:;">
                        <i class="fa fa-refresh"></i>
                        <span class="title">SINKRONISASI</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        <i class="fa fa-refresh"></i>
                        <span class="title">Sync Intern</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Sinkronisasi/finance_sync">
                                <i class="fa fa-money"></i>
                                Sync SO </a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url(); ?>index.php/R_SuratJalan/fg">
                                <i class="fa fa-file-word-o"></i>
                                FG </a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="fa fa-refresh"></i>
                        <span class="title">Sync CV</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= base_url() ?>index.php/R_Sinkronisasi">
                                    <i class="fa fa-refresh"></i>
                                    <span class="title">Sync SO</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>index.php/R_Sinkronisasi/tolling_sync">
                                    <i class="fa fa-refresh"></i>
                                    <span class="title">Sync Tolling</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="fa fa-refresh"></i>
                        <span class="title">Sync CV Individual</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= base_url() ?>index.php/R_Sync_Individual/PO">
                                    <i class="fa fa-refresh"></i>
                                    <span class="title">Sync PO</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    </ul>
                <?php } if($group_id==9 || $group_id==14){ ?>
                <li <?php if($module_name=="MNumberings" || $module_name=="Apolo"
                        || $module_name=="MProvinces" || $module_name=="MCities" 
                        || $module_name=="Customer" || $module_name=="CustomerCV" || $module_name=="Supplier" 
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
                        <?php if($group_id==9){ ?>
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
                        <?php } ?>
                        <?php if($group_id==9 || $group_id == 14){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/CustomerCV">
                            <i class="fa fa-user"></i>
                            Data Customer CV </a>
                        </li>
                        <?php } ?>
                        <?php if($group_id==9){ ?>
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
                        <?php } ?>
                        
                    </ul>
                </li>
                <?php } ?>
                <?php if($group_id==9){ ?>
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
                <?php } ?>
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
            
            