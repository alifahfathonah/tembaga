<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finance extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');   
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/index";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data($ppn)->result();
        $data['list_customer'] = $this->Model_finance->customer_list()->result();

        $this->load->view('layout', $data);
    }

    function add(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add";
        
        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();
        $this->load->view('layout', $data); 
    }

    function get_replace(){
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $tabel = "";

        $this->load->model('Model_finance');
        $replace_list = $this->Model_finance->replace_list($id, $jenis)->result();

            $tabel .= '<option value="0">Cek Baru</option>';
            foreach ($replace_list as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nomor_cek."</option>";
            }

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_replace_detail(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result = $this->Model_finance->replace_list_detail($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result); 
    }

    function get_no_um(){
        $user_ppn = $this->session->userdata('user_ppn');
        $tgl_inv = date('Y', strtotime($this->input->post('tanggal')));
        $bank_id = $this->input->post('bank_id');

        if(($this->input->post('jenis_id') == 'Cek')||($this->input->post('jenis_id') == 'Cek Mundur')){
            if($user_ppn == 1){
                $num = 'CM-KMP';
            }else{
                $num = 'CM';
            }
        }else{
            if($user_ppn == 1){
                if($this->input->post('bank_id')<=3){
                    $num = 'KM-KMP';
                }else{
                    $num = 'BM-KMP';
                }
            }else{
                if($this->input->post('bank_id')<=3){
                    $num = 'KM';
                }else{
                    $num = 'BM';
                }
            }
        }

        $code = $num.'.'.$tgl_inv.'.'.$this->input->post('id');

        $count = $this->db->query("select count(id) as count from f_uang_masuk where no_uang_masuk ='".$code."'")->row_array();
        if($count['count']>0){
            $data['type'] = 'duplicate';
        }else{
            $data['type'] = 'sukses';
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function save(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_um = date('Y', strtotime($this->input->post('tanggal')));
        $tgl_cek   = date('Y-m-d', strtotime($this->input->post('tanggal_cek')));
        $user_ppn  = $this->session->userdata('user_ppn');
        $tglurut = date('ymd', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        if(($this->input->post('jenis_id') == 'Cek')||($this->input->post('jenis_id') == 'Cek Mundur')){
            $status = 0;
            if($user_ppn == 1){
                $num = 'CM-KMP';
            }else{
                $num = 'CM';
            }$code = $this->Model_m_numberings->getNumbering($num);
        }else{
            $status = 1;
            if($user_ppn == 1){
                if($this->input->post('bank_id')<=3){
                    $num = 'KM-KMP';
                }else{
                    $num = 'BM-KMP';
                }
            }else{
                if($this->input->post('bank_id')<=3){
                    $num = 'KM';
                }else{
                    $num = 'BM';
                }
            }
            $code = $num.'.'.$tgl_um.'.'.$this->input->post('no_uang_masuk');
        }

        // if($user_ppn == 1){
        //     $code = $num.'.'.$tgl_um.'.'.$this->input->post('no_uang_masuk');
        // }else{
        //     $code = $this->Model_m_numberings->getNumbering($num);
        // }
            // $code = $num.'.'.$tgl_um.'.'.$this->input->post('no_uang_masuk');

        $data = array(
            'no_uang_masuk'=> $code,
            'm_customer_id'=> $this->input->post('customer_id'),
            'tanggal'=> $tgl_input,
            'status'=> $status,
            'flag_ppn'=>$user_ppn,
            'jenis_pembayaran'=> $this->input->post('jenis_id'),
            'rekening_tujuan'=> $this->input->post('bank_id'),
            'bank_pembayaran'=> $this->input->post('bank_pengirim'),
            'rekening_pembayaran'=> $this->input->post('rek_pengirim'),
            'nomor_cek'=> $this->input->post('no_cek_pengirim'),
            'currency'=> $this->input->post('currency'),
            'kurs'=> $this->input->post('kurs'),
            'nominal'=> str_replace(',', '', $this->input->post('nominal')),
            'tgl_cair'=> $tgl_cek,
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_uang_masuk', $data);
        $insert_id = $this->db->insert_id();

        if($this->input->post('id_replace') != 0){
            $this->db->where('id', $this->input->post('id_replace'));
            $this->db->update('f_uang_masuk', array(
                            'replace_id'=>$insert_id,
                            'status'=> 8,
            ));
        }

        if(($this->input->post('jenis_id') != 'Cek')||($this->input->post('jenis_id') != 'Cek Mundur')){
            $dataf = array(
                'jenis_trx'=>0,
                'nomor'=> $code,
                'flag_ppn'=> $user_ppn,
                'tanggal'=> $tgl_input,
                'id_bank'=> $this->input->post('bank_id'),
                'id_um'=> $insert_id,
                'currency'=> $this->input->post('currency'),
                'kurs'=> $this->input->post('kurs'),
                'nominal'=> str_replace(',', '', $this->input->post('nominal')),
                'keterangan'=> $this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );
            $this->db->insert('f_kas', $dataf);
            $f_kas_insert_id = $this->db->insert_id();
        }

            if($user_ppn==1){
                $this->load->helper('target_url');

                $this->load->model('Model_beli_rongsok');

                $data_post['fum'] = array_merge($data, array('reff1'=>$insert_id));
                $data_post['f_kas'] = array_merge($dataf, array('reff1'=>$f_kas_insert_id));

                $detail_post = json_encode($data_post);
                // print_r($detail_post);
                // die();

                $ch = curl_init(target_url().'api/FinanceAPI/um');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
            }

        if($this->db->trans_complete()){
            if(($this->input->post('jenis_id') == 'Cek')||($this->input->post('jenis_id') == 'Cek Mundur')){
                redirect('index.php/Finance/cek_masuk');
            }else{
                if($this->input->post('bank_id')<=3){
                    redirect('index.php/Finance');
                }else{
                    redirect('index.php/Finance/bank_masuk');
                }
            }
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function delete_um(){
        $id = $this->uri->segment(3);
        $user_ppn = $this->session->userdata('user_ppn');
        $this->db->trans_start();
        if(!empty($id)){
            $this->db->delete('f_uang_masuk', ['id' => $id]);
            $this->db->delete('f_kas', ['id_um' => $id]);

            if($user_ppn == 1){
                $this->load->helper('target_url');
                $url = target_url().'api/FinanceAPI/um_del/id/'.$id;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                // curl_setopt($ch, CURLOPT_POSTFIELDS, "group=3&group_2=1");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                $response = json_decode($result);
                curl_close($ch);
                // print_r($result);
                // die();
            }
        }

        if ($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data uang masuk berhasil dihapus');
            redirect('index.php/Finance');
        }
    }

    function view_um(){
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

            $data['content']= "finance/view_um";

            $this->load->model('Model_finance');
            $data['myData'] = $this->Model_finance->view_um($id)->row_array();
            if($data['myData']['replace_id'] > 0){
                $data['dataReplace'] = $this->Model_finance->replace_list_detail($data['myData']['replace_id'])->row_array();
            }
            //$data['list_bank'] = $this->Model_finance->bank_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function get_bank(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $barang= $this->Model_finance->get_bank_list($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function get_currency(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $get = $this->Model_finance->get_currency($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($get); 
    }

    function approve_um(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $id = $this->input->post('id');
        
        $this->db->trans_start();
        
        #Update status Uang Masuk
        $this->db->where('id', $id);
        $this->db->update('f_uang_masuk', array(
                        'status'=> 1,
                        'tgl_cair'=> $tgl_input,
                        'approved_at'=> $tanggal,
                        'approved_by'=> $user_id
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Uang Masuk sudah di-approve');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance');
    }

    function update_um(){
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->post('header_id');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal_baru')));
        $tanggal  = date('Y-m-d h:m:s');
        $jenis = $this->input->post('jenis1');

        $this->db->trans_start();
        if($jenis=="Cek Mundur"){
            $data = array(
                'tanggal'=>$tgl_input,
                'nominal'=>str_replace('.', '', $this->input->post('nominal_baru')),
                'status'=>0,
                'bank_pembayaran'=>$this->input->post('nama_bank'),
                'nomor_cek'=>$this->input->post('nomor_cek'),
                'tgl_cair'=>date('Y-m-d', strtotime($this->input->post('tanggal_cek_baru'))),
                'modified_at'=>$tanggal,
                'modified_by'=>$user_id,
                'update_remarks'=>$this->input->post('update_remarks')
            );
        }else if($jenis=="Cek"){
            $data = array(
                'tanggal'=>$tgl_input,
                'nominal'=>str_replace('.', '', $this->input->post('nominal_baru')),
                'status'=>0,
                'nomor_cek'=>$this->input->post('nomor'),
                'modified_at'=>$tanggal,
                'modified_by'=>$user_id,
                'update_remarks'=>$this->input->post('update_remarks')
            );
        }else{
            $data = array(
                'no_uang_masuk'=>$this->input->post('no_um'),
                'keterangan'=>$this->input->post('remarks'),
                'tanggal'=>$tgl_input,
                'nominal'=>str_replace('.', '', $this->input->post('nominal_baru')),
                'rekening_pembayaran'=>$this->input->post('nomor'),
                'modified_at'=>$tanggal,
                'modified_by'=>$user_id,
                'update_remarks'=>$this->input->post('update_remarks')
            );

            $data_f = array(
                'nomor'=> $this->input->post('no_um'),
                'tanggal'=> $tgl_input,
                'keterangan'=> $this->input->post('remarks'),
                'nominal'=>str_replace('.', '', $this->input->post('nominal_baru'))
            );

            $this->db->where('id_um', $id);
            $this->db->update('f_kas', $data_f);
        }
        $this->db->where('id', $id);
        $this->db->update('f_uang_masuk', $data);

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Uang Masuk berhasil di update');
            redirect('index.php/Finance/view_um/'.$id);
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }             
    }

    function reject_um(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $id = $this->input->post('header_id');
        
        $this->load->model('Model_finance');
        $get = $this->Model_finance->get_id_match_by_inv($id)->row_array();

        //Ganti Status F_MATCH
        $this->db->where('id', $get['id_match']);
        $this->db->update('f_match', array( 'status' => 0 ));

        //Delete Uang Masuk pada f_match_detail
        $this->db->where('id_um', $id);
        $this->db->delete('f_match_detail');

        #Update status Uang Masuk
        $data = array(
            'flag_matching'=>0,
            'status'=> 9,
            'reject_at'=> $tanggal,
            'reject_by'=> $user_id,
            'reject_remarks'=> $this->input->post('reject_remarks')
        );

        $this->db->where('id', $id);
            
            if($this->db->update('f_uang_masuk', $data)){
                $this->session->set_flashdata('warning_msg', 'Uang Masuk sudah di Reject');
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance');
    }


    function view_voucher(){
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
            $data['judul']     = "Finance";
            $data['content']   = "finance/view_voucher";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_voucher($id)->row_array();
            $data['list_data'] = $this->Model_finance->show_detail_voucher($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function voucher_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/voucher_list";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->voucher_list($ppn)->result();

        $this->load->view('layout', $data);
    }

    function check_voucher(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/check_voucher";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->check_voucher()->result();

        $this->load->view('layout', $data);
    }

    function check_um(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/check_um";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->check_um()->result();

        $this->load->view('layout', $data);
    }

    function slip_setoran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/slip_setoran";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data_slip_setoran()->result();

        $this->load->view('layout', $data);
    }

    function pembayaran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/pembayaran";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data_pembayaran()->result();

        $this->load->view('layout', $data);
    }

    function add_pembayaran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_pembayaran";
        
        $this->load->model('Model_finance');

        $this->load->view('layout', $data); 
    }

    function save_pembayaran(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $code = 'PMB.'.$tgl_code.'.'.$this->input->post('no_pembayaran');

        $data = array(
            'no_pembayaran'=> $code,
            'tanggal'=> $tgl_input,
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_pembayaran', $data);
        $id_new=$this->db->insert_id();

        if($this->db->trans_complete()){
            redirect(base_url('index.php/Finance/matching_pmb/'.$id_new));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function add_detail_pembayaran(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_detail_pembayaran";

        $this->load->model('Model_finance');
        $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
        $this->load->view('layout', $data); 
    }

    function load_detail_pembayaran(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $total_vc = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail($id)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_voucher.'</td>';
            $tabel .= '<td>'.$row->jenis_voucher.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.number_format($row->amount,0,',','.').'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail_vc('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
            $total_vc += $row->amount;
        }
        $tabel .= '<tr>';
        $tabel .= '<td></td>';
        $tabel .= '<td><a <a href="'.base_url().'index.php/Finance/check_voucher" onclick="window.open(\''.base_url().'index.php/Finance/check_voucher\',\'newwindow\',\'width=1200,height=550\'); return false;" class="btn btn-primary" style="width:100%;">Lihat daftar voucher</a></td>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td><input type="text" id="total_vc" name="total_vc" style="background-color: green; color: white;" class="form-control" data-myvalue="'.$total_vc.'" value="'.number_format($total_vc,0,',','.').'" readonly="readonly"></td>';
        $tabel .= '<tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_vc_list(){ 
        $this->load->model('Model_finance');
        $user_ppn = $this->session->userdata('user_ppn');
        $data = $this->Model_finance->list_data_voucher($user_ppn)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_voucher;
        } 
        print form_dropdown('vc_id', $arr_so);
    }

    function get_um_list_pmb(){ 
        $this->load->model('Model_finance');
        $user_ppn = $this->session->userdata('user_ppn');
        $data = $this->Model_finance->list_data_um($user_ppn)->result();
        $arr_um[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_um[$row->id] = $row->nomor_cek.' ('.$row->no_uang_masuk.')';
        } 
        print form_dropdown('um_id', $arr_um);
    }

    function get_data_voucher(){
        $id = $this->input->post('id');
        $tabel = "";

        $this->load->model('Model_finance');
        $voucher= $this->Model_finance->list_voucher($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($voucher);
    }

    function save_detail_pembayaran(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $tanggal   = date('Y-m-d h:m:s');
        
        $data = array(
            'pembayaran_id'=>$this->input->post('id'),
            'modified'=> $tanggal,
            'modified_by'=> $user_id
        );
        $this->db->where('id', $this->input->post('vc_id'));
        if($this->db->update('voucher', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_pembayaran(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();
        $data = array(
                'pembayaran_id'=>0,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $id);
        if($this->db->update('voucher', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB FG! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function add_detail_um(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_detail_um";

        $this->load->model('Model_finance');
        $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
        $data['myDetail'] = $this->Model_finance->load_detail($id)->result();
        $data['myData'] = $this->Model_finance->load_detail_um($id)->result();

        $this->load->view('layout', $data); 
    }

    function load_detail_um(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $total_um = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail_um($id)->result();

        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_uang_masuk.'</td>';
            $tabel .= '<td>'.$row->jenis_pembayaran.'</td>';
            $tabel .= '<td>'.$row->bank_pembayaran.'</td>';
            $tabel .= '<td>'.$row->rekening_pembayaran.$row->nomor_cek.'</td>';
            $tabel .= '<td>';
                    if($row->status==0){
                        $tabel .= '<div style="background-color:darkkhaki; padding:3px">Belum Cair</div>';
                    }else if($row->status==1){
                        $tabel .= '<div style="background-color:green; padding:3px; color:white">Sudah Cair</div>';
                    }else if($row->status==2){
                        $tabel .= '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                    }else if($row->status==9){
                        $tabel .= '<div style="background-color:red; color:#fff; padding:3px">Gagal Cair</div>';
                    }else if($row->status==8){
                        $tabel .= '<div style="background-color:orange; color:#fff; padding:3px">Sudah Diganti</div>';
                        $tabel .= '<input type="hidden" id="tag" value="1">';
                    }
            $tabel .= '</td>';
            $tabel .= '<td>'.$row->currency.' '.number_format($row->nominal,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail_um('.$row->id.');"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
            $total_um += $row->nominal;
        }$tabel .= '<tr>';
        $tabel .= '<td></td>';
        $tabel .= '<td><a <a href="'.base_url().'index.php/Finance/check_um" onclick="window.open(\''.base_url().'index.php/Finance/check_um\',\'newwindow\',\'width=1200,height=550\'); return false;" class="btn btn-primary" style="width:100%;">Lihat daftar Uang Masuk</a></td>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td><input type="text" id="total_um" name="total_um" style="background-color: green; color: white;" class="form-control" data-myvalue="'.$total_um.'" value="'.number_format($total_um,0,',','.').'" readonly="readonly"></td>';
        $tabel .= '<td></td>';
        $tabel .= '<tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_data_um(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $um= $this->Model_finance->get_data_um($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($um);
    }

    function save_detail_um(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $this->db->trans_start();
        if($this->input->post('um_id')!=0){
            $data = array(
                'id_pembayaran'=>$this->input->post('id'),
                'um_id'=>$this->input->post('um_id')
            );
            $this->db->insert('f_pembayaran_detail', $data);
        }else{
            echo 'die';
        }
        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_um(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();

        $this->db->where('id', $id);
        if($this->db->delete('f_pembayaran_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB FG! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function load_detail_uk(){
        $id = $this->input->post('id');
        $user_ppn = $this->session->userdata('user_ppn');
        
        $tabel = "";
        $total_uk = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail_uk($id)->result();
        $bank_list = $this->Model_finance->bank_list($user_ppn)->result();

        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nomor.'</td>';
            $tabel .= '<td><label id="lbl_bank_id_'.$no.'">'.$row->nama_bank.'</label>';
            $tabel .= '<select id="bank_id_'.$no.'" name="bank_id_'.$no.'" class="form-control select2me myline" ';
                $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px; display:none" onchange="get_currency_a(this.value, '.$no.');">';
                $tabel .= '<option value=""></option>';
                $tabel .= '<option value="0">Kas</option>';
                foreach ($bank_list as $value){
                    $tabel .= "<option value='".$value->id."' ".(($value->id==$row->id_bank)? "selected='selected'": "").">".$value->nama_bank."</option>";
                }
                $tabel .= '</select>';
                $tabel .= '<input type="hidden" id="detail_id_'.$no.'" name="detail_id_'.$no.'" value="'.$row->id.'">';
            $tabel .= '<td><label id="lbl_no_giro_'.$no.'">'.$row->no_giro.'</label>';
            $tabel .= '<input type="text" id="no_giro_'.$no.'" name="no_giro_'.$no.'" class="form-control myline" '
                    . 'value="'.$row->no_giro.'" style="display:none">';
            $tabel .= '<td><label id="lbl_currency_'.$no.'">'.$row->currency.'</label>';
            $tabel .= '<input type="text" id="currency_'.$no.'" name="currency_'.$no.'" class="form-control myline" readonly="readonly" '
                    . 'value="'.$row->currency.'" style="display:none">';
            $tabel .= '<td><label id="lbl_nominal_'.$no.'">'.number_format($row->nominal,0,',','.').'</label>';
            $tabel .= '<input type="text" id="nominal_'.$no.'" name="nominal_'.$no.'" class="form-control myline"'
                    . 'value="'.$row->nominal.'" style="display:none" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);">';
            $tabel .= '<td style="text-align:center">';
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green" onclick="editDetail('.$no.');" style="margin-top:5px" id="btnEdit_'.$no.'"> '
                    . '<i class="fa fa-edit"></i> Edit &nbsp; </a>';
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle red" onclick="delete_uk('.$row->id.');" style="margin-top:5px;" id="btnDeleteUK_'.$no.'"> <i class="fa fa-trash"></i> Delete </a>';
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green-seagreen" onclick="updateDetail('.$no.');" style="margin-top:5px; display:none" id="btnUpdate_'.$no.'"> '
                    . '<i class="fa fa-floppy-o"></i> Update </a></td>';
            $tabel .= '</tr>';
            $no++;
            $total_uk += $row->nominal;
        }
        $tabel .= '<td colspan="5" style="text-align:right;"><strong>Total</strong></td>';
        $tabel .= '<td><input type="text" id="total_uk" name="total_uk" style="background-color: green; color: white;" class="form-control" data-myvalue="'.$total_uk.'" value="'.number_format($total_uk,0,',','.').'" readonly="readonly"></td>';
        $tabel .= '<td></td>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function update_detail_uk(){
        $return_data = array();
        
        $this->db->where('id', $this->input->post('detail_id'));
        if($this->db->update('f_kas', array(
            'id_bank'=>$this->input->post('bank_id'),
            'no_giro'=>$this->input->post('no_giro'),
            'currency'=>$this->input->post('currency'),
            'nominal'=>str_replace('.', '', $this->input->post('nominal')),
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal mengupdate item spare part! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_uk(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();
        $this->db->trans_start();
        $data = array(
                'pembayaran_id'=>0,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $id);
        $this->db->delete('f_kas');
        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB FG! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function save_detail_uk(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $tgl_code = date('Y', strtotime($this->input->post('tanggal')));
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        
        if($this->input->post('bank_id')<=3){
            if($user_ppn==1){
                $num = 'KK-KMP';
            }else{
                $num = 'KK';
            }
        }else{
            if($user_ppn==1){
                $num = 'BK-KMP';
            }else{
                $num = 'BK';
            }
        }

        // $this->load->model('Model_m_numberings');
        // $code_um = $this->Model_m_numberings->getNumbering($num);
        $code_um = $num.'.'.$tgl_code.'.'.$this->input->post('no_uk');

        $data = array(
                    'jenis_trx'=>1,
                    'nomor'=>$code_um,
                    'flag_ppn'=> $user_ppn,
                    'tanggal'=>$tgl_input,
                    'no_giro'=>$this->input->post('nomor_giro'),
                    'id_bank'=>$this->input->post('bank_id'),
                    'id_vc'=>0,
                    'id_matching'=>$this->input->post('id'),
                    'currency'=>$this->input->post('currency'),
                    'nominal'=>str_replace('.', '', $this->input->post('nominal')),
                    'created_at'=>$tgl_input,
                    'created_by'=>$user_id
                );

        if($this->db->insert('f_kas', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function approveagain(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
            'tanggal'=>$tgl_input,
            'status'=>0,
            'keterangan'=>$this->input->post('remarks'),
            'modified_at'=>$tanggal,
            'modified_by'=>$user_id
        );
        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('f_pembayaran', $data)){
            redirect(base_url('index.php/Finance/pembayaran'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        } 
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function save_pmb(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
            'no_pembayaran'=>$this->input->post('no_pmb'),
            'tanggal'=>$tgl_input,
            'keterangan'=>$this->input->post('remarks'),
            'modified_at'=>$tanggal,
            'modified_by'=>$user_id
        );
        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('f_pembayaran', $data)){
            redirect(base_url('index.php/Finance/pembayaran'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        } 
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_pmb(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->where('id', $this->uri->segment(3));
        if($this->db->delete('f_pembayaran')){
            redirect(base_url('index.php/Finance/pembayaran'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }
    }

    function matching_pmb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $user_ppn = $this->session->userdata('user_ppn');
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Finance";
            $data['content']   = "finance/matching_pmb";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
            $data['bank_list'] = $this->Model_finance->bank_list($user_ppn)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function view_pmb(){
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
            $data['judul']     = "Finance";
            $data['content']   = "finance/view_pmb";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
            if($data['header']['status']==9){
            $data['detailVC'] = $this->Model_finance->load_detail_reject($id)->result();
            }else{
            $data['detailVC'] = $this->Model_finance->load_detail($id)->result();
            }
            $data['detailUM'] = $this->Model_finance->load_detail_um($id)->result();
            $data['detailUK'] = $this->Model_finance->load_detail_uk($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function jalankan_pmb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d');
        $id = $this->input->post('id');
        
        $this->db->trans_start();

        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>2,
            'tanggal_jalan'=>$tanggal
        ));
        
        if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Pembayaran sudah di-approve. Detail Pembayaran sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat menjalankan pembayaran, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance/pembayaran');
    }

    function approve_pmb(){
        $user_id = $this->session->userdata('user_id');
        $tanggal = date('Y-m-d');
        $tanggal_input = date('Y-m-d h:m:s');

        $this->db->trans_start();
        
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $loop_vc = $this->Model_finance->load_detail($id)->result();
        $loop_um = $this->Model_finance->load_detail_um($id)->result();

        //Insert ke tabel Pembayaran Detail
        foreach ($loop_vc as $row) {
            $data = array(
            'id_pembayaran'=> $id,
            'voucher_id'=> $row->id,
            'um_id'=> 0
            );
            $this->db->insert('f_pembayaran_detail', $data);   
        }

        //Update Status UM sudah Cair
        foreach ($loop_um as $row) {
            $data = array(
                'status'=>1,
                'tgl_cair'=>$tanggal,
                'approved_at'=>$tanggal_input,
                'approved_by'=>$user_id
            );
            $this->db->where('id', $row->um_id);
            $this->db->update('f_uang_masuk', $data);   
        }

        //Update Status Pembayaran jadi Approve
        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>1,
            'approved_at'=>$tanggal,
            'approved_by'=>$user_id
        ));

        //Buat Slip Setoran
        if($this->input->post('nominal_slip')!=0){
            $this->db->insert('f_slip_setoran', array(
                'id_pembayaran'=>$id,
                'nominal'=>$this->input->post('nominal_slip'),
                'created_at'=>$tanggal,
                'created_by'=>$user_id
            ));
        }

        // Update Status Voucher
        $this->db->where('pembayaran_id', $id);
        $this->db->update('voucher', array(
            'status' => 1
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Pembayaran sudah di-approve. Detail Pembayaran sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance/pembayaran');
    }

    function reject_pmb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $id = $this->input->post('header_id');

        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>3,
            'tanggal_jalan'=>'0000-00-00',
            'reject_remarks'=>$this->input->post('reject_remarks')
        ));

        $this->session->set_flashdata('flash_msg', 'Data Pembayaran berhasil direject');
        redirect('index.php/Finance/pembayaran');
    }

    function reject_all_pmb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $id = $this->input->post('header_id');

        $this->load->model('Model_finance');
        $loop_vc = $this->Model_finance->load_detail($id)->result();

        //INSERT VOUCHER
        foreach ($loop_vc as $row) {
            $data = array(
            'id_pembayaran'=> $id,
            'voucher_id'=> $row->id,
            'um_id'=> 0
            );
            $this->db->insert('f_pembayaran_detail', $data);   
        }

        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>9,
            'reject_at'=>$tanggal,
            'reject_by'=>$user_id,
            'reject_remarks'=>$this->input->post('reject_remarks')
        ));

        //MERUBAH VOUCHER MENJADI DEFAULT LAGI
        $this->db->where('pembayaran_id', $id);
        $this->db->update('voucher', array(
            'pembayaran_id'=>0
        ));
        
        $this->session->set_flashdata('flash_msg', 'Semua Data Pembayaran berhasil direject');
        redirect('index.php/Finance/pembayaran');
    }

    function invoice(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/invoice";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_invoice($ppn)->result();

        $this->load->view('layout', $data);
    }

    function add_invoice(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['ppn'] = $this->session->userdata('user_ppn');
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_invoice";
        
        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list($data['ppn'])->result();
        $this->load->view('layout', $data); 
    }

    function load_detail_sj(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 0;
        $total_all = 0;
        $netto = 0;
        
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail_invoice($id)->result();
        // $myDetail = $this->Model_finance->show_detail_sj($id)->result(); 
        foreach ($myDetail as $row){
            $no++;
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->qty.'</td>';
            $tabel .= '<td>'.number_format($row->netto,2,',','.').' '.$row->uom.'</td>';
            $tabel .= '<td>'.number_format($row->amount,2,',','.').'</td>';
            $total_amount = $row->netto * $row->amount;
            $tabel .= '<td>'.number_format($total_amount,2,',','.').'</td>';
            $tabel .= '</tr>';
            $total_all += $total_amount;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total_all,0,',','.').'</strong></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_flag(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_flag($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_tgl_sj(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_tgl_sj($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_currency_so(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_currency_so($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_so_list(){ 
        $id = $this->input->post('id');
        $ppn = $this->input->post('ppn');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_so_list($id,$ppn)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_po.' ('.$row->no_sales_order.')';
        } 
        print form_dropdown('sales_order_id', $arr_so);
    }

    function get_sj_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_sj_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_surat_jalan;
        } 
        print form_dropdown('surat_jalan_id', $arr_so);
    }

    function get_no_invoice(){
        $tgl_inv = date('Ym', strtotime($this->input->post('tanggal')));
        $code = 'INV-KMP.'.$tgl_inv.'.'.$this->input->post('id');

        $count = $this->db->query("select count(id) as count from f_invoice where no_invoice ='".$code."'")->row_array();
        if($count['count']>0){
            $data['type'] = 'duplicate';
        }else{
            $data['type'] = 'sukses';
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function save_invoice(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_inv = date('Ym', strtotime($this->input->post('tanggal')));
        $ppn       = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        if($ppn == 1){
            $code = 'INV-KMP.'.$tgl_inv.'.'.$this->input->post('no_pembayaran');
        }else{
            $code = 'INV.'.$tgl_inv.'.'.$this->input->post('no_pembayaran');
        }

        $id_so = $this->input->post('sales_order_id');
        $id_sj = $this->input->post('surat_jalan_id');

        $data = array(
            'no_invoice'=> $code,
            'flag_ppn'=> $ppn,
            'term_of_payment'=> $this->input->post('term_of_payment'),
            'bank_id'=> $this->input->post('bank_id'),
            'diskon'=> str_replace('.', '', $this->input->post('diskon')),
            'add_cost'=> str_replace('.', '', $this->input->post('add_cost')),
            'materai'=> str_replace('.', '', $this->input->post('materai')),
            'currency'=> $this->input->post('currency'),
            'kurs'=> $this->input->post('kurs'),
            'nama_direktur'=> $this->input->post('nama_direktur'),
            'tanggal'=> $tgl_input,
            'tgl_jatuh_tempo'=> $this->input->post('tanggal_jatuh'),
            'id_customer'=> $this->input->post('m_customer_id'),
            'id_sales_order'=> $id_so,
            'id_surat_jalan'=> $id_sj,
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_invoice', $data);
        $id_new=$this->db->insert_id();

        $this->db->where('id', $id_sj);
        $this->db->update('t_surat_jalan', array(
            'inv_id'=> $id_new
        ));

        $this->load->model('Model_finance');
        // if($this->input->post('flag_tolling') == 1){
        //     $loop_detail = $this->Model_finance->load_detail_invoice_tolling($id_sj)->result();
        // }else{
            $loop_detail = $this->Model_finance->load_detail_invoice($id_sj)->result();//sudah group by
        // }

        $nilai_invoice = 0;

        if($ppn == 1){
            $detail_push = [];
        }

        foreach($loop_detail as $k => $row){
            $total = $row->amount * $row->netto;
            $total = round($total,0);
            $fid = array(
                    'id_invoice'=>$id_new,
                    'sj_detail_id'=>$row->t_sj_id,
                    'jenis_barang_id'=>$row->jbid,
                    'qty'=>$row->qty,
                    'netto'=>$row->netto,
                    'harga'=>$row->amount,
                    'total_harga'=>$total,
            );

            $this->db->insert('f_invoice_detail', $fid);
                if($ppn == 1){
                    $fid_id = $this->db->insert_id();
                    $data_id = array('reff1' => $fid_id);
                    $detail_push[$k] = array_merge($fid, $data_id);
                }
            $nilai_invoice += $total;
        }

        if($ppn == 1 && $this->input->post('currency')=='IDR'){
            $total_invoice = ($nilai_invoice-str_replace('.', '', $this->input->post('diskon'))-str_replace('.', '', $this->input->post('add_cost')))*110/100 + str_replace('.', '', $this->input->post('materai'));
        }else{
            $total_invoice = ($nilai_invoice-str_replace('.', '', $this->input->post('diskon'))-str_replace('.', '', $this->input->post('add_cost'))) + str_replace('.', '', $this->input->post('materai'));
        }
        
        $total_invoice = round($total_invoice,0);

        $this->db->where('id',$id_new);
        $this->db->update('f_invoice', array(
            'nilai_invoice' => $total_invoice
        ));

        $cek = $this->Model_finance->get_sj_list($id_so)->result();
        if(empty($cek)){
            $flag_invoice = 1;
        }else{
            $flag_invoice = 2;
        }

            $this->db->where('id',$id_so);
            $this->db->update('sales_order', array(
                'flag_invoice'=>$flag_invoice
            ));

            if($ppn==1){
                $this->load->helper('target_url');


                $this->load->model('Model_beli_rongsok');

                unset($data['nilai_invoice']);
                $data_id = array('reff1' => $id_new, 'nilai_invoice'=> $total_invoice);                
                $data_post['master'] = array_merge($data, $data_id);
                $data_post['detail'] = $detail_push;
                $data_post['flag_invoice'] = $flag_invoice;

                $detail_post = json_encode($data_post);
                // print_r($detail_post);
                // die();

                $ch = curl_init(target_url().'api/FinanceAPI/inv');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
                if($result['status']==true){
                    $this->db->where('id',$id_new);
                    $this->db->update('f_invoice', array('api'=>1));
                }
            }

        if($this->db->trans_complete()){
            redirect(base_url('index.php/Finance/view_invoice/'.$id_new));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function view_invoice(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $ppn = $this->session->userdata('user_ppn');
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Finance";
            $data['content']   = "finance/view_invoice";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_invoice($id)->row_array();
            $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();
            $id_match = $data['header']['flag_matching'];
            if($data['header']['id_retur']==0){
                $data['detailInvoice'] = $this->Model_finance->show_detail_invoice($id)->result();
                $data['matching'] = $this->Model_finance->show_detail_matching_um($id_match)->result();
            }else{
                $data['detailInvoice'] = $this->Model_finance->show_invoice_detail($id)->result();
            }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function delete_invoice(){
        $id = $this->uri->segment(3);
        $user_ppn = $this->session->userdata('user_ppn');
        $this->db->trans_start();
        if(!empty($id)){

            $this->load->model('Model_finance');
            $get = $this->Model_finance->get_inv($id)->row_array();
            $this->db->update('t_surat_jalan', ['inv_id'=>NULL], ['id'=>$get['id_surat_jalan']]);
            $cek = $this->Model_finance->get_sj_list($get['id_sales_order'])->result();
            if(empty($cek)){
                $flag_invoice = 0;
            }else{
                $flag_invoice = 2;
            }
            $this->db->update('sales_order',['flag_invoice'=>$flag_invoice] ,['id'=>$get['id_sales_order']]);

            $this->db->delete('f_invoice', ['id' => $id]);
            $this->db->delete('f_invoice_detail', ['id_invoice' => $id]);

            if($user_ppn == 1){
                $this->load->helper('target_url');
                $url = target_url().'api/FinanceAPI/inv_del/id/'.$id;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                // curl_setopt($ch, CURLOPT_POSTFIELDS, "group=3&group_2=1");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                $response = json_decode($result);
                curl_close($ch);
                // print_r($result);
                // die();
            }
        }

        if($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data Invoice berhasil dihapus');
            redirect('index.php/Finance/invoice');
        }
    }

    function update_invoice(){
        $user_id   = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $return_data = array();
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_jatuh_tempo = date('Y-m-d', strtotime($this->input->post('tgl_jatuh_tempo')));
        $tanggal   = date('Y-m-d h:m:s');
        $total = $this->input->post('total');
        $diskon = str_replace(',', '', $this->input->post('diskon'));
        $cost = str_replace(',', '', $this->input->post('cost'));
        $materai = str_replace(',', '', $this->input->post('materai'));
        if ($this->input->post('flag_ppn') == 1 && $this->input->post('currency')=='IDR') {
            $update_total = ($total - $diskon - $cost - $materai) * 10 / 100;
        } else {
            $update_total = $total - $diskon - $cost - $materai;
        }
     
        $this->db->trans_start();
        // echo $total;die();
        $data = [
            'no_invoice' => $this->input->post('no_invoice'),
            'bank_id' => $this->input->post('bank_id'),
            'term_of_payment' => $this->input->post('term_of_payment'),
            'tanggal' => $tgl_input,
            'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
            'keterangan' => nl2br($this->input->post('remarks')),
            'kurs'=> $this->input->post('kurs'),
            'diskon' => $diskon,
            'add_cost' => $cost,
            'materai' => $materai,
            'nilai_invoice' => $update_total,
            'nama_direktur' => $this->input->post('nama_direktur')
        ];

        $this->db->update('f_invoice', $data, ['id' => $this->input->post('id')]);

            if($user_ppn==1){
                $this->load->helper('target_url');

                $this->load->model('Model_beli_rongsok');

                $data_post['id'] = $this->input->post('id');                
                $data_post['master'] = $data;

                $detail_post = json_encode($data_post);
                // print_r($detail_post);
                // die();

                $ch = curl_init(target_url().'api/FinanceAPI/inv_update');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
            }

        if($this->db->trans_complete()){
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('flash_msg', 'Invoice gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }
    }

    function cek_no_invoice_update(){
        $tgl_inv = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn = $this->session->userdata('user_ppn');
        
        $code = $this->input->post('no_invoice');

        $cek = $this->db->query("Select *from f_invoice where id = ".$this->input->post('id'))->row_array();
        if ($cek['no_invoice'] == $code) {
            $data['type'] = 'sukses';
        } else {
            $count = $this->db->query("Select count(id) as count from f_invoice where no_invoice = '".$code."'")->row_array();
            if($count['count']>0){
                $data['type'] = 'duplicate';
            }else{
                $data['type'] = 'sukses';
            }
        }

        
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function print_invoice(){
        $id = $this->uri->segment(3);
        if($id){       
            $this->load->helper('terbilang_d_helper');
            $this->load->helper('tanggal_indo');
            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_invoice($id)->row_array();
            $data['details'] = $this->Model_finance->show_detail_invoice($id)->result();

            if($data['header']['flag_ppn'] == 1){
            $data['total'] = $data['header']['nilai_invoice']*110/100;
            $this->load->view('finance/print_faktur', $data);
            }else{
            $data['total'] = $data['header']['nilai_invoice'];
            $this->load->view('finance/print_invoice', $data);
            }
        }else{
            redirect('index.php'); 
        }
    }
/* OLD MATCHING
    function matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/matching";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_matching()->result();

        $this->load->view('layout', $data);
    }

    function matching_invoice(){
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
            $data['judul']     = "Finance";
            $data['content']   = "finance/matching_invoice";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->customer_detail($id)->row_array();
            $data['details_invoice'] = $this->Model_finance->load_invoice_full($id)->result();
            $data['details_um'] = $this->Model_finance->load_um_full($id)->result();
            $data['details_matching'] = $this->Model_finance->load_matching_invoice($id)->result();
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/Finance');
        }
    }

    function add_matching(){
        $user_id = $this->session->userdata('user_id');
        $tanggal = date('Y-m-d');
        $tanggal_input = date('Y-m-d h:m:s');

        $this->db->trans_start();
        
        $id = $this->input->post('id_modal');
        $id_invoice = $this->input->post('invoice_id');
        $id_um = $this->input->post('um_id');
        $id_hutang = $this->input->post('invoice_min');
        $sisa_invoice = str_replace('.', '', $this->input->post('sisa_invoice'));
        $sisa_um = str_replace('.', '', $this->input->post('sisa_um'));
        $sisa_hutang = str_replace('.', '', $this->input->post('sisa_hutang'));
        $harga_um = str_replace('.', '', $this->input->post('harga_um'));
        $harga_invoice = str_replace('.', '', $this->input->post('harga_invoice'));
        $harga_hutang = str_replace('.', '', $this->input->post('hutang'));
        $this->load->model('Model_finance');

        $paid = $harga_um - $sisa_um;
        $hutang = $harga_hutang - $sisa_hutang;
            $data = array(
                'customer_id'=>$id,
                'id_invoice'=> $id_invoice,
                'id_um'=> $id_um,
                'id_hutang'=> $id_hutang,
                'paid'=>$paid,
                'used_hutang'=> $hutang,
                'sisa_um'=>$sisa_um,
                'sisa_invoice'=>$sisa_invoice,
                'created_at'=> $tanggal_input,
                'created_by'=> $user_id
            );
            $this->db->insert('f_matching_detail', $data);   

            // UPDATE MATCHING_ID DI TABEL F_INVOICE JIKA SISA_INVOICE = 0
            if($sisa_invoice == 0){
                $data = array(
                    'flag_matching'=> 1,
                    'modified_at'=> $tanggal_input,
                    'modified_by'=> $user_id
                );
                $this->db->where('id', $id_invoice);
                $this->db->update('f_invoice', $data);
            }

            //UPDATE MATCHING_ID DI TABEL F_UANG_MASUK JIKA SISA_UM = 0
            if($sisa_um == 0){
                $data = array(
                    'flag_matching'=> 1,
                    'modified_at'=> $tanggal_input,
                    'modified_by'=> $user_id
                );
                $this->db->where('id', $id_um);
                $this->db->update('f_uang_masuk', $data);
            }

            if($sisa_hutang == 0){
                $data = array(
                    'flag_matching'=> 1,
                    'modified_at'=> $tanggal_input,
                    'modified_by'=> $user_id
                );
                $this->db->where('id', $id_hutang);
                $this->db->update('f_invoice', $data);
            }

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Matching sudah diupdate');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat penginputan Data Matching, silahkan coba kembali!');
            }
       redirect('index.php/Finance/matching_invoice/'.$id);
    }
*/  
    function matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/matching";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_matching($ppn)->result();

        $this->load->view('layout', $data);
    }

    function add_match(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['ppn'] = $this->session->userdata('user_ppn');
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_match";
        
        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list()->result();
        $this->load->view('layout', $data); 
    }

    function save_match(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $ppn       = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        if($ppn == 1){
            $code = $this->Model_m_numberings->getNumbering('MTCH-KMP', $tgl_input);
        }else{
            $code = $this->Model_m_numberings->getNumbering('MTCH', $tgl_input);
        }
        $data = array(
            'no_matching'=>$code,
            'tanggal'=> $tgl_input,
            'id_customer'=> $this->input->post('m_customer_id'),
            'flag_ppn'=> $ppn,
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_match', $data);
        $insert_id=$this->db->insert_id();

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Matching Group Berhasil dibuat!');
            redirect(base_url('index.php/Finance/matching_invoice/'.$insert_id));
        }else{
            $this->session->set_flashdata('flash_msg', 'Matching Group gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function save_matching(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        if($this->input->post('total_invoice') == $this->input->post('total_nominal') && $this->input->post('total_invoice') != 0 && $this->input->post('total_nominal') != 0){
            $status = 1;
        }else{
            $status = 0;
        }

        $this->db->where('id',$this->input->post('id'));
        $this->db->update('f_match', array(
            'tanggal'=>$tgl_input,
            'status'=>$status,
            'modified_at'=>$tanggal,
            'modified_by'=>$user_id
        ));

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Matching Group Berhasil disimpan!');
            redirect('index.php/Finance/matching');
        }else{
            $this->session->set_flashdata('flash_msg', 'Matching Group gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }  
    }

    function delete_matching_invoice(){
        $id = $this->uri->segment(3);
        $this->db->trans_start();
        if(!empty($id)){

            $this->db->where('id_match',$id);
            $this->db->delete('f_match_detail');

            $this->db->where('flag_matching',$id);
            $this->db->update('f_invoice', array(
                'flag_matching'=>0
            ));

            $this->db->where('flag_matching',$id);
            $this->db->update('f_uang_masuk', array(
                'flag_matching'=>0
            ));

            $this->db->delete('f_match', ['id' => $id]);
        }

        if($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data Matching berhasil dihapus');
            redirect('index.php/Finance/matching');
        }
    }

    function matching_invoice(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');
            $ppn         = $this->session->userdata('user_ppn');
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Finance";
            $data['content']   = "finance/matching_invoice";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->matching_header($id)->row_array();
            // $data['details_matching'] = $this->Model_finance->load_matching_invoice($id)->result();
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/Finance');
        }
    }

    function print_matching_invoice(){
        $id = $this->uri->segment(3);
        if($id){       
            $this->load->helper('terbilang_helper');
            $this->load->helper('tanggal_indo');
            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->matching_header_print($id)->row_array();
            $data['details'] = $this->Model_finance->load_invoice_match_print($id)->result();
            $data['details_um'] = $this->Model_finance->load_um_match_print($id)->result();

            $this->load->view('finance/print_matching_inv', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_um_match(){
        $id = $this->uri->segment(3);
        if($id){       
            $this->load->helper('terbilang_koma_helper');
            $this->load->helper('tanggal_indo');
            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->matching_header_um_print($id)->row_array();
            $idm = $data['header']['flag_matching'];
            $data['details'] = $this->Model_finance->load_invoice_print_um_match($idm)->result();
            $row = $this->Model_finance->load_invoice_print_um_match($idm)->num_rows();

            if($row == 0){
                $this->load->view('finance/print_um_only', $data);
            }elseif($row == 1){
                $this->load->view('finance/print_um_match_dp', $data);
            }else{
                $this->load->view('finance/print_um_match', $data);
            }
        }else{
            redirect('index.php'); 
        }
    }

    function load_list_invoice(){
        $id = $this->input->post('id');
        $id_match = $this->input->post('id_match');
        $ppn = $this->session->userdata('user_ppn');

        $tabel = "";
        $total_invoice = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_invoice_full($id,$ppn,$id_match)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
                if($row->jenis_trx == 0){
                    $tabel .= '<td style="background-color: green; color: white;"><i class="fa fa-arrow-circle-up"></i></td>';
                    $total_invoice += $row->total; 
                }else{
                    $tabel .= '<td style="background-color: red; color: white;"><i class="fa fa-arrow-circle-down"></i></td>';
                    $total_invoice += -$row->total;
                }
            $tabel .= '<td>'.$row->no_invoice.'</td>';
            $tabel .= '<td style="text-align:right;">'.number_format($row->total,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center">';
            if($row->count==0){
                $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="input_inv('.$row->id.');" style="margin-top:2px; margin-bottom:2px;" id="addInv"><i class="fa fa-plus"></i> Tambah </a>';
            }else{
                $tabel .= 'Added!';
            }
            $tabel .= '</td>';

            $no++;
        }
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:right;" colspan="3"><strong>Total Harga </strong></td>';
        $tabel .= '<td style="text-align:right;">';
        $tabel .= '<strong>'.number_format($total_invoice,0,',','.').'</strong>';
        $tabel .= '</td>';
        $tabel .= '<td></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function load_data_invoice(){
        $id = $this->input->post('id');

        $tabel = "";
        $total_invoice = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_invoice_match($id)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
                if($row->jenis_trx == 0){
                    $tabel .= '<td style="background-color: green; color: white;"><i class="fa fa-arrow-circle-up"></i></td>';
                    $total_invoice += $row->inv_bayar; 
                }else{
                    $tabel .= '<td style="background-color: red; color: white;"><i class="fa fa-arrow-circle-down"></i></td>';
                    $total_invoice += -$row->inv_bayar;
                }
            $tabel .= '<td>'.$row->no_invoice.'</td>';
            $tabel .= '<td style="text-align:right;">'.number_format($row->inv_bayar,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle blue" onclick="view_inv('.$row->id.');" style="margin-top:2px; margin-bottom:2px;" id="delInv"><i class="fa fa-floppy-o"></i> View </a>';
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle red" onclick="delInv('.$row->id.','.$row->id_inv.');" style="margin-top:2px; margin-bottom:2px;" id="delInv"><i class="fa fa-trash"></i> Delete </a></td>';
            $no++;
        }
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:right;" colspan="3"><strong>Total Harga </strong></td>';
        $tabel .= '<td style="text-align:right;">';
        $tabel .= '<strong>'.number_format($total_invoice,0,',','.').'</strong>';
        $tabel .= '<input type="hidden" id="load_total_invoice" name="total_invoice" value="'.$total_invoice.'">';
        $tabel .= '</td>';
        $tabel .= '<td id="view_total_invoice"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function add_instant_um_match(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tanggal   = date('Y-m-d h:m:s');
        
        $this->db->trans_start();

        $this->db->where('id',$this->input->post('um_id'));
        $this->db->update('f_uang_masuk', array(
            'flag_matching'=>$this->input->post('id_modal')
        ));

        $data = array(
            'id_match'=>$this->input->post('id_modal'),
            'id_um'=>$this->input->post('um_id'),
            'id_inv'=>0
        );
        $this->db->insert('f_match_detail', $data);

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
            $return_data['message']= "Berhasil menambahkan item barang! Silahkan coba kembali";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function add_potongan_match(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();

        $this->db->trans_start();

        $data = array(
            'id_match'=>$this->input->post('id_modal'),
            'id_um'=>0,
            'id_inv'=>0,
            'currency'=>$this->input->post('currency'),
            'kurs'=>$this->input->post('kurs'),
            'biaya'=>str_replace(',', '',$this->input->post('nominal')),
            'keterangan'=>$this->input->post('k_1')
        );
        $this->db->insert('f_match_detail', $data);

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
            $return_data['message']= "Berhasil menambahkan potongan! Silahkan coba kembali";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan potongan! Silahkan coba kembali";
        }

        header('Content-Type: application/json');
        echo json_encode($return_data);

        // redirect('index.php/Finance/matching_invoice/'.$this->input->post('id_modal'));
    }

    function save_potongan_match(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tanggal   = date('Y-m-d h:m:s');
        
        $this->db->trans_start();
        $data = array(
            'biaya'=>str_replace(',', '',$this->input->post('nominal')),
            'currency'=>$this->input->post('currency'),
            'kurs'=>$this->input->post('kurs'),
            'keterangan'=>$this->input->post('k_1')
        );

        $this->db->where('id', $this->input->post('id_detail'));
        $this->db->update('f_match_detail', $data);

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
            $return_data['message']= "Berhasil mengupdate potongan!";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal mengupdate potongan! Silahkan coba kembali";
        }

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function view_data_inv(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result= $this->Model_finance->view_inv_match($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function view_data_um(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result= $this->Model_finance->view_um_match($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function add_inv_match(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tanggal   = date('Y-m-d h:m:s');
        
        $this->db->trans_start();
        if($this->input->post('sisa_invoice')==0){
            $flag_matching = 1;
        }else{
            $flag_matching = 0;
        }

        $nilai_bayar = str_replace(',', '', $this->input->post('nominal_sdh_bayar')) + str_replace(',', '', $this->input->post('nominal_bayar'));
        $this->db->where('id',$this->input->post('id_inv'));
        $this->db->update('f_invoice', array(
            'nilai_bayar'=>$nilai_bayar,
            'nilai_pembulatan'=>str_replace(',', '', $this->input->post('nominal_potongan')),
            'flag_matching'=>$flag_matching
        ));

        $data = array(
            'id_match'=>$this->input->post('id_modal'),
            'id_inv'=>$this->input->post('id_inv'),
            'inv_bayar'=>str_replace(',', '', $this->input->post('nominal_bayar')),
            'id_um'=>0
        );
        $this->db->insert('f_match_detail', $data);

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function save_inv_match(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tanggal   = date('Y-m-d h:m:s');
        
        $this->db->trans_start();

        if($this->input->post('sisa_invoice')==0){
            $flag_matching = 1;
        }else{
            $flag_matching = 0;
        }

        $nilai_bayar = str_replace(',', '', $this->input->post('nominal_sdh_bayar')) + str_replace(',', '', $this->input->post('nominal_bayar'));
        $this->db->where('id',$this->input->post('id_inv'));
        $this->db->update('f_invoice', array(
            'nilai_bayar'=>$nilai_bayar,
            'nilai_pembulatan'=>str_replace(',', '', $this->input->post('nominal_potongan')),
            'flag_matching'=>$flag_matching
        ));

        $data = array(
            'inv_bayar'=>str_replace(',', '', $this->input->post('nominal_bayar')),
        );
        $this->db->where('id',$this->input->post('id_modal'));
        $this->db->update('f_match_detail', $data);

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function del_inv_match(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        
        $this->db->trans_start();

        $this->load->model('Model_finance');
        $get = $this->Model_finance->view_inv_match($this->input->post('id'))->row_array();

        $nilai_bayar = $get['nilai_bayar'] - $get['inv_bayar'];

        // print_r($get);
        // die();

        $this->db->where('id',$this->input->post('id_inv'));
        $this->db->update('f_invoice', array(
            'nilai_bayar'=>$nilai_bayar,
            'nilai_pembulatan'=>0,
            'flag_matching'=>0
        ));

        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('f_match_detail');

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function load_list_um(){
        $id = $this->input->post('id');
        $ppn = $this->session->userdata('user_ppn');

        $tabel = "";
        $total_nominal = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_um_full($id,$ppn)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_uang_masuk.'</td>';
            $tabel .= '<td>'.$row->nomor_cek.'</td>';
            $tabel .= '<td>';
                if($row->status==0){
                    $tabel .= '<div style="background-color:darkkhaki; padding:3px">Belum Cair</div>';
                }else if($row->status==1){
                    $tabel .= '<div style="background-color:green; padding:3px; color:white">Sudah Cair</div>';
                }else if($row->status==2){
                    $tabel .= '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                }else if($row->status==9){
                    $tabel .= '<div style="background-color:red; color:#fff; padding:3px">Gagal Cair</div>';
                }else if($row->status==8){
                    $tabel .= '<div style="background-color:orange; color:#fff; padding:3px">Sudah Diganti</div>';
                }
            $tabel .= '</td>';
            $tabel .= '<td style="text-align:right;">'.$row->currency.' '.number_format($row->nominal,0,',', '.').'</td>';
            $tabel .= '<td style="text-align:center"><button href="javascript:;" class="btn btn-xs btn-circle yellow-gold addUM" onclick="this.disabled=true; instantADDUM('.$row->id.');" style="margin-top:2px; margin-bottom:2px;" id="addUM"><i class="fa fa-plus"></i> Tambah</button></td>';
            $tabel .= '</tr>';            
            $no++;
            $total_nominal += $row->nominal;
        }
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:right;" colspan="4"><strong>Total Nominal </strong></td>';
        $tabel .= '<td style="text-align:right;">';
        $tabel .= '<strong>'.number_format($total_nominal,0,',','.').'</strong>';
        $tabel .= '</td>';
        $tabel .= '<td></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function load_data_um(){
        $id = $this->input->post('id');

        $tabel = "";
        $total_nominal = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_um_match($id)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_uang_masuk.'</td>';
            $tabel .= '<td>'.$row->nomor_cek.'</td>';
            $tabel .= '<td>';
                if($row->status==0){
                    $tabel .= '<div style="background-color:darkkhaki; padding:3px">Belum Cair</div>';
                }else if($row->status==1){
                    $tabel .= '<div style="background-color:green; padding:3px; color:white">Sudah Cair</div>';
                }else if($row->status==2){
                    $tabel .= '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                }else if($row->status==9){
                    $tabel .= '<div style="background-color:red; color:#fff; padding:3px">Gagal Cair</div>';
                }else if($row->status==8){
                    $tabel .= '<div style="background-color:orange; color:#fff; padding:3px">Sudah Diganti</div>';
                }
            $tabel .= '</td>';
            $tabel .= '<td style="text-align:right;">'.$row->currency.' '.number_format($row->total,0,',', '.').'</td>';
            $tabel .= '<td style="text-align:center">';
            if($row->biaya>0){
                $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle blue" onclick="view_um('.$row->id.');" style="margin-top:2px; margin-bottom:2px;" id="delInv"><i class="fa fa-floppy-o"></i> View </a>';
            }
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle red" onclick="delUM('.$row->id.','.$row->id_um.');" style="margin-top:2px; margin-bottom:2px;" id="addUM"><i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
            $total_nominal += $row->total;
        }
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:right;" colspan="4"><strong>Total Nominal Invoice </strong></td>';
        $tabel .= '<td style="text-align:right;">';
        $tabel .= '<strong>'.number_format($total_nominal,0,',','.').'</strong>';
        $tabel .= '<input type="hidden" id="load_total_nominal" name="total_nominal" value="'.$total_nominal.'">';
        $tabel .= '</td>';
        $tabel .= '<td id="view_total_nominal"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function del_um_match(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tanggal   = date('Y-m-d h:m:s');
        
        $this->db->trans_start();

        if($this->input->post('id_um')>0){
            $this->db->where('id',$this->input->post('id_um'));
            $this->db->update('f_uang_masuk', array(
                'flag_matching'=>0
            ));
        }

        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('f_match_detail');
        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function get_um(){
        $id = $this->input->post('id');
        $tabel = "";

        $this->load->model('Model_finance');
        $um= $this->Model_finance->get_um($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($um);
    }

    function get_invoice_list_plus(){ 
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_invoice_matching_plus($this->input->post('id'))->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_invoice;
        } 
        print form_dropdown('invoice_id', $arr_so);
    }

    function get_invoice_list_minus(){
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_invoice_matching_minus($this->input->post('id'))->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_invoice;
        }
        print form_dropdown('invoice_id', $arr_so);
    }

    function get_um_list(){ 
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_um_matching($this->input->post('id'))->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->nomor;
        } 
        print form_dropdown('invoice_id', $arr_so);
    }

    function get_data_hutang(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result= $this->Model_finance->get_data_hutang($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function get_data_inv(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result= $this->Model_finance->get_data_inv($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function filter_cek(){
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
            $data['judul']     = "Finance";
            $data['content']   = "finance/filter_cek";

            $this->load->model('Model_finance');
            $data['list_data'] = $this->Model_finance->list_data_filter($id)->result();
            $data['list_customer'] = $this->Model_finance->customer_list()->result();

            $this->load->view('layout', $data);
        }else{
            redirect('index.php/Finance');
        }
    }

    function list_kas(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn    = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/list_kas";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_kas($ppn)->result();
        if($ppn==1){
            $data['saldo'] = $this->Model_finance->saldo_ppn()->result();
        }else{
            $data['saldo'] = $this->Model_finance->saldo()->result();
        }

        $this->load->view('layout', $data);
    }

    function add_kas(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_kas";
        
        $this->load->model('Model_finance');
        $data['um_list'] = $this->Model_finance->um_list_kas()->result();
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();
        $this->load->view('layout', $data); 
    }

    function save_kas(){
        $user_id   = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $this->load->model('Model_m_numberings');

        if($user_ppn==1){
            if($this->input->post('bank_id')==0){
                $num = 'KM-KMP';
            }else{
                $num = 'BM-KMP';
            }
        }else{
            if($this->input->post('bank_id')==0){
                $num = 'KM';
            }else{
                $num = 'BM';
            }
        }

        $code = $this->Model_m_numberings->getNumbering($num);

        if($this->input->post('bank_id')==0){
            $jenis = 'Cash';
        }else{
            $jenis = 'Setor Tunai';
        }

        $data_um = array(
            'no_uang_masuk'=> $code,
            'm_customer_id'=> 0,
            'tanggal'=> $tgl_input,
            'status'=> 1,
            'flag_ppn'=> $user_ppn,
            'jenis_pembayaran'=> $jenis,
            'rekening_tujuan'=> $this->input->post('bank_id'),
            'currency'=> 'IDR',
            'nominal'=> str_replace(',', '', $this->input->post('nominal')),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_uang_masuk', $data_um);
        $um_id = $this->db->insert_id();

        $data = array(
            'jenis_trx'=>0,
            'flag_ppn'=>$user_ppn,
            'nomor'=> $code,
            'tanggal'=> $tgl_input,
            'id_bank'=> $this->input->post('bank_id'),
            'id_um'=> $um_id,
            'currency'=> $this->input->post('currency'),
            'nominal'=> str_replace(',', '',$this->input->post('nominal')),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_kas', $data);

        // $this->db->where('id', $this->input->post('um_id'));
        // $this->db->update('f_uang_masuk', array(
        //     'status'=>1,
        //     'flag_matching'=>2,
        //     'approved_at'=>$tanggal,
        //     'approved_by'=>$user_id
        // ));

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Uang Kas Berhasil disimpan!');
            redirect(base_url('index.php/Finance/list_kas'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function view_kas(){
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
            $data['judul']     = "Finance";
            $data['content']   = "finance/view_kas";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_kas($id)->row_array();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function add_slip_setoran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_slip_setoran";
        
        $this->load->model('Model_finance');
        $data['data_slip'] = $this->Model_finance->slip_setoran_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();
        $this->load->view('layout', $data); 
    }

    function save_slip_setoran(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('BM');

        $data_um = array(
            'no_uang_masuk'=> $code,
            'm_customer_id'=> 0,
            'tanggal'=> $this->input->post('tanggal'),
            'status'=> 1,
            'flag_ppn'=> 0,
            'jenis_pembayaran'=> 'Setor Tunai',
            'rekening_tujuan'=> $this->input->post('bank_id'),
            'currency'=> 'IDR',
            'nominal'=> str_replace('.', '', $this->input->post('nominal')),
            'keterangan'=> 'Slip Setoran | '.$this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_uang_masuk', $data_um);
        $um_id = $this->db->insert_id();

        $data = array(
            'jenis_trx'=>0,
            'nomor'=> $code,
            'flag_ppn'=> 0,
            'tanggal'=> $tgl_input,
            'id_um' => $um_id,
            'id_bank'=> $this->input->post('bank_id'),
            'id_slip_setoran'=> $this->input->post('slip_id'),
            'currency'=> 'IDR',
            'nominal'=> str_replace('.', '', $this->input->post('nominal')),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_kas', $data);
        $insert_id = $this->db->insert_id();

        $this->db->where('id', $this->input->post('slip_id'));
        $this->db->update('f_slip_setoran', array(
            'id_kas'=>$insert_id,
            'modified_at'=>$tanggal,
            'modified_by'=>$user_id
        ));

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Uang Kas Berhasil disimpan!');
            redirect(base_url('index.php/Finance/slip_setoran'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function laporan_sj(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/laporan_sj";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function laporan_penjualan_gabungan(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/laporan_penjualan_gabungan";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function laporan_penjualan_per_jb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/laporan_penjualan_per_jb";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function print_laporan_penjualan(){
            $module_name = $this->uri->segment(1);
            $ppn = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            $data['detailLaporan'] = $this->Model_finance->print_laporan_penjualan($start,$end,$ppn)->result();
            $this->load->view('finance/print_laporan_penjualan', $data);
    }

    function print_laporan_sj(){
            $module_name = $this->uri->segment(1);
            $ppn = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));
            $l = $_GET['l'];

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            if($l == 2){
                $data['detailLaporan'] = $this->Model_finance->print_laporan_sj_all($start,$end)->result();
            }else{
                $data['detailLaporan'] = $this->Model_finance->print_laporan_sj($start,$end,$l)->result();
            }
            $this->load->view('finance/print_laporan_sj', $data);
    }

    function search_penjualan_customer(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');   
        $ppn = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_penjualan_customer";

        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list($ppn)->result();

        $this->load->view('layout', $data);   
    }

    function print_penjualan_customer(){
            $module_name = $this->uri->segment(1);
            $ppn = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');

            // $l = $_GET['laporan'];
            $s = date('Y-m-d', strtotime($_GET['ts']));
            $e = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            if($ppn==1){
                $c = 'KKH';
            }else{
                $c = 'CV';
            }

            $this->load->model('Model_finance');
            // if($l==0){
            //     $data['detailLaporan'] = $this->Model_finance->print_penjualan_customer_all($s,$e,$c)->result();
            // }else{
            //     $data['detailLaporan'] = $this->Model_finance->print_penjualan_customer($s,$e,$c,$l)->result();
            // }

            
                $data['detailLaporan'] = $this->Model_finance->print_penjualan_customer_all($s,$e,$c)->result();
            $this->load->view('finance/print_penjualan_customer2', $data);
    }

    function search_penjualan_customer2(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');   
        $ppn = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_penjualan_customer2";

        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list($ppn)->result();

        $this->load->view('layout', $data);   
    }

    function print_penjualan_customer2(){
            $module_name = $this->uri->segment(1);
            $ppn = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');

            // $l = $_GET['laporan'];
            $s = date('Y-m-d', strtotime($_GET['ts']));
            $e = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            if($ppn==1){
                $c = 'KMP';
            }else{
                $c = 'KKH';
            }

            $this->load->model('Model_finance');
            // if($l==0){
            //     $data['detailLaporan'] = $this->Model_finance->print_penjualan_customer2_all($s,$e,$c)->result();
            // }else{
            //     $data['detailLaporan'] = $this->Model_finance->print_penjualan_customer2($s,$e,$c,$l)->result();
            // }
                $data['detailLaporan'] = $this->Model_finance->print_penjualan_customer2_all($s,$e,$c)->result();
            $this->load->view('finance/print_penjualan_customer2', $data);
    }

    function search_penjualan_jb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_penjualan_jb";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function print_penjualan_jb(){
            $module_name = $this->uri->segment(1);
            $ppn = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');

            $s = date('Y-m-d', strtotime($_GET['ts']));
            $e = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            if($ppn==1){
                $c = 'KKH';
            }else{
                $c = 'CV';
            }

            $data['detailLaporan'] = $this->Model_finance->print_penjualan_jb($s,$e,$c)->result();
            $this->load->view('finance/print_penjualan_jb', $data);
    }

    function search_penjualan_jb2(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_penjualan_jb2";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function print_penjualan_jb2(){
            $module_name = $this->uri->segment(1);
            $ppn = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');

            $s = date('Y-m-d', strtotime($_GET['ts']));
            $e = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            if($ppn==1){
                $c = 'KMP';
            }else{
                $c = 'KKH';
            }

            $this->load->model('Model_finance');
            $data['detailLaporan'] = $this->Model_finance->print_penjualan_jb2($s,$e,$c)->result();
            $this->load->view('finance/print_penjualan_jb2', $data);
    }

    function print_query_penjualan(){
            $module_name = $this->uri->segment(1);
            $this->load->helper('tanggal_indo');
            $l = $_GET['laporan'];
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            if($l == 1){
                $data['detailLaporan'] = $this->Model_finance->print_laporan_penjualan($start,$end,0)->result();
            }elseif ($l == 2) {
                $data['detailLaporan'] = $this->Model_finance->query_penjualan($start,$end,'CV')->result();
            }elseif ($l == 3) {
                $data['detailLaporan'] = $this->Model_finance->query_penjualan($start,$end,'KKH')->result();
            }
            $this->load->view('finance/print_laporan_penjualan', $data);
    }

    function print_query_penjualan_jb(){
            $module_name = $this->uri->segment(1);
            $this->load->helper('tanggal_indo');
            $l = $_GET['laporan'];
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            if($l == 1){
                $data['detailLaporan'] = $this->Model_finance->print_laporan_penjualan_jb($start,$end,0)->result();
            }elseif ($l == 2) {
                $data['detailLaporan'] = $this->Model_finance->query_penjualan_jb($start,$end,'CV')->result();
            }elseif ($l == 3) {
                $data['detailLaporan'] = $this->Model_finance->query_penjualan_jb($start,$end,'KKH')->result();
            }
            $this->load->view('finance/print_laporan_penjualan_jb', $data);
    }

    function print_penjualan_piutang(){
            $module_name = $this->uri->segment(1);
            $user_ppn    = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');
            $tanggal = date('Y-m-d');

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            if($user_ppn==1){
                $data['detailLaporan'] = $this->Model_finance->print_laporan_piutang_kmp($tanggal,$user_ppn)->result();
            }else{
                $data['detailLaporan'] = $this->Model_finance->print_laporan_piutang($tanggal,$user_ppn)->result();
            }
            $this->load->view('finance/print_laporan_piutang', $data);
    }

    function search_penerimaan(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_penerimaan";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function print_penerimaan_kb(){
            $module_name = $this->uri->segment(1);
            $ppn         = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');
            $l = $_GET['laporan'];
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            if($l == 1){
                $data['detailLaporan'] = $this->Model_finance->trx_kas($start,$end,0,$ppn)->result();
            }elseif ($l == 2) {
                $data['detailLaporan'] = $this->Model_finance->trx_bank($start,$end,0,$ppn)->result();
            }
            $this->load->view('finance/print_penerimaan_kb', $data);
    }

    function search_pengeluaran(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_pengeluaran";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function print_pengeluaran_kb(){
            $module_name = $this->uri->segment(1);
            $ppn         = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');
            $l = $_GET['laporan'];
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');
            if($l == 1){
                $data['detailLaporan'] = $this->Model_finance->trx_keluar_kas($start,$end,1,$ppn)->result();
            }elseif ($l == 2) {
                $data['detailLaporan'] = $this->Model_finance->trx_keluar_bank($start,$end,1,$ppn)->result();
            }

            $this->load->view('finance/print_pengeluaran_kb', $data);
    }

    function search_penerimaan_cm(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_penerimaan_cm";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);   
    }

    function print_penerimaan_cm(){
            $module_name = $this->uri->segment(1);
            $ppn         = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');

            $data['detailLaporan'] = $this->Model_finance->trx_cm($start,$end,0,$ppn)->result();

            $this->load->view('finance/print_penerimaan_cm', $data);
    }

    function search_trx(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');   
        $ppn = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/search_trx";

        $this->load->model('Model_finance');
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();

        $this->load->view('layout', $data);   
    }

    function print_trx(){
            $module_name = $this->uri->segment(1);
            $ppn         = $this->session->userdata('user_ppn');
            $this->load->helper('tanggal_indo');
            $l = $_GET['laporan'];
            $start = date('Y-m-d', strtotime($_GET['ts']));
            $end = date('Y-m-d', strtotime($_GET['te']));

            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $this->load->model('Model_finance');

                $data['bank'] = $this->Model_finance->get_bank_list($l)->row_array();
                $data['saldo_awal'] = $this->Model_finance->saldo_awal($start,$l)->row_array();
                $data['detailLaporan'] = $this->Model_finance->trx_keluar_masuk($start,$end,$l)->result();
            $this->load->view('finance/print_trx', $data);
    }

    function cek_masuk(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');   
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/cm";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data_cm($ppn)->result();
        $data['list_customer'] = $this->Model_finance->customer_list()->result();

        $this->load->view('layout', $data);
    }

    function add_cm(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_cm";
        
        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();
        $this->load->view('layout', $data); 
    }

    function bank_masuk(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');   
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/bm";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data_bm($ppn)->result();
        $data['list_customer'] = $this->Model_finance->customer_list()->result();

        $this->load->view('layout', $data);
    }

    function add_bm(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_bm";
        
        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();
        $this->load->view('layout', $data); 
    }

    function laporan_pembelian(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/laporan_pembelian";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);  
    }

    function print_query_pembelian(){
        $module_name = $this->uri->segment(1);
        $this->load->helper('tanggal_indo');
        $j = $_GET['jenis'];
        $l = $_GET['laporan'];
        $start = date('Y-m-d', strtotime($_GET['ts']));
        $end = date('Y-m-d', strtotime($_GET['te']));

        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $this->load->model('Model_finance');
        if($j==0){
            if($l == 1){
                $data['detailLaporan'] = $this->Model_finance->print_laporan_pembelian($start,$end,0)->result();
                $data['ingotRendah'] = $this->Model_finance->laporan_pembelian_ingot_rendah($start, $end, 0)->result();
            }elseif ($l == 2) {
                $data['detailLaporan'] = $this->Model_finance->print_laporan_pembelian($start,$end,2)->result();
                $data['ingotRendah'] = $this->Model_finance->laporan_pembelian_ingot_rendah($start, $end, 2)->result();
            }elseif ($l == 3) {
                $data['detailLaporan'] = $this->Model_finance->print_laporan_pembelian($start,$end,1)->result();
                $data['ingotRendah'] = $this->Model_finance->laporan_pembelian_ingot_rendah($start, $end, 1)->result();
            }
        $this->load->view('finance/print_laporan_pembelian', $data);
        }elseif($j==1){
            if($l == 1){
                $data['detailLaporan'] = $this->Model_finance->laporan_pembelian_rsk($start,$end,0)->result();
                $data['ingotRendah'] = $this->Model_finance->laporan_pembelian_rsk_ingot_rendah($start,$end,0)->result();
            }elseif ($l == 2) {
                $data['detailLaporan'] = $this->Model_finance->laporan_pembelian_rsk($start,$end,2)->result();
                $data['ingotRendah'] = $this->Model_finance->laporan_pembelian_rsk_ingot_rendah($start,$end,2)->result();
            }elseif ($l == 3) {
                $data['detailLaporan'] = $this->Model_finance->laporan_pembelian_rsk($start,$end,1)->result();
                $data['ingotRendah'] = $this->Model_finance->laporan_pembelian_rsk_ingot_rendah($start,$end,1)->result();
            }
        $this->load->view('finance/print_laporan_pembelian_rsk', $data);
        }
    }

    function rangking_rongsok(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/rangking_rongsok";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);  
    }

    function print_rangking_rongsok(){
        $module_name = $this->uri->segment(1);
        $this->load->helper('tanggal_indo');
        $l = $_GET['laporan'];
        $start = date('Y-m-d', strtotime($_GET['ts']));
        $end = date('Y-m-d', strtotime($_GET['te']));

        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $this->load->model('Model_finance');
        if($l == 1){
            $data['detailLaporan'] = $this->Model_finance->rangking_pemasukan_rongsok($start,$end,0)->result();
            $data['ingotRendah'] = $this->Model_finance->rangking_pemasukan_ingot_rendah($start, $end, 0)->result();
        }elseif ($l == 2) {
            $data['detailLaporan'] = $this->Model_finance->rangking_pemasukan_rongsok($start,$end,2)->result();
            $data['ingotRendah'] = $this->Model_finance->rangking_pemasukan_ingot_rendah($start, $end, 2)->result();
        }elseif ($l == 3) {
            $data['detailLaporan'] = $this->Model_finance->rangking_pemasukan_rongsok($start,$end,1)->result();
            $data['ingotRendah'] = $this->Model_finance->rangking_pemasukan_ingot_rendah($start, $end, 1)->result();
        }
        $this->load->view('finance/print_rangking_rongsok', $data);
    }

    function daftar_pembelian_rongsok(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/daftar_pembelian_rongsok";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);  
    }

    function print_daftar_pembelian_rongsok(){
        $module_name = $this->uri->segment(1);
        $this->load->helper('tanggal_indo');
        $l = $_GET['laporan'];
        $start = date('Y-m-d', strtotime($_GET['ts']));
        $end = date('Y-m-d', strtotime($_GET['te']));

        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $this->load->model('Model_finance');
        if($l == 1){
            $data['header'] = $this->Model_finance->header_daftar_pembelian_rongsok($start, $end, 0)->result();
            $data['detailLaporan'] = $this->Model_finance->detail_daftar_pembelian_rongsok($start,$end,0)->result_array();
            // echo "<pre>";print_r($data['detailLaporan']);echo "</pre>"; die();
        }elseif ($l == 2) {
            $data['header'] = $this->Model_finance->header_daftar_pembelian_rongsok($start, $end, 2)->result();
            $data['detailLaporan'] = $this->Model_finance->detail_daftar_pembelian_rongsok($start,$end,2)->result();
        }elseif ($l == 3) {
            $data['header'] = $this->Model_finance->header_daftar_pembelian_rongsok($start, $end, 1)->result();
            $data['detailLaporan'] = $this->Model_finance->detail_daftar_pembelian_rongsok($start,$end,1)->result();
        }
        $this->load->view('finance/print_daftar_pembelian_rongsok', $data);
    }

    function laporan_bahan_pembantu(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "finance/laporan_bahan_pembantu";
        $this->load->model('Model_sales_order');

        $this->load->view('layout', $data);  
    }

    function print_laporan_bahan_pembantu(){
        $module_name = $this->uri->segment(1);
        $this->load->helper('tanggal_indo');
        $bulan = $_GET['b'];
        $tahun = $_GET['t'];
        $tgl1 = date('Ym', strtotime($tahun.'-'.$bulan));
        $tgl = date('Y-m', strtotime($tahun.'-'.$bulan));
        $datestring=$tgl.' first day of last month';
        $dt=date_create($datestring);
        $tgl2 = $dt->format('Ym');

        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $this->load->model('Model_finance');
        $data['detailLaporan'] = $this->Model_finance->detail_daftar_bahan_pembantu($tgl1, $tgl2)->result();
        // echo "<pre>";print_r($data);echo "</pre>"; die();
        if ($data['detailLaporan'] !== null) {
            $this->db->delete('t_sparepart_saldo', ['bulan' => $tgl1]);
            foreach ($data['detailLaporan'] as $row) {
                $this->db->insert('t_sparepart_saldo', [
                    'bulan' => $tgl1,
                    'sparepart_id' => $row->sparepart_id,
                    'qty' => $row->qty_keluar,
                    'amount' => $row->rata2,
                    'total_amount' => $row->amount_keluar,
                ]);
            }
        }

        $this->load->view('finance/print_laporan_bahan_pembantu', $data);
    }
}