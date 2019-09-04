<?php
namespace Modelo;

class Ldap extends Modelo
{
	public static function buscarNome($uid, $senha)
	{
		$conexao = \ldap_connect(LDAP_URI);
		if ($conexao) {
		    \ldap_set_option($conexao, LDAP_OPT_PROTOCOL_VERSION, 3);
    		\ldap_set_option($conexao, LDAP_OPT_REFERRALS, 0);
    	} else {
    		throw new Exception("ERRO AO CONECTAR AO DNS", 1);
    	}
		$bind = false;
		foreach (BASE_DNS_ARRAY as $baseDns) {
			$baseDnString = "uid={$uid},{$baseDns}";
			$bind = \ldap_bind($conexao, $baseDnString, $senha);
			if ($bind) {
				break;
			}
	    }
	    if (!$bind) {
	    	return null;
	    }
	    $leitor = \ldap_read($conexao, $baseDnString, LDAP_FILTRO, LDAP_ATRIBUTOS_ARRAY);
	    if (!$leitor) {
	    	throw new Exception("ERRO DO LDAP: ldap_read", 1);
	    }
	    $informacoes = \ldap_get_entries($conexao, $leitor);
	    if (!$informacoes) {
	    	throw new Exception("ERRO DO LDAP: ldap_get_entries", 1);
	    }
	    return $informacoes[0][LDAP_ATRIBUTO_NOME][0];
	}
}