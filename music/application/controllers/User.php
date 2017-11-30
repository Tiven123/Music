<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login()
	{
		$this->load->view('users/login');
	}

  public function create()
  {
	$this->load->model('music_model');

	$instrums = $this->music_model->allInstru();


	$genders = $this->music_model->allGenders();

	$data['instruments'] = $instrums;
	$data['generos'] = $genders;

    $this->load->view('users/create', $data);
  }

  /**
	 * This method will save a new user
	 */
	public function save() {
		// objener valores
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
	
     $config['upload_path'] = 'application/upload/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $this->load->library('upload', $config);
		 if(!$this->upload->do_upload()){
			/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/
					$error=array('error' => $this->upload->display_errors());
				var_dump($error);
				//  echo "<script>jQuery(function(){swal(\"¡Ooh!\", \"$error\", \"error\");});</script>";
	}
	   $datos["img"]=$this->upload->data();
		 $nombre =$datos["img"]["file_name"];
		
    $user = array(
			'name' => $name,
			'address' => $address,
			'email' => $email,
			'photo' => $nombre,
      'username' => $username,
			'password'=> $pass
			);
			// que devuelva id
			$id = $this->User_model->save($user);

			//echo "ID".$id;

		//	$instrumentos = $this->input->post('instrumentos');
			$this->load->model('music_model');
			
			
			foreach ($_POST['instrumentos'] as $element)
			{
				$this->db->select('id');
				$this->db->where('nombre',$element);
				$data = $this->db->get('instrumentos');
				$data =$data->result_array();
			
				$instru_user = array(
					
					'id_user' => $id,
					'id_instrumento'=> $data[0]['id']
					);
	$r=	$this->music_model->saveInstrum($instru_user);
			}


			foreach ($_POST['generos'] as $element)
			{	
				$this->db->select('id');
				$this->db->where('nombre',$element);
				$data = $this->db->get('generos');
				$data =$data->result_array();

					$gender_user = array(
						
						'id_user' => $id,
						'id_gender'=> $data[0]['id']
						);
	
			$r=$this->music_model->saveGender($gender_user);
	
				}	


    //$r = $this->User_model->save($user);

		if($id>0) {
     // $this->session->set_flashdata('message','User saved');
		 redirect('usuario/login');
		} else {
    //  $this->session->set_flashdata('message','There was an error saving the user');
		//	redirect('usuario/crear');
		}
	}

  /**
	 * This method will take username/password to authenticate from params
	 */
	public function authenticate() {
		// objener valores
    $user = $this->input->post('username');
		$pass = $this->input->post('password');

    // consultar BD
    // si existe redirecciono a la pagina de inicio
    // load the model, can also be loaded from the autoload
		// $this->load->model('User_model');

    $r = $this->User_model->authenticate($user, $pass);

		if(sizeof($r) > 0) {
			// $this->session->set_userdata('user', $r[0]);
			// redirect('/');
      $name = $r[0]->name;
      echo "Hello $name";
		} else {
			// $this->session->set_flashdata('error', 'Password or User invalid');
			// redirect('/');
      echo "Not valid user";
		}
	}

  /**
	 * This method will list all existing users
	 */
	public function index() {

    $r = $this->User_model->all();

    $data['users'] = $r;
    $data['title'] = 'List of Users';

		$this->load->view('users/index', $data);
	}

	public function del_Upd(){
		if (isset($_POST['delete'])) {
			
							$this->delete(key($_POST['delete']));
			
					 } else if (isset($_POST['update'])) {

						$r = key($_POST['update']);

						$user = $this->User_model->select($r);

						$data['user'] = $user;
						$data['username'] =$r;
						
						
						$this->load->view('users/update',$data);
			
					 }
	}

	public function delete(	$user){
	
    $r = $this->User_model->select($user);
		
				if(sizeof($r) > 0) {
				
					$this->User_model->delete($user);

					echo "usuario eliminado";
				} else {
				
					echo "Not valid user";
				}
	}


	public function update(){
		$us =$this->uri->segment(3);
		
	echo $us;
		$username = $this->input->post('username');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');

    $user = array(
        'username' => $username,
        'first_name' => $first_name,
				'last_name' => $last_name
      );


    $r = $this->User_model->update($user,$us);

		if($r) {
			redirect('usuario/listado');
		} 

	}

}
