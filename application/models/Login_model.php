<?php

class Login_model extends CI_Model {


	function login($codigo,$senha){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('codigo',$codigo);
		$this->db->where('senha',$senha);
		$resultado = $this->db->get()->result_array();
		return  reset($resultado);
		$usuario = $this->db->get()->result_array();
		$usuario = reset($usuario);
		if ( $usuario )
			$senha = password_verify($senha, $usuario['senha']);
		if ($senha == $usuario['senha']) {
			return $usuario;
		}
	}
}












