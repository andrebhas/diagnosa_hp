<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pertanyaan_model');
        $this->load->model('Jenis_kerusakan_model');
        $this->load->model('Solusi_model');
    }
    
	public function index()
	{		
		$this->db->order_by('id', 'DESC');
        $dt_diagnosa = $this->db->get('v_diagnosa')->result();

		$this->breadcrumbs->push('Diagnosa', '/diagnosa');		
		$data = array(
			'title' => 'Diagnosa' ,
			'breadcrumbs' => $this->breadcrumbs->show(),
			'content' => 'diagnosa/v_diagnosa' ,
			'dt_diagnosa' => $dt_diagnosa ,
		);
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['user'] = $user;
			$this->load->view('layout/layout', $data);
		} 
		else
		{
			$this->load->view('layout/public_layout', $data);
		}
		
	}

	public function detail($temp_code)
	{
		$this->db->where('temp_code', $temp_code);
        $diagnosa = $this->db->get('v_diagnosa')->row();
		if($diagnosa->temp_code){
			$this->db->where('temp_code', $diagnosa->temp_code);
			$temp_detail = $this->db->get('v_temp')->result();
		}
		$data = array(
			'title' => 'Diagnosa' ,
			'breadcrumbs' => $this->breadcrumbs->show(),
			'content' => 'diagnosa/v_diagnosa_detail' ,
			'diagnosa' => $diagnosa ,
			'temp_detail' => $temp_detail,
		);
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['user'] = $user;
			$this->load->view('layout/layout', $data);
		} 
		else
		{
			$this->load->view('layout/public_layout', $data);
		}
	}

	public function delete($temp_code)
	{
		$this->db->where('temp_code', $temp_code);
        $this->db->delete('temp');
		$this->db->where('temp_code', $temp_code);
		$this->db->delete('diagnosa');
		$this->session->set_flashdata('message', 'Delete Record Success');
		redirect('diagnosa','refresh');
	}

	public function buat_diagnosa()
	{
		$this->breadcrumbs->push('Diagnosa', '/diagnosa');
		$d_jenis_kerusakan = $this->Jenis_kerusakan_model->get_all();	
		$user = null;
		$data = array(
			'title' => 'Diagnosa' ,
			'breadcrumbs' => $this->breadcrumbs->show(),
			'data_jenis_kerusakan' => $d_jenis_kerusakan ,
			'content' => 'diagnosa/v_buat_diagnosa',
		);
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['user'] = $user;
			$this->load->view('layout/layout', $data);
		} 
		else
		{
			$this->load->view('layout/public_layout', $data);
		}
	}

	public function buat_proses($id_jenis_kerusakan)
	{ 
		$date = new DateTime();
		$temp_kode = $date->format('U');
		$this->session->set_userdata('temp_kode',$temp_kode);	
		$this->session->set_userdata('id_jenis_kerusakan', $id_jenis_kerusakan);
		redirect('diagnosa/proses','refresh');		
	}

	public function proses($kode_kondisi=null,$jawaban=null)
	{
		$id_jenis_kerusakan = $this->session->userdata('id_jenis_kerusakan');
		$jenis_kerusakan = $this->Jenis_kerusakan_model->get_by_id($id_jenis_kerusakan);
		$kondisi_awal = $this->Pertanyaan_model->get_by_id_kerusakan($id_jenis_kerusakan,1);
		$isi = null;
		$heading = null;
		if($kode_kondisi && $jawaban) 
        {
			$jawabannya = explode('-',$jawaban);
			$kode_pertanyaan = $jawabannya[0];
			$jawab = $jawabannya[1];

			$kodenya = substr($kode_kondisi,0,1);
			switch ($kodenya) 
			{
				case 'S':
					$heading = "Solusi";
					$isi = $this->Solusi_model->get_by_kode($kode_kondisi);
					$this->save_temp($kode_pertanyaan,$jawab);
					break;
				case 'T':
					$heading = "Pertanyaan";
					$isi = $this->Pertanyaan_model->get_by_kode($kode_kondisi);
					$this->save_temp($kode_pertanyaan,$jawab);
					break;
			}
		}
		
		$data = array(
			'title' => 'Proses Diagnosa' ,
			'content' => 'diagnosa/v_proses', 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'kondisi_awal' => $kondisi_awal,
			'kondisi' => $kode_kondisi ,
			'jawaban' => $jawaban ,
			'heading' => $heading ,
			'isi' => $isi ,
			'jenis_kerusakan' => $jenis_kerusakan ,
		);

		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['user'] = $user;
			$this->load->view('layout/layout', $data);
		} 
		else
		{
			$this->load->view('layout/public_layout', $data);
		}
	}

	public function del_session()
	{
		$temp_kode = $this->session->userdata('temp_kode');
		$this->db->select('*');
		$this->db->where('temp_code',$temp_kode);
		$query = $this->db->get('temp');
		$num = $query->num_rows();
		if($num <> 0 ){
			$this->db->where('temp_code', $temp_kode);
			$this->db->delete('temp');
		}
		$this->session->unset_userdata('nama_diagnosa');
		$this->session->unset_userdata('email_diagnosa');
		$this->session->unset_userdata('temp_kode');	
		$this->session->unset_userdata('id_jenis_kerusakan');
		redirect('diagnosa','refresh');
	}

	public function save_temp($kode_pertanyaan,$jawab)
	{
		$temp_kode = $this->session->userdata('temp_kode');
		$dt_temp = array(
			'temp_code' => $temp_kode ,
			'kode_pertanyaan' => $kode_pertanyaan ,
			'jawaban' => $jawab ,
		);
		$this->db->insert('temp', $dt_temp);
	}

	public function save_diagnosa($kode_solusi)
	{
		$id_jenis_kerusakan = $this->session->userdata('id_jenis_kerusakan');
		$jenis_kerusakan = $this->Jenis_kerusakan_model->get_by_id($id_jenis_kerusakan);
		$dt_diagnosa = array(
			'nama' => $this->session->userdata('nama_diagnosa') ,
			'email' => $this->session->userdata('email_diagnosa') ,
			'temp_code' => $this->session->userdata('temp_kode') ,
			'kode_jenis_kerusakan' => $jenis_kerusakan->kode ,
			'kode_solusi' => $kode_solusi ,
		);
		$this->db->insert('diagnosa', $dt_diagnosa);

		$this->session->unset_userdata('nama_diagnosa');
		$this->session->unset_userdata('email_diagnosa');
		$this->session->unset_userdata('temp_kode');	
		$this->session->unset_userdata('id_jenis_kerusakan');
		redirect('diagnosa','refresh');
	}

	public function cek_session()
	{
		print_r($this->session->all_userdata());
	}

}

/* End of file Diagnosa.php */
