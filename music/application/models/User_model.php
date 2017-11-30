<?php
class User_model extends CI_Model {

  function authenticate($user, $pass) {
    $pass = md5($pass);
    $query = $this->db->get_where('users', array('username' => $user, 'password' => $pass));

	  return $query->result_object();
  }

  function select ($user){
    $query = $this->db->get_where('users', array('username' => $user));
    
        return $query->result_object();
  }



  function save($user){
    $user['password']= md5( $user['password']);
    $this->db->insert('users', $user);
    $insert_id = $this->db->insert_id();
 
    return  $insert_id;
 }



  function all()
  {
    $query = $this->db->get('users');

    return $query->result_object();
  }
function delete($user){
  $this->db->where('username', $user);
  $this->db->delete('users');

}

function update($user,$us){


  $this->db->where('username', $us);
  $this->db->update('users', $user);

  return true;

}


}
