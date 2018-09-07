<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grade extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grade_model');
    } 

    /*
     * Listing of grades
     */
    function index()
    {
        $data['grades'] = $this->Grade_model->get_all_grades();
        
        $data['_view'] = 'grade/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new grade
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('studentname','Studentname','required|max_length[50]|alpha_numeric');
		$this->form_validation->set_rules('studentpercent','Studentpercent','required|max_length[5]|is_natural|less_than[101]');
		$this->form_validation->set_rules('studentgrade','Studentgrade','required|max_length[5]|alpha');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'studentname' => $this->input->post('studentname'),
				'studentpercent' => $this->input->post('studentpercent'),
				'studentgrade' => $this->input->post('studentgrade'),
            );
            
            $grade_id = $this->Grade_model->add_grade($params);
            redirect('grade/index');
        }
        else
        {            
            $data['_view'] = 'grade/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a grade
     */
    function edit($studentid)
    {   
        // check if the grade exists before trying to edit it
        $data['grade'] = $this->Grade_model->get_grade($studentid);
        
        if(isset($data['grade']['studentid']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('studentname','Studentname','required|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('studentpercent','Studentpercent','required|max_length[5]|is_natural');
			$this->form_validation->set_rules('studentgrade','Studentgrade','required|max_length[5]|alpha');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'studentname' => $this->input->post('studentname'),
					'studentpercent' => $this->input->post('studentpercent'),
					'studentgrade' => $this->input->post('studentgrade'),
                );

                $this->Grade_model->update_grade($studentid,$params);            
                redirect('grade/index');
            }
            else
            {
                $data['_view'] = 'grade/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The grade you are trying to edit does not exist.');
    } 

    /*
     * Deleting grade
     */
    function remove($studentid)
    {
        $grade = $this->Grade_model->get_grade($studentid);

        // check if the grade exists before trying to delete it
        if(isset($grade['studentid']))
        {
            $this->Grade_model->delete_grade($studentid);
            redirect('grade/index');
        }
        else
            show_error('The grade you are trying to delete does not exist.');
    }
    
}
