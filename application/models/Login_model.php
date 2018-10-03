<?php

class Login_model extends CI_Model {


	function login($codigo,$senha){
		$this->db->from('usuarios');
		$this->db->where('codigo',$codigo);

		$usuario = $this->db->get()->result_array();
		$usuario = reset($usuario);

		if ( $usuario )
			$senha = password_verify($senha, $usuario['senha']);

		return $usuario;
	}
}










