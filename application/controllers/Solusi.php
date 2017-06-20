<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Solusi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Solusi_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $solusi = $this->Solusi_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Solusi', '/solusi');
        $data = array(
            'title'       => 'Solusi' ,
            'content'     => 'solusi/solusi_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'solusi_data' => $solusi
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Solusi', '/solusi');
        $this->breadcrumbs->push('detail', '/solusi/read');
        $row = $this->Solusi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Solusi' ,
                'content'     => 'solusi/solusi_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'id' => $row->id,
				'kode' => $row->kode,
				'solusi' => $row->solusi,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('solusi'));
        }
    }

    public function create($from=null) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Solusi', '/solusi');
        $this->breadcrumbs->push('tambah', '/solusi/create');
        $data = array(
            'title'       => 'Solusi' ,
            'content'     => 'solusi/solusi_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('solusi/create_action/'.$from),
		    'id' => set_value('id'),
		    'kode' => set_value('kode'),
		    'solusi' => set_value('solusi'),
		);
        $this->load->view('layout/layout', $data);
    }
    
    public function create_action($from=null) 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kode' => $this->input->post('kode',TRUE),
				'solusi' => $this->input->post('solusi',TRUE),
		    );

            $this->Solusi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            if(!isset($from)){
                redirect(site_url('solusi'));
            } else {
                redirect(site_url('jenis_kerusakan/pertanyaan/'.$from));
            }
            
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Solusi', '/solusi');
        $this->breadcrumbs->push('update', '/solusi/update');
        
        $row = $this->Solusi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Solusi' ,
                'content'     => 'solusi/solusi_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('solusi/update_action'),
				'id' => set_value('id', $row->id),
				'kode' => set_value('kode', $row->kode),
				'solusi' => set_value('solusi', $row->solusi),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('solusi'));
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
				'solusi' => $this->input->post('solusi',TRUE),
		    );

            $this->Solusi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('solusi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Solusi_model->get_by_id($id);

        if ($row) {
            $this->Solusi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('solusi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('solusi'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('solusi', 'solusi', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Solusi.php */
/* Location: ./application/controllers/Solusi.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2017-05-30 16:38:50 */
/* http://bhas.web.id */