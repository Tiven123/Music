<?php
class Music_model extends CI_Model {


    function allInstru()
    {
      $query = $this->db->get('instrumentos');
  
      return $query->result_object();
    }

    
    function allGenders()
    {
      $query = $this->db->get('generos');
  
      return $query->result_object();
    }

    function saveInstrum($user_instru)
    {
      $r = $this->db->insert('instru_user', $user_instru);
      return $r;
    }
  
    
    function saveGender($user_gender)
    {
      $r = $this->db->insert('gender_user', $user_gender);
      return $r;
    }


  }
  ?>