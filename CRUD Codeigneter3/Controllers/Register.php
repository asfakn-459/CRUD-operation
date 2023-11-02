<?php
class Register extends CI_Controller
{
    public function index()
     {
        $this->load->view('login');
    }
    

    public function update()
    {
      
    $id = $this->input->post('stid');
    $stname = $this->input->post('stname');
    $stemail = $this->input->post('stemail');
    $stmobile = $this->input->post('stmobile');

    $this->load->model('RegModel');
    $result = $this->RegModel->updateData($stname, $stemail, $stmobile, $id);

    if ($result) {
        $this->fetchdata();
        }
    }

    public function edit($id)
    {
       $this->load->model('RegModel');
      $result['data'] = $this->RegModel->editData($id);
     $this->load->view('display-records',$result);

    }

     public function student() 
      {
        $mes ['msg']='Your Registration Form';
        $this->load->view('registration_form',$mes);
    }

    public function saveData()
    {
       
        extract($_POST);
        $data=[
            'student_name' => $stname,
            'student_email' => $stmail,
            'student_mobile' => $stmobile
        ];
        $this->load->model('RegModel');
        $result = $this->RegModel->insertData($data);

        if($result){
          $res['status'] = 'Successfully inserted';
          
          $this->load->view('registration_form', $res);
        }else{
            $res['status'] = 'Error wile inserting data';
           
        }
    }
    public function fetchdata(

    ){
        $this->load->model('RegModel');
        $result['table']=$this->RegModel->getRecord ();
        $this->load->view('display-records',$result);
        
        
    }

} 