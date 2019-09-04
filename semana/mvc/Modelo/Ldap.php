<?php
namespace Modelo;

class Ldap extends Modelo
{
	public static function buscarNome($uid, $senha)
	{
		echo 0;
		$host = substr(LDAP_URI, 8, 11);
		echo $host;
		$conexao = \ldap_connect($host, 389);
		echo 1;
		if ($conexao) {
			echo 2;
		    \ldap_set_option($conexao, LDAP_OPT_PROTOCOL_VERSION, 3);
    		\ldap_set_option($conexao, LDAP_OPT_REFERRALS, 0);
    	} else {
    		throw new Exception("ERRO AO CONECTAR AO DNS", 1);
    	}
		$bind = false;
		echo 3;
		foreach (BASE_DNS_ARRAY as $baseDns) {
			$baseDnString = "uid={$uid},{$baseDns}";
			$bind = \ldap_bind($conexao, $baseDnString, $senha);
			if ($bind) {
				break;
			}
	    }
		echo 4;
	    if (!$bind) {
	    	return null;
	    }
		echo 5;
	    $leitor = \ldap_read($conexao, $baseDnString, LDAP_FILTRO, LDAP_ATRIBUTOS_ARRAY);
	    if (!$leitor) {
	    	throw new Exception("ERRO DO LDAP: ldap_read", 1);
	    }
		echo 6;
	    $informacoes = \ldap_get_entries($conexao, $leitor);
	    if (!$informacoes) {
	    	throw new Exception("ERRO DO LDAP: ldap_get_entries", 1);
	    }
	    return $informacoes[0][LDAP_ATRIBUTO_NOME][0];
	}
}