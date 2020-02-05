<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GudangRongsok extends CI_Controller{   
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url("index.php/Login"));
		}
	}
	
	function index(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');        
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;
		$data['judul']     = "Gudang Rongsok";
		$data['content']   = "gudang_rongsok/index";

		$this->load->model('Model_beli_rongsok'); 
		$data['list_rongsok'] = $this->Model_beli_rongsok->show_data_rongsok()->result();

		$this->load->view('layout', $data);  
	}

	function spb_list(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');        
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;

		$data['content']= "ingot/spb_list";
		$this->load->model('Model_ingot');
		$data['list_data'] = $this->Model_ingot->spb_list()->result();

		$this->load->view('layout', $data);
	}

	function filter_spb(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		if($id){
			$group_id    = $this->session->userdata('group_id');        
			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;

			$data['content']= "ingot/spb_list";
			$this->load->model('Model_ingot');
			if($id == 0){
				$data['list_data'] = $this->Model_ingot->spb_list_filter_0()->result();
			}else if($id == 1){
				$data['list_data'] = $this->Model_ingot->spb_list_filter_1()->result();
			}

			$this->load->view('layout', $data);
		}else{
			redirect('index.php/Ingot/spb_list');
		}
	}

	function view_spb(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		if($id){
			$group_id    = $this->session->userdata('group_id');        
			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;

			$data['content']= "ingot/view_spb";

			$this->load->model('Model_ingot');
			$data['myData'] = $this->Model_ingot->show_header_spb($id)->row_array();           
			$data['myDetail'] = $this->Model_ingot->show_detail_spb($id)->result(); 
			$data['detailSPBFulfilment'] = $this->Model_ingot->show_detail_spb_fulfilment_approved($id)->result();
			$data['detailSPB'] = $this->Model_ingot->show_detail_spb_fulfilment($id)->result();
			$data['apolo'] = $this->Model_ingot->show_apolo()->result();
			$this->load->view('layout', $data);   
		}else{
			redirect('index.php/Ingot/spb_list');
		}
	}

	function update_tgl_spb(){
		$user_id  = $this->session->userdata('user_id');
		$tanggal  = date('Y-m-d H:i:s');
		
		$tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
		
		$data = array(
				'tanggal'=> $tgl_input
			);
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('spb', $data);

		$this->session->set_flashdata('flash_msg', 'Data SPB Rongsok berhasil disimpan');
		redirect('index.php/GudangRongsok/view_spb/'.$this->input->post('id'));
	}

	function laporan_list(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		$group_id    = $this->session->userdata('group_id');        
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;

			$data['content']= "gudang_rongsok/laporan_list";
			$this->load->model('Model_beli_rongsok'); 
			//$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
			$data['list'] = $this->Model_beli_rongsok->show_laporan()->result();
			$this->load->view('layout', $data);   
	}

	function proses_inventory(){
		$user_id  = $this->session->userdata('user_id');
		$tanggal  = date('Y-m-d H:i:s');

		$bulan = $_GET['b'];
		$tahun = $_GET['t'];
		$jb = 'RONGSOK';

		$start = $tahun.'-'.$bulan.'-01';
		$end = date("Y-m-t", strtotime($start));

		$this->db->trans_start();
		$this->load->model('Model_beli_rongsok');
		$this->load->model('Model_gudang_fg');

		$before = date('Y-m-d', strtotime('first day of last month', strtotime($start)));
		// echo $before;die();

			$jenis_barang = $this->Model_beli_rongsok->show_data_rongsok()->result();
			$this->db->where(array(
				'tanggal' => $start,
				'jenis_barang' => $jb
			));
			$this->db->delete('inventory');
			$no = 0;
			foreach ($jenis_barang as $key => $value) {
				$stok_before = $this->Model_gudang_fg->inventory_stok_before($jb,$before,$value->id)->row_array();
				$t = 1;
				if(empty($stok_before)){
					$stok_before = $this->Model_beli_rongsok->get_stok_before($start,$value->id)->row_array();
					$t = 2;
				}
				// echo $t;
				$trx = $this->Model_beli_rongsok->show_kartu_stok_inventory($start,$end,$value->id)->row_array();
				if(!empty($stok_before) || !empty($trx)){
					// echo $value->jenis_barang.' | '.$stok_before['netto_masuk'].$stok_before['netto_keluar'].' | ';
					// echo $trx['netto_masuk'].' - '.$trx['netto_keluar'].'<br>';
					if($t==1){
						$stok_awal = $stok_before['stok_akhir'];
					}else{
						$stok_awal = $stok_before['netto_masuk']-$stok_before['netto_keluar'];
					}

					$stok_awal_next_month = $stok_awal + $trx['netto_masuk'] - $trx['netto_keluar'];
					if($stok_awal > 0 || $trx['netto_masuk'] > 0 || $trx['netto_keluar'] > 0){
					// echo $value->jenis_barang.' | '.$stok_awal.' | '.$trx['netto_masuk'].' & '.$trx['netto_keluar'].' | '.$stok_awal_next_month.'<br>';die();
						//stok akhir
						$this->db->insert('inventory', array(
							'jenis_barang'=>$jb,
							'bulan'=>$bulan,
							'tahun'=>$tahun,
							'tanggal'=>$start,
							'jenis_barang_id'=>$value->id,
							'qty'=> 0,
							'stok_awal'=>$stok_awal,
							'netto_masuk'=>((empty($trx['netto_masuk']))? 0: $trx['netto_masuk']),
							'netto_keluar'=>((empty($trx['netto_keluar']))? 0: $trx['netto_keluar']),
							'stok_akhir'=>$stok_awal_next_month,
							'created_at'=>$tanggal,
							'created_by'=>$user_id
						));
					}
				}
			}

		if($this->db->trans_complete()){
			$this->session->set_flashdata('flash_msg', 'Laporan Rongsok berhasil diproses !');
			redirect(base_url('index.php/GudangRongsok/laporan_list'));
		} else {
			$this->session->set_flashdata('flash_msg', 'Laporan Rongsok gagal diproses, silahkan dicoba kembali!');
			redirect(base_url('index.php/GudangRongsok/laporan_list'));
		}
	}

	// function view_laporan(){
	//     $module_name = $this->uri->segment(1);
	//     $id = $this->uri->segment(3);
	//     if($id){
	//         $group_id    = $this->session->userdata('group_id');        
	//         if($group_id != 1){
	//             $this->load->model('Model_modules');
	//             $roles = $this->Model_modules->get_akses($module_name, $group_id);
	//             $data['hak_akses'] = $roles;
	//         }
	//         $data['group_id']  = $group_id;

	//         $items = strval($id);
	//         $tgl=str_split($id,4);
	//         $tahun=$tgl[0];
	//         $bulan=$tgl[1];

	//         $data['tgl'] = array(
	//             'tahun' => $tahun,
	//             'bulan' => $bulan
	//         );

	//         $data['content']= "beli_rongsok/view_laporan";
	//         $this->load->model('Model_beli_rongsok');
	//         $data['detailLaporan'] = $this->Model_beli_rongsok->show_view_laporan($bulan,$tahun)->result();
	//         $this->load->view('layout', $data);   
	//     }else{
	//         redirect('index.php/BeliRongsok/laporan_list');
	//     }
	// }

	function view_laporan(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		if($id){
			$group_id    = $this->session->userdata('group_id');        
			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;

			$data['end'] = date("Y-m-t", strtotime($id));

			$data['content']= "gudang_rongsok/view_laporan";
			$this->load->model('Model_beli_rongsok');
			$data['detailLaporan'] = $this->Model_beli_rongsok->show_view_laporan('RONGSOK',$id)->result();
			$this->load->view('layout', $data);   
		}else{
			redirect('index.php/BeliRongsok/laporan_list');
		}
	}

	function view_detail_laporan(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		$id_barang = $this->uri->segment(4);
		if($id){
			$group_id    = $this->session->userdata('group_id');
			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;

			$items = strval($id);
			$tgl=str_split($id,4);
			$tahun=$tgl[0];
			$bulan=$tgl[1];

			$data['tgl'] = array(
				'tahun' => $tahun,
				'bulan' => $bulan
			);

			$data['content']= "beli_rongsok/view_detail_laporan";
			$this->load->model('Model_beli_rongsok');
			$data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_detail($bulan,$tahun,$id_barang)->result();
			$this->load->view('layout', $data);   
		}else{
			redirect('index.php/BeliRongsok/laporan_list');
		}
	}

	function gudang_rongsok(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');        
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;
		$data['judul']     = "Gudang Rongsok";
		$data['content']   = "beli_rongsok/gudang_rongsok";
		
		$this->load->model('Model_beli_rongsok');
		$data['list_data'] = $this->Model_beli_rongsok->gudang_rongsok_list()->result();
		
		$this->load->view('layout', $data);
	}

	function view_gudang_rongsok(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		$group_id    = $this->session->userdata('group_id');

		if($id){
			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;
			$data['judul']     = "Gudang Rongsok";
			$data['content']   = "beli_rongsok/view_gudang_rongsok";
			
			$this->load->model('Model_beli_rongsok');
			$data['list_data'] = $this->Model_beli_rongsok->view_gudang_rongsok($id)->result();
			
			$this->load->view('layout', $data);
		}else{
			redirect('index.php/BeliRongsok/gudang_rongsok');
		}
	}

	function edit_gudang_rongsok(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');
		$ppn         = $this->session->userdata('user_ppn');
		$id          = $this->uri->segment(3);
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;

		$data['content']= "gudang_rongsok/edit_gudang_rongsok";
		$this->load->model('Model_beli_rongsok');
		$data['detailLaporan'] = $this->Model_beli_rongsok->view_gudang_rongsok($id)->result();

		$this->load->view('layout', $data);
	}

	function update_gudang_rongsok(){
		$user_id  = $this->session->userdata('user_id');
		$tanggal  = date('Y-m-d H:i:s');
		
		$this->db->trans_start();
			
			$myDetails = $this->input->post('myDetails');
			foreach ($myDetails as $row) {
				$this->db->where('id',$row['id']);
				$this->db->update('dtr_detail', array(
					'nomor_seng'=>$row['nomor_seng']
				));
			}

		if($this->db->trans_complete()){
			$this->session->set_flashdata('flash_msg', 'Data Rongsok berhasil disimpan!');
			redirect('index.php/GudangRongsok/edit_gudang_rongsok/'.$this->input->post('rongsok_id'));  
		}else{
			$this->session->set_flashdata('flash_msg', 'Data Rongsok gagal disimpan, silahkan dicoba kembali!');
			redirect('index.php/GudangRongsok/edit_gudang_rongsok/'.$this->input->post('rongsok_id'));  
		}
	}

	function print_gudang_rongsok(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		if($id){
			$group_id    = $this->session->userdata('group_id');        
			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;
			$this->load->helper('tanggal_indo');

			$this->load->model('Model_beli_rongsok');
			$data['rongsok'] = $this->Model_beli_rongsok->show_data_rongsok_detail($id)->row_array();
			$data['detailLaporan'] = $this->Model_beli_rongsok->view_gudang_rongsok($id)->result();
			$this->load->view("gudang_rongsok/print_gudang_rongsok", $data);
		}else{
			redirect('index.php/GudangRongsok/gudang_rongsok');
		}
	}

	function kartu_stok(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');

		$rongsok_id = $_GET['r'];
		$start = date('Y/m/d', strtotime($_GET['ts']));
		$end = date('Y/m/d', strtotime($_GET['te']));

			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;
			$data['judul']     = "Gudang Rongsok";

		$this->load->model('Model_beli_rongsok');
		$data['rongsok'] = $this->Model_beli_rongsok->show_data_rongsok_detail($rongsok_id)->row_array();
		$data['start'] = $start;
		$data['end'] = $end;
		
		$data['stok_before'] = $this->Model_beli_rongsok->get_stok_before($start,$rongsok_id)->row_array();

		if($_GET['bl']==0){
			$data['detailLaporan'] = $this->Model_beli_rongsok->show_kartu_stok($start,$end,$rongsok_id)->result();
			$this->load->view('gudang_rongsok/kartu_stok', $data);
		}else{
			$data['detailLaporan'] = $this->Model_beli_rongsok->show_kartu_stok_palette($start,$end,$rongsok_id)->result();
			$this->load->view('gudang_rongsok/kartu_stok_palette', $data);
		}
	}

	// function print_laporan_bulanan(){
	//     $module_name = $this->uri->segment(1);
	//     $id = $this->uri->segment(3);
	//     if($id){
	//         $group_id    = $this->session->userdata('group_id');        
	//         if($group_id != 1){
	//             $this->load->model('Model_modules');
	//             $roles = $this->Model_modules->get_akses($module_name, $group_id);
	//             $data['hak_akses'] = $roles;
	//         }
	//         $data['group_id']  = $group_id;
	//         $this->load->helper('tanggal_indo');            
	//         $items = strval($id);
	//         $tgl=str_split($id,4);
	//         $tahun=$tgl[0];
	//         $bulan=$tgl[1];

	//         $tgl = $tahun.'/'.$bulan.'/01';
	//         // print_r($tgl); die();
	//         $data['tgl'] = array(
	//             'tahun' => $tahun,
	//             'bulan' => $bulan
	//         );

	//         $this->load->model('Model_beli_rongsok');
	//         $data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_barang($tgl,$bulan,$tahun)->result();
	//         $this->load->view("gudang_rongsok/print_laporan_bulanan", $data);
	//     }else{
	//         redirect('index.php/BeliRongsok/laporan_list');
	//     }
	// }

	function print_laporan_bulanan(){
		$module_name = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		if($id){
			$group_id    = $this->session->userdata('group_id');        
			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;
			$this->load->helper('tanggal_indo');        

			$tgl=explode("-",$id);
			$tahun=$tgl[0];
			$bulan=$tgl[1];

			$tgl = $tahun.'-'.$bulan.'-01';

			$data['tgl'] = array(
				'tahun' => $tahun,
				'bulan' => $bulan
			);

			$this->load->model('Model_beli_rongsok');
			$data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_barang('RONGSOK',$id)->result();
			// print_r($data['detailLaporan']);die();
			$this->load->view("gudang_rongsok/print_laporan_bulanan", $data);
		}else{
			redirect('index.php/GudangRongsok/laporan_list');
		}
	}

	function search_permintaan_gudang(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;
		$data['judul']     = "Gudang Rongsok";
		$data['content']   = "gudang_rongsok/search_permintaan_gudang";

		$this->load->model('Model_beli_rongsok');

		$this->load->view('layout', $data);
	}

	function print_permintaan_gudang(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');

		$this->load->helper('tanggal_indo');
		$start = date('Y/m/d', strtotime($_GET['ts']));
		$end = date('Y/m/d', strtotime($_GET['te']));
		$l = $_GET['l'];

			if($group_id != 1){
				$this->load->model('Model_modules');
				$roles = $this->Model_modules->get_akses($module_name, $group_id);
				$data['hak_akses'] = $roles;
			}
			$data['group_id']  = $group_id;
			$data['judul']     = "Gudang Rongsok";

		$this->load->model('Model_beli_rongsok');
		$data['start'] = $start;
		$data['end'] = $end;

		if($l==0){
			$data['detailLaporan'] = $this->Model_beli_rongsok->permintaan_rongsok_dari_produksi($start,$end,0)->result();//produksi
			$this->load->view('gudang_rongsok/print_permintaan_gudang', $data);
		}elseif($l==1){
			$data['detailLaporan'] = $this->Model_beli_rongsok->permintaan_rongsok_external($start,$end)->result();
			$this->load->view('gudang_rongsok/print_permintaan_external', $data);
		}elseif($l==2){
			$data['detailLaporan'] = $this->Model_beli_rongsok->permintaan_rongsok_dari_produksi($start,$end,1)->result();//tali rolling
			$this->load->view('gudang_rongsok/print_permintaan_gudang', $data);
		}elseif($l==3){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok($start,$end,0)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan', $data);
		}elseif($l==4){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok($start,$end,1)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan', $data);
		}elseif($l==5){
			$data['header'] = 'APOLLO';
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_lain($start,$end,1)->result();//Apollo
			$this->load->view('gudang_rongsok/print_pemasukan_rsk', $data);
		}elseif($l==6){
			$data['header'] = 'ROLLING';
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_lain($start,$end,2)->result();//Rolling
			$this->load->view('gudang_rongsok/print_pemasukan_rsk', $data);
		}elseif($l==7){
			$data['header'] = 'SDM';
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_lain($start,$end,3)->result();//SDM
			$this->load->view('gudang_rongsok/print_pemasukan_rsk', $data);
		}elseif($l==8){
			$data['header'] = 'Lain - Lain';
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_lain($start,$end,4)->result();//SDM
			$this->load->view('gudang_rongsok/print_pemasukan_rsk', $data);
		}elseif($l==9){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_tolling($start,$end,0)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan', $data);
		}elseif($l==10){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_tolling($start,$end,1)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan', $data);
		}elseif($l==11){
			$data['detailLaporan'] = $this->Model_beli_rongsok->permintaan_rongsok($start,$end)->result();//tali rolling
			$this->load->view('gudang_rongsok/print_permintaan_gudang', $data);
		}elseif($l==12){
			$data['header'] = 'Gudang WIP';
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_lain($start,$end,5)->result();//SDM
			$this->load->view('gudang_rongsok/print_pemasukan_rsk', $data);
		}elseif($l==13){
			$data['header'] = 'Gudang FG';
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_lain($start,$end,6)->result();//SDM
			$this->load->view('gudang_rongsok/print_pemasukan_rsk', $data);
		}elseif($l==14){
			$data['header'] = 'SDM';
			$data['detailLaporan'] = $this->Model_beli_rongsok->permintaan_rongsok_sdm($start,$end)->result();//tali rolling
			$this->load->view('gudang_rongsok/print_permintaan_gudang', $data);
		}elseif($l==15){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok2($start,$end,0)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan2', $data);
		}elseif($l==16){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok2($start,$end,1)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan2', $data);
		}elseif($l==17){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_tolling2($start,$end,0)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan2', $data);
		}elseif($l==18){
			$data['detailLaporan'] = $this->Model_beli_rongsok->pemasukan_rongsok_tolling2($start,$end,1)->result();
			$this->load->view('gudang_rongsok/print_laporan_pemasukan2', $data);
		}
	}

	function laporan_bb(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');        
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;
		$data['judul']     = "Laporan Bahan Baku";
		$data['content']   = "gudang_rongsok/laporan_bb";

		$this->load->view('layout', $data);  
	}

	function print_laporan_bb(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');
		$user_id = $this->session->userdata('user_id');
		$tanggal  = $this->uri->segment(3);
		$this->load->helper('tanggal_indo');

			$tgl_arr = explode('-', $tanggal);
			$bulan = $tgl_arr[1];
			$tahun = $tgl_arr[0];
			$jb = 'RONGSOK';

			$start = $tanggal;
			$end = date("Y-m-t", strtotime($start));

			$data['start'] = $start;
			$data['end'] = $end;

		$this->load->model('Model_beli_rongsok');
		$data['detailLaporan'] = $this->Model_beli_rongsok->print_laporan_bb($bulan,$tahun,$start,$end)->result();
		$this->load->view('gudang_rongsok/print_laporan_bb', $data);
	}

	function edit_palette(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');
		$ppn         = $this->session->userdata('user_ppn');
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;

		$data['content']= "gudang_rongsok/edit_palette";
		// $this->load->model('Model_stok_opname');
		// $data['list_data'] = $this->Model_stok_opname->stok_missing()->result();

		$this->load->view('layout', $data);
	}

	function load_palette(){
		$id = $this->input->post('id');
		
		$tabel = "";
		$no    = 0;
		$total_all = 0;
		$netto = 0;
		
		$this->load->model('Model_beli_rongsok');
		$myDetail = $this->Model_beli_rongsok->get_palette($id)->result();
		foreach ($myDetail as $row){
			$no++;
			$tabel .= '<tr>';
			$tabel .= '<td style="text-align:center">'.$no.'</td>';
			$tabel .= '<input type="hidden" name="myDetails['.$no.'][id]" value="'.$row->id.'">';
			$tabel .= '<input type="hidden" id="netto_resmi_'.$no.'" name="myDetails['.$no.'][netto_resmi]" value="'.$row->netto_resmi.'">';
			$tabel .= '<td>'.$row->nama_item.'</td>';
			$tabel .= '<td>'.$row->no_pallete.'</td>';
			$tabel .= '<td><input type="text" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" class="form-control myline" value="'.number_format($row->bruto,2,'.','').'"></td>';
			$tabel .= '<td><input type="text" id="berat_'.$no.'" name="myDetails['.$no.'][berat]" class="form-control myline" value="'.number_format($row->berat_palette,2,'.','').'"></td>';
			$tabel .= '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto(1);"> <i class="fa fa-dashboard"></i> Timbang </a></td>';
			$tabel .= '<td><input type="text" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" class="form-control myline" value="'.number_format($row->netto,2,'.','').'"></td>';
			$tabel .= '<td>'.(($row->netto_resmi > 0)?'Sudah dipakai CV':'Belum dipakai CV').'</td>';
			$tabel .= '<td>'.$row->keterangan.'</td>';
			$tabel .= '<td>'.$row->tanggal_keluar.'</td>';
			$tabel .= '</tr>';
		}

		header('Content-Type: application/json');
		echo json_encode($tabel); 
	}

	function update_palette(){
		$user_id  = $this->session->userdata('user_id');
		$tanggal  = date('Y-m-d H:i:s');
		$tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

		$this->db->trans_start();
		$details = $this->input->post('myDetails');
		// print_r($details);die();
		foreach ($details as $i => $row){
			if($row['netto_resmi']==0){
				if($row['netto']!=''){
					$this->db->where('id', $row['id']);
					$this->db->update('dtr_detail', array(
						'bruto'=>$row['bruto'],
						'berat_palette'=>$row['berat'],
						'netto'=>$row['netto'],
						'modified'=>$tanggal,
						'modified_by'=>$user_id
					));

					$this->db->where('dtr_detail_id', $row['id']);
					$this->db->update('ttr_detail', array(
						'bruto'=> $row['bruto'],
						'netto'=> $row['netto'],
						'modified'=>$tanggal,
						'modified_by'=>$user_id,
					));
				}
			}
		}

		if($this->db->trans_complete()){
			$this->session->set_flashdata('flash_msg', 'Palette berhasil disimpan!');
			redirect(base_url('index.php/GudangRongsok/edit_palette'));
		} else {
			$this->session->set_flashdata('flash_msg', 'Palette gagal disimpan, silahkan dicoba kembali!');
			redirect(base_url('index.php/GudangRongsok/edit_palette'));
		}
	}
	
	function edit_laporan(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');
		$ppn         = $this->session->userdata('user_ppn');
		$id          = $this->uri->segment(3);
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;

		$data['content']= "gudang_rongsok/edit_laporan";
		$this->load->model('Model_beli_rongsok');
		$data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_barang('RONGSOK',$id)->result();

		$this->load->view('layout', $data);
	}

	function update_laporan(){
		$user_id  = $this->session->userdata('user_id');
		$tanggal  = date('Y-m-d H:i:s');
		$tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
		
		$this->db->trans_start();
			
			$myDetails = $this->input->post('myDetails');
			// print_r($myDetails);die();
			foreach ($myDetails as $row) {
				$this->db->where('id',$row['id']);
				$this->db->update('inventory', array(
					'stok_fisik'=>$row['netto'],
					'keterangan'=>$row['keterangan']
				));
			}

		if($this->db->trans_complete()){
			$this->session->set_flashdata('flash_msg', 'Data inventory berhasil disimpan!');
			redirect('index.php/GudangRongsok/edit_laporan/'.$this->input->post('tanggal'));  
		}else{
			$this->session->set_flashdata('flash_msg', 'Data inventory gagal disimpan, silahkan dicoba kembali!');
			redirect('index.php/GudangRongsok/edit_laporan/'.$this->input->post('tanggal'));  
		}
	}

	function laporan_bulanan_palet(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');        
		if($group_id != 1){
			$this->load->model('Model_modules');
			$roles = $this->Model_modules->get_akses($module_name, $group_id);
			$data['hak_akses'] = $roles;
		}
		$data['group_id']  = $group_id;
		$data['judul']     = "Gudang Rongsok";
		$data['content']   = "gudang_rongsok/laporan_bulanan_palet";

		$this->load->model('Model_beli_rongsok'); 
		$data['list_rongsok'] = $this->Model_beli_rongsok->show_data_rongsok()->result();

		$this->load->view('layout', $data);  
	}

	function print_transaksi_rongsok(){
		$module_name = $this->uri->segment(1);
		$group_id    = $this->session->userdata('group_id');
		$user_id = $this->session->userdata('user_id');
		$this->load->helper('tanggal_indo');

			$r = $_GET['r'];
			$bulan = $_GET['b'];
			$tahun = $_GET['t'];
			$tanggal = $tahun.'-'.$bulan.'-01';

			$start = $tanggal;
			$end = date("Y-m-t", strtotime($start));

			$data['start'] = $start;
			$data['end'] = $end;
			// echo $end;die();

		$this->load->model('Model_beli_rongsok');
		if($r==0){
			$data['detailLaporan'] = $this->Model_beli_rongsok->print_transaksi_rongsok($bulan,$tahun,$start,$end,$r)->result();
			$this->load->view('gudang_rongsok/print_transaksi_rongsok', $data);
		}else{
			$data['detailLaporan'] = $this->Model_beli_rongsok->print_transaksi_rongsok($bulan,$tahun,$start,$end,$r)->result();
			$this->load->view('gudang_rongsok/print_transaksi_rongsok', $data);
		}
	}
}