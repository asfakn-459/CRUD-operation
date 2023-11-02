<?php
class RegModel extends CI_Model
{
    public function updateData($name, $email, $mobile, $id)
    {
      $this->load->database();
      $data = [
        'student_name' => $name,
        'student_email' => $email,
        'student_mobile' => $mobile
    ];

      $this->db->where('id',$id);
      return $this->db->update('studentreg',$data);
    }
    public function editData($id)
    {
        $this->load->database();
        $this->db->where('id',$id);
       return  $this->db->get('studentreg')->result();
    }
    public function insertData($data){
       $this->load->database();

       return $this->db->insert('studentreg',$data);
       
    }
    public function receive_segment($data)
    {
        foreach ($data as $p) {
            echo $p . '<br>';
        }
    }


    public function getRecord()
    {
        $this->load->database();

        return $this->db->get('studentreg')->result();
        
    }
}