<?php
namespace Modelo;

class Ldap extends Modelo
{
	public static function buscarNome($uid, $senha)
	{
		$dados = [
			'user' => [
				'user_name' => $uid,
				'password'  => $senha
			]
		];
		$curl = \curl_init(LDAP_HOST);
		\curl_setopt_array($curl, [
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HTTPHEADER => [
				'Authorization: Token token="' . LDAP_ACCESS_TOKEN . '"',
				'Content-Type: application/json'
			],
			CURLOPT_POSTFIELDS => json_encode($dados)
		]);
		$resultado = json_decode(curl_exec($curl), true);
		if ($resultado['status'] == 200 && $resultado['message'] == 'authorized') {
			return $resultado['user']['full_name'];
		}
		return false;
	}
}