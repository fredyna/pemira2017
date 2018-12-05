<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->in_group(1) && !$this->ion_auth->in_group(2)){
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('m_admin');
	}

	public function index()
	{
		redirect('admin/pemilih/ti','refresh');
	}

	function ti(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('ti')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/ti/ti';
		$this->load->view('template',$data);
	}
	
	function ak(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('ak')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/ak/ak';
		$this->load->view('template',$data);
	}

	public function kb(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('kb')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/kb/kb';
		$this->load->view('template',$data);
	}

	public function fm(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('fm')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/fm/fm';
		$this->load->view('template',$data);
	}

	public function kom(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('kom')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/kom/kom';
		$this->load->view('template',$data);
	}

	public function tm(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('tm')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/tm/tm';
		$this->load->view('template',$data);
	}

	public function te(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['jumlah'] = $this->m_admin->getKelas('te')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/te/te';
		$this->load->view('template',$data);
	}

	public function ind(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('ind')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/ind/ind';
		$this->load->view('template',$data);
	}

	public function dkv(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('dkv')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/dkv/dkv';
		$this->load->view('template',$data);
	}

	public function tkj(){
		$data['user']	= $this->ion_auth->user()->row();
		$data['group']	= $this->ion_auth->get_users_groups($data['user']->id)->row();
		$data['kelas'] = array('A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z');
		$data['jumlah'] = $this->m_admin->getKelas('tkj')->result();
		$data['title']	= 'Admin | Pemilih'; 
		$data['content']= 'admin/tkj/tkj';
		$this->load->view('template',$data);
	}



}

/* End of file Pemilih.php */
/* Location: ./application/controllers/admin/Pemilih.php */