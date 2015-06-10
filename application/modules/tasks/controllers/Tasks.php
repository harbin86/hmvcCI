<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tasks_model','tks');
	}

	public function index()
	{
		$query = $this->db->order_by('priority')->get('tasks');
		$data['rows'] = $query->result();

		$data['module'] = 'tasks';
		$data['view_file'] = 'index';
		echo Modules::run('template/one_col',$data);

		// $this->load->view('index',$data);
	}

	public function create()
	{
		$data['id'] = $this->input->post('id',true);
		$data['title'] = $this->input->post('title',true);
		$data['priority'] = $this->input->post('priority',true);

		$data['module'] = 'tasks';
		$data['view_file'] = 'form';
		echo Modules::run('template/one_col',$data);
	}

	public function store()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','title','required|min_length[3]');
		$this->form_validation->set_rules('priority','priority','required|numeric|max_length[2]');

		
		if($this->form_validation->run() == false)
		{
			$this->create();
		}
		else
		{
			$data = 
				[
					'id' => $this->input->post('id'),
					'title' => $this->input->post('title'),
					'priority' => $this->input->post('priority')
				];

			if(isset($data['id']))
			{
				$this->db->where('id',$data['id'])->update('tasks',$data);
			}
			else
			{	
				$this->db->insert('tasks',$data);
			}

			redirect('tasks/index');
		}
	}

	public function edit($id)
	{
		$query = $this->db->get_where('tasks',['id' => $id]);
		$row = $query->row();

		$data['id'] = $row->id;
		$data['title'] = $row->title;
		$data['priority'] =$row->priority;

		$data['module'] = 'tasks';
		$data['view_file'] = 'form';
		echo Modules::run('template/one_col',$data);
	}

	// public function update()
	// {
	// 	$data = 
	// 		[
	// 			'id' => $this->input->post('id'),
	// 			'title' => $this->input->post('title'),
	// 			'priority' => $this->input->post('priority')
	// 		];
	// 	$this->db->where('id',$data['id'])->update('tasks',$data);
	// }

	public function destroy($id)
	{
		$this->db->where('id',$id)->delete('tasks');
		redirect('tasks/index');
	}

}
