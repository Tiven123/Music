<?php 
class Gene_inst_model extends CI_Model {
   public function __construct()
        {
                parent::__construct();
                $this->load->database();
   }
    //
    function obtener_instrumentos(){
        $this->db->select('*');
        $data = $this->db->get('instrumentos');
        return $data->result_object();
    }
    function obtener_generos(){
        $this->db->select('*');
        $data = $this->db->get('generos');
        return $data->result_object();
    }

    function instrumento($instru){

        $this->db->select('*');
        $this->db->where('id',$instru);
        $data = $this->db->get('instrumentos');
        //SELECT * FROM instru_user where instru_user.id_instrumento="'.$sqlInstrumento.'"";
        $dato =$data->result_array();
        $this->db->select('*');
        $this->db->where('id_instrumento',$dato[0]['id']);
        $data = $this->db->get('instru_user');
        $dato =$data->result_object();
        $arreglo = [];
        foreach ($dato as $key => $value) {
            //array_push($arreglo, $value->id_user);
            $this->db->select('*');
            $this->db->where('id', $value->id_user);
            $usuarios = $this->db->get('users');
            array_push($arreglo, $usuarios->result_array());
        }
        return $arreglo;
    }

    function instrumentos_tocar(){
        $registros=[];
        //SELECT instru_user.id_user,instru_user.id_instrumento FROM instru_user where instru_user.id_user=3
        $query = $this->db->query("SELECT users.id,users.name, instrumentos.nombre FROM instru_user INNER JOIN users INNER JOIN instrumentos WHERE instru_user.id_user=users.id and instru_user.id_instrumento = instrumentos.id");

        foreach ($query->result() as $row)
        {
            array_push($registros, $row);
        }
       
        return $registros;
    }
function generos_gustar(){
        $registros=[];
        //SELECT instru_user.id_user,instru_user.id_instrumento FROM instru_user where instru_user.id_user=3
        $query = $this->db->query("SELECT users.id,users.name, generos.nombre FROM gender_user INNER JOIN users INNER JOIN generos WHERE gender_user.id_user=users.id and gender_user.id_gender = generos.id");

        foreach ($query->result() as $row)
        {
            array_push($registros, $row);
        }
       
        return $registros;
    }

    function generos($gen){

        $this->db->select('*');
        $this->db->where('id',$gen);
        $data = $this->db->get('generos');
        //SELECT * FROM instru_user where instru_user.id_instrumento="'.$sqlInstrumento.'"";
        $dato =$data->result_array();
        $this->db->select('*');
        $this->db->where('id_gender',$dato[0]['id']);
        $data = $this->db->get('gender_user');
        $dato =$data->result_object();
        $arreglo = [];
        foreach ($dato as $key => $value) {
            //array_push($arreglo, $value->id_user);
            $this->db->select('*');
            $this->db->where('id', $value->id_user);
            $usuarios = $this->db->get('users');
            array_push($arreglo, $usuarios->result_array());
        }
        return $arreglo;
    }
}

?>
