<?php

class Login_model extends CI_Model {
	function login($codigo, $senha) {
		$usuario = $this->db
		->where('codigo', $codigo)
		->get('usuarios')
		->result_array();

		$usuario = reset($usuario);
		if ( !$usuario )
			return FALSE;

		if ( !password_verify($senha, $usuario['senha']) )
			return FALSE;
		return $usuario;

	}
}