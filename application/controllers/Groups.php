<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Groups_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $groups = $this->Groups_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Kelola User', '/users');
        $this->breadcrumbs->push('Level User', '/groups');

        $data = array(
            'title'       => 'Level User' ,
            'content'     => 'groups/groups_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'groups_data' => $groups
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Kelola User', '/users');
        $this->breadcrumbs->push('Level User', '/groups');
        $this->breadcrumbs->push('detail', '/groups/read');
        $row = $this->Groups_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Level User' ,
                'content'     => 'groups/groups_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'id' => $row->id,
				'name' => $row->name,
				'description' => $row->description,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groups'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Kelola User', '/users');
        $this->breadcrumbs->push('Level User', '/groups');
        $this->breadcrumbs->push('tambah', '/groups/create');
        $data = array(
            'title'       => 'Level User' ,
            'content'     => 'groups/groups_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('groups/create_action'),
		    'id' => set_value('id'),
		    'name' => set_value('name'),
		    'description' => set_value('description'),
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
				'name' => $this->input->post('name',TRUE),
				'description' => $this->input->post('description',TRUE),
		    );

            $this->Groups_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('groups'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Kelola User', '/users');
        $this->breadcrumbs->push('Level User', '/groups');
        $this->breadcrumbs->push('update', '/groups/update');
        
        $row = $this->Groups_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Level User' ,
                'content'     => 'groups/groups_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('groups/update_action'),
				'id' => set_value('id', $row->id),
				'name' => set_value('name', $row->name),
				'description' => set_value('description', $row->description),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groups'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'name' => $this->input->post('name',TRUE),
				'description' => $this->input->post('description',TRUE),
		    );

            $this->Groups_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('groups'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Groups_model->get_by_id($id);

        if ($row) {
            $this->Groups_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('groups'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groups'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "groups.xls";
        $judul = "groups";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Name");
		xlsWriteLabel($tablehead, $kolomhead++, "Description");

		foreach ($this->Groups_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->name);
		    xlsWriteLabel($tablebody, $kolombody++, $data->description);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=groups.doc");

        $data = array(
            'groups_data' => $this->Groups_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('groups/groups_doc',$data);
    }

}

/* End of file Groups.php */
/* Location: ./application/controllers/Groups.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-09-28 04:35:32 */
/* http://bhas.web.id */