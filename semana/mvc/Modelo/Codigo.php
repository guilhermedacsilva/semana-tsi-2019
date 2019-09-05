<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Codigo extends Modelo
{
    const BUSCAR_POR_NOME = 'SELECT id FROM codigos WHERE nome = ? LIMIT 1';
    const BUSCAR_CODIGO_USADO = 'SELECT * FROM usuarios_codigos WHERE usuario_id = ? AND codigo_id = ? LIMIT 1';
    const BUSCAR_QNT_UTILIZADO = 'SELECT count(codigo_id) FROM usuarios_codigos WHERE codigo_id = ?';
    const INSERIR_COM_USUARIO = 'INSERT INTO usuarios_codigos(usuario_id, codigo_id, pontos) VALUES (?, ?, ?)';
    private $usuarioId;
    private $codigoNome;
    private $codigoId;

    public function __construct($usuarioId, $codigoNome) {
        $this->usuarioId = $usuarioId;
        $this->codigoNome = $codigoNome;
    }

    protected function verificarErros()
    {
    	$codigo = self::buscarPorNome($this->codigoNome);
        if (!$codigo) {
            $this->setErroMensagem(0, 'Código inválido');
        } elseif (self::codigoJaUsado($this->usuarioId, $codigo['id'])) {
            $this->setErroMensagem(0, 'Código já utilizado');
        } else {
        	$this->codigoId = $codigo['id'];
        }
    }

    private static function buscarPorNome($nome)
    {
    	$comando = DW3BancoDeDados::prepare(self::BUSCAR_POR_NOME);
        $comando->bindValue(1, $nome);
        $comando->execute();
        return $comando->fetch();
    }

    private static function codigoJaUsado($usuarioId, $codigoId)
    {
    	$comando = DW3BancoDeDados::prepare(self::BUSCAR_CODIGO_USADO);
        $comando->bindValue(1, $usuarioId);
        $comando->bindValue(2, $codigoId);
        $comando->execute();
        return $comando->fetch();
    }

    public function salvar()
    {
    	$qntUtilizado = self::quantidadeUtilizado($this->codigoId);
    	$pontos = max(10 - $qntUtilizado[0], 7);
        $comando = DW3BancoDeDados::prepare(self::INSERIR_COM_USUARIO);
        $comando->bindValue(1, $this->usuarioId);
        $comando->bindValue(2, $this->codigoId);
        $comando->bindValue(3, $pontos);
        $comando->execute();
    }

    private static function quantidadeUtilizado($codigoId)
    {
    	$comando = DW3BancoDeDados::prepare(self::BUSCAR_QNT_UTILIZADO);
        $comando->bindValue(1, $codigoId);
        $comando->execute();
        return $comando->fetch();
    }
}