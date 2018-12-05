<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tkj extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(!$this->ion_auth->logged_in() || !$this->ion_auth->in_group(1) && !$this->ion_auth->in_group(2)){
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('m_admin');
    }

	public function index($prodi=null,$smt=null,$kelas=null)
        {
            if($prodi==null||$smt==null||$kelas==null){
                $this->session->set_flashdata('info-umum', 'Pilihan Gagal! Silahkan Ulangi Kembali!');
                redirect('admin/pemilih/tkj');
            }
    
            $param = array(
                'prodi' => $prodi,
                'kelas' => strtolower($kelas),
                'smt'   => $smt
                );
            $data['pemilih'] = $this->m_admin->getPemilih($param);
            $data['user']   = $this->ion_auth->user()->row();
            $data['group']  = $this->ion_auth->get_users_groups($data['user']->id)->row();
            $data['no']     = 1;
            $data['prodi']  = $prodi;
            $data['kelas'] = $kelas;
            $data['smt']    = $smt;
            $data['title']  = 'Admin | Pemilih';
            $data['content'] = 'admin/tkj/pemilih_tkj';
            $this->load->view('template',$data);
        }

    function addKelas(){
        $jml = $this->input->post('jumlah');
        if($jml==null){
            $this->session->set_flashdata('info', 'Update Jumlah Failed!');
            redirect('admin/pemilih/tkj/','refresh');
        }
        $data = array(
                'id_prodi' => 'tkj',
                'smt'   => $this->input->post('smt'),
                'jumlah' => $jml
            );
        $query1 = $this->m_admin->getKelas($data['id_prodi'],$data['smt'])->row();
        if($query1){
            if($this->m_admin->updateKelas($data)){
                $this->session->set_flashdata('info', 'Update Jumlah Success!');
                redirect('admin/pemilih/tkj/','refresh');
            }else{
                $this->session->set_flashdata('info', 'Update Jumlah Failed!');
                redirect('admin/pemilih/tkj/','refresh');
            }
        }else{
            if($this->m_admin->addKelas($data)){
                $this->session->set_flashdata('info', 'Update Jumlah Success!');
                redirect('admin/pemilih/tkj/','refresh');
            }else{
                $this->session->set_flashdata('info', 'Update Jumlah Failed!');
                redirect('admin/pemilih/tkj/','refresh');
            }
        }
        
    }

    function add_pemilih($prodi=null,$smt=null,$kelas=null){
        if($prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info', 'Pilihan Gagal! Silahkan Ulangi Kembali!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }       


        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('r_password', 'Repeat Password', 'required|min_length[6]|max_length[15]|matches[password]');

        if($this->input->post('submit')){
            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $additional = array(
                    'first_name'    => $this->input->post('firstname'),
                    'last_name'     => $this->input->post('lastname'),
                    'smt'           => $smt,
                    'kelas'         => $kelas,
                    'prodi'         => $prodi
                    );
                $group = array('3');
                if($this->ion_auth->register($username,$password,null,$additional,$group)){
                    $this->session->set_flashdata('info', 'Berhasil Tambah Data!');
                    redirect('admin/tkj/add_pemilih/'.$prodi.'/'.$smt.'/'.$kelas);
                }
                else{
                    $this->session->set_flashdata('info', 'Gagal Tambah Data!');
                    redirect('admin/tkj/add_pemilih/'.$prodi.'/'.$smt.'/'.$kelas);
                }
            } else {
                $data['user']       = $this->ion_auth->user()->row();
                $data['group']  = $this->ion_auth->get_users_groups($data['user']->id)->row();
                $data['title']      = 'Admin | Pemilih';
                $data['prodi']      = $prodi;
                $data['kelas']      = $kelas;
                $data['smt']        = $smt;
                $data['content']    = 'admin/tkj/add_pemilih';
                $this->load->view('template',$data);
            }
        }
        else{
            $data['user']       = $this->ion_auth->user()->row();
            $data['group']  = $this->ion_auth->get_users_groups($data['user']->id)->row();
            $data['title']      = 'Admin | Pemilih';
            $data['prodi']      = $prodi;
            $data['kelas']      = $kelas;
            $data['smt']        = $smt;
            $data['content']    = 'admin/tkj/add_pemilih';
            $this->load->view('template',$data);
        }
    }

    function del_pemilih($id=null,$prodi=null,$smt=null,$kelas=null){
        if($id==null||$prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info', 'Delete Failed!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }

        if($this->ion_auth->delete_user($id)){
            $this->session->set_flashdata('info', 'Delete Success!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
        else{
            $this->session->set_flashdata('info', 'Delete Failed!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }   
    }

    function edit_pemilih($id=null,$prodi=null,$smt=null,$kelas=null){
        if($id==null||$prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info-umum', 'Pilihan Gagal! Silahkan Ulangi Kembali');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }

        $users_group = $this->ion_auth->in_group(3,$id);
        if($users_group){
            $data['user']       = $this->ion_auth->user()->row();
            $data['group']  = $this->ion_auth->get_users_groups($data['user']->id)->row();
            $data['pemilih']    = $this->ion_auth->user($id)->row();
            $data['title']      = 'Admin | Pemilih';
            $data['prodi']      = $prodi;
            $data['kelas']      = $kelas;
            $data['smt']        = $smt;
            $data['content']    = 'admin/tkj/edit_pemilih';
            $this->load->view('template',$data);
        }
        else{
            $this->session->set_flashdata('info', 'Update Failed!');
            redirect('admin/tkj/edit_pemilih/'.$id.'/'.$prodi.'/'.$smt.'/'.$kelas);
        }
    }

    function change_data($id=null,$prodi=null,$smt=null,$kelas=null){
        if($id==null||$prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info', 'Update Failed!');
            redirect('admin/tkj/edit_pemilih'.$id.'/'.$prodi.'/'.$smt.'/'.$kelas);
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[3]|max_length[25]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[1]|max_length[25]');
        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'username'      => $this->input->post('username'),
                'first_name'    => $this->input->post('firstname'),
                'last_name'     => $this->input->post('lastname')
                );
            if($this->ion_auth->update($id,$data)){
                $this->session->set_flashdata('info', 'Update Data Berhasil!');
                redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
            }
            else{
                $this->session->set_flashdata('info', 'Update Data Gagal!');
                redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
            }

        } else {
            $data['user']       = $this->ion_auth->user()->row();
            $data['group']  = $this->ion_auth->get_users_groups($data['user']->id)->row();
            $data['pemilih']    = $this->ion_auth->user($id)->row();
            $data['title']      = 'Admin | Pemilih';
            $data['prodi']      = $prodi;
            $data['kelas']      = $kelas;
            $data['smt']        = $smt;
            $data['content']    = 'admin/tkj/edit_pemilih';
            $this->load->view('template',$data);
        }
        
    }

    function change_password($id=null,$prodi=null,$smt=null,$kelas=null){
        if($id==null||$prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info', 'Update Failed!');
            redirect('admin/tkj/edit_pemilih/'.$id.'/'.$prodi.'/'.$smt.'/'.$kelas);
        }

        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('r_password', 'Repeat Password', 'required|min_length[6]|max_length[25]|matches[new_password]');
        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'password'      => $this->input->post('new_password')
                );
            if($this->ion_auth->update($id,$data)){
                $this->session->set_flashdata('info-password', 'Update Password Berhasil!');
                redirect('admin/tkj/edit_pemilih/'.$id.'/'.$prodi.'/'.$smt.'/'.$kelas);
            }
            else{
                $this->session->set_flashdata('info-password', 'Update Password Gagal!');
                redirect('admin/tkj/edit_pemilih/'.$id.'/'.$prodi.'/'.$smt.'/'.$kelas);
            }

        } else {
            $data['user']       = $this->ion_auth->user()->row();
            $data['group']  = $this->ion_auth->get_users_groups($data['user']->id)->row();
            $data['pemilih']    = $this->ion_auth->user($id)->row();
            $data['title']      = 'Admin | Pemilih';
            $data['prodi']      = $prodi;
            $data['kelas']      = $kelas;
            $data['smt']        = $smt;
            $data['content']    = 'admin/tkj/edit_pemilih';
            $this->load->view('template',$data);
        }
        
    }

    function lock($id=null,$prodi=null,$smt=null,$kelas=null){
        if($id==null||$prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info-umum', 'Pilihan Gagal! Silahkan Ulangi Kembali');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
        $user = $this->ion_auth->user()->row();
        $data = array(
            'active' => 0,
            'lock_by' => $user->username
            );
        if($this->m_admin->updateLock($id,$data)){
            $this->session->set_flashdata('info', 'Lock Success!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        } else{
            $this->session->set_flashdata('info', 'Lock Failed!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
    }

    function unlock($id=null,$prodi=null,$smt=null,$kelas=null){
        if($id==null||$prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info-umum', 'Pilihan Gagal! Silahkan Ulangi Kembali');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
        $user = $this->ion_auth->user()->row();
        $data = array(
            'active' => 1,
            'unlock_by' => $user->username
            );
        if($this->m_admin->updateLock($id,$data)){
            $this->session->set_flashdata('info', 'Unlock Success!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        } else{
            $this->session->set_flashdata('info', 'Unlock Failed!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
    }

    function lockAll($prodi=null,$smt=null,$kelas=null){
        if($prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info', 'Gagal! Silahkan Ulangi Kembali');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }

        $user = $this->ion_auth->user()->row();
        $data = array(
            'active' => 0,
            'lock_by' => $user->username
            );
        if($this->m_admin->updateLockAll($prodi,$smt,$kelas,$data)){
            $this->session->set_flashdata('info', 'Lock All Success!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        } else{
            $this->session->set_flashdata('info', 'Lock All Failed!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
    }

    function unlockAll($prodi=null,$smt=null,$kelas=null){
        if($prodi==null||$smt==null||$kelas==null){
            $this->session->set_flashdata('info', 'Gagal! Silahkan Ulangi Kembali');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
        
        $user = $this->ion_auth->user()->row();
        $data = array(
            'active' => 1,
            'unlock_by' => $user->username
            );
        if($this->m_admin->updateLockAll($prodi,$smt,$kelas,$data)){
            $this->session->set_flashdata('info', 'Unlock All Success!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        } else{
            $this->session->set_flashdata('info', 'Unlock All Failed!');
            redirect('admin/tkj/index/'.$prodi.'/'.$smt.'/'.$kelas);
        }
    }

}

/* End of file Tkj.php */
/* Location: ./application/controllers/admin/Tkj.php */