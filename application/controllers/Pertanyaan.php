<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pertanyaan_model');
        $this->load->model('Jenis_kerusakan_model');
        $this->load->model('Solusi_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $pertanyaan = $this->Pertanyaan_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Pertanyaan', '/pertanyaan');

        $data = array(
            'title'       => 'Pertanyaan' ,
            'content'     => 'pertanyaan/pertanyaan_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            'pertanyaan_data' => $pertanyaan
        );

        $this->load->view('layout/layout', $data);
    }

    public function pertanyaan_single($id_jenis_kerusakan)
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Pertanyaan', '/pertanyaan');
        $this->breadcrumbs->push('Tambah', '/pertanyaan/create');
        $jenis_kerusakan = $this->Jenis_kerusakan_model->get_by_id($id_jenis_kerusakan);
        $data = array(
            'title'       => 'Pertanyaan' ,
            'content'     => 'pertanyaan/pertanyaan_single', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            'button' => 'Simpan',
            'action' => site_url('pertanyaan/create_action'),
		    'id' => set_value('id'),
		    'pertanyaan' => set_value('pertanyaan'),
		    'kode' => set_value('kode'),
		    'id_jenis_kerusakan' => $id_jenis_kerusakan,
		    'ya' => set_value('ya'),
		    'tidak' => set_value('tidak'),
            'jenis_kerusakan' => $jenis_kerusakan->jenis_kerusakan,
		);
        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Pertanyaan', '/pertanyaan');
        $this->breadcrumbs->push('detail', '/pertanyaan/read');
        $row = $this->Pertanyaan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Pertanyaan' ,
                'content'     => 'pertanyaan/pertanyaan_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'id' => $row->id,
				'pertanyaan' => $row->pertanyaan,
				'kode' => $row->kode,
				'id_jenis_kerusakan' => $row->id_jenis_kerusakan,
				'ya' => $row->ya,
				'tidak' => $row->tidak,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pertanyaan'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Pertanyaan', '/pertanyaan');
        $this->breadcrumbs->push('tambah', '/pertanyaan/create');
        $data = array(
            'title'       => 'Pertanyaan' ,
            'content'     => 'pertanyaan/pertanyaan_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('pertanyaan/create_action'),
		    'id' => set_value('id'),
		    'pertanyaan' => set_value('pertanyaan'),
		    'kode' => set_value('kode'),
		    'id_jenis_kerusakan' => set_value('id_jenis_kerusakan'),
		    'ya' => set_value('ya'),
		    'tidak' => set_value('tidak'),
		);
        $this->load->view('layout/layout', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'pertanyaan' => $this->input->post('pertanyaan',TRUE),
				'kode' => $this->input->post('kode',TRUE),
				'id_jenis_kerusakan' => $this->input->post('id_jenis_kerusakan',TRUE),
				'ya' => $this->input->post('ya',TRUE),
				'tidak' => $this->input->post('tidak',TRUE),
		    );

            $this->Pertanyaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            if($this->input->post('from',TRUE)){
                redirect(site_url('jenis_kerusakan/pertanyaan/'.$this->input->post('id_jenis_kerusakan',TRUE)));
            } else {
                redirect(site_url('pertanyaan'));
            }
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Pertanyaan', '/pertanyaan');
        $this->breadcrumbs->push('update', '/pertanyaan/update');
        
        $row = $this->Pertanyaan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Pertanyaan' ,
                'content'     => 'pertanyaan/pertanyaan_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('pertanyaan/update_action'),
				'id' => set_value('id', $row->id),
				'pertanyaan' => set_value('pertanyaan', $row->pertanyaan),
				'kode' => set_value('kode', $row->kode),
				'id_jenis_kerusakan' => set_value('id_jenis_kerusakan', $row->id_jenis_kerusakan),
				'ya' => set_value('ya', $row->ya),
				'tidak' => set_value('tidak', $row->tidak),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pertanyaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'pertanyaan' => $this->input->post('pertanyaan',TRUE),
				'kode' => $this->input->post('kode',TRUE),
				'id_jenis_kerusakan' => $this->input->post('id_jenis_kerusakan',TRUE),
				'ya' => $this->input->post('ya',TRUE),
				'tidak' => $this->input->post('tidak',TRUE),
		    );

            $this->Pertanyaan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pertanyaan'));
        }
    }
    
    public function delete($id,$from="") 
    {
        $row = $this->Pertanyaan_model->get_by_id($id);

        if ($row) {
            $this->Pertanyaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            if(!isset($from)){
                redirect(site_url('pertanyaan'));
            } else {
                redirect(site_url('jenis_kerusakan/pertanyaan/'.$from));
            }
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            if(!isset($from)){
                redirect(site_url('pertanyaan'));
            } else {
                redirect(site_url('jenis_kerusakan/pertanyaan/'.$from));
            }
        }
    }

    public function json_kondisi() {
        $kode       =  $this->input->post('kode',TRUE); //variabel kunci yang di bawa dari input text id kode
        $pertanyaan      =  $this->Pertanyaan_model->get_all();   //query    model
        $solusi = $this->Solusi_model->get_all();
        $data       =  array();
        foreach ($pertanyaan as $d) {
            $data[]     =  $d->kode."-".$d->pertanyaan;
        }
        foreach ($solusi as $d) {
            $data[]     = $d->kode."-".$d->solusi;
        }
        echo json_encode($data);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('id_jenis_kerusakan', 'id jenis kerusakan', 'trim|required');
		$this->form_validation->set_rules('ya', 'ya', 'trim|required');
		$this->form_validation->set_rules('tidak', 'tidak', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pertanyaan.php */
/* Location: ./application/controllers/Pertanyaan.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2017-05-30 15:30:36 */
/* http://bhas.web.id */