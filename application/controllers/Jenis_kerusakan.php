<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_kerusakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_kerusakan_model');
        $this->load->model('Pertanyaan_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $jenis_kerusakan = $this->Jenis_kerusakan_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Data kerusakan', '/jenis_kerusakan');

        $data = array(
            'title'       => 'Data Kerusakan' ,
            'content'     => 'jenis_kerusakan/jenis_kerusakan_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'jenis_kerusakan_data' => $jenis_kerusakan
        );

        $this->load->view('layout/layout', $data);
    }

    public function pertanyaan($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Data Kerusakan', '/jenis_kerusakan');
        $this->breadcrumbs->push('Pertanyaan', '/jenis_kerusakan/pertanyaan');
        $row = $this->Jenis_kerusakan_model->get_by_id($id);
        $data_pertanyaan = $this->Pertanyaan_model->get_by_kerusakan($id); 
        if ($row) {
            $data = array(
                'title'       => 'Pertanyaan' ,
                'content'     => 'jenis_kerusakan/jenis_kerusakan_pertanyaan', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                'pertanyaan_data' => $data_pertanyaan,
				'id' => $row->id,
				'kode' => $row->kode,
				'jenis_kerusakan' => $row->jenis_kerusakan,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kerusakan'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Jenis_kerusakan', '/jenis_kerusakan');
        $this->breadcrumbs->push('tambah', '/jenis_kerusakan/create');
        $data = array(
            'title'       => 'Jenis_kerusakan' ,
            'content'     => 'jenis_kerusakan/jenis_kerusakan_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('jenis_kerusakan/create_action'),
		    'id' => set_value('id'),
		    'kode' => set_value('kode'),
		    'jenis_kerusakan' => set_value('jenis_kerusakan'),
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
				'kode' => $this->input->post('kode',TRUE),
				'jenis_kerusakan' => $this->input->post('jenis_kerusakan',TRUE),
		    );

            $this->Jenis_kerusakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_kerusakan'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Jenis_kerusakan', '/jenis_kerusakan');
        $this->breadcrumbs->push('update', '/jenis_kerusakan/update');
        
        $row = $this->Jenis_kerusakan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Jenis_kerusakan' ,
                'content'     => 'jenis_kerusakan/jenis_kerusakan_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('jenis_kerusakan/update_action'),
				'id' => set_value('id', $row->id),
				'kode' => set_value('kode', $row->kode),
				'jenis_kerusakan' => set_value('jenis_kerusakan', $row->jenis_kerusakan),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kerusakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'kode' => $this->input->post('kode',TRUE),
				'jenis_kerusakan' => $this->input->post('jenis_kerusakan',TRUE),
		    );

            $this->Jenis_kerusakan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_kerusakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_kerusakan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_kerusakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_kerusakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kerusakan'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('jenis_kerusakan', 'jenis kerusakan', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_kerusakan.php */
/* Location: ./application/controllers/Jenis_kerusakan.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2017-05-30 15:05:23 */
/* http://bhas.web.id */