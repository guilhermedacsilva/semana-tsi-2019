<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Usuario extends Modelo
{
    const BUSCAR_POR_ID = 'SELECT * FROM usuarios WHERE id = ? LIMIT 1';
    const BUSCAR_POR_RA = 'SELECT * FROM usuarios WHERE ra = ? LIMIT 1';
    const INSERIR = 'INSERT INTO usuarios(ra,nome) VALUES (?, ?)';
    private $id;
    private $ra;
    private $nome;

    public function __construct(
        $ra,
        $nome,
        $id = null
    ) {
        $this->id = $id;
        $this->ra = $ra;
        $this->nome = $nome;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRa()
    {
        return $this->ra;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public static function logar($ra, $senha)
    {
        $nome = Ldap::buscarNome($ra, $senha);
        if (!$nome) {
            return null;
        }
        $usuario = self::buscarPorRa($ra);
        if (!$usuario) {
            $usuario = new Usuario($ra, $nome);
            $usuario->inserir();
        }
        return $usuario;
    }

    private static function buscarPorRa($ra)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_POR_RA);
        $comando->bindValue(1, $ra);
        $comando->execute();
        $objeto = null;
        $registro = $comando->fetch();
        if ($registro) {
            $objeto = new Usuario(
                $registro['ra'],
                $registro['nome'],
                $registro['id']
            );
        }
        return $objeto;
    }

    public static function buscarPorId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_POR_ID);
        $comando->bindValue(1, $id);
        $comando->execute();
        $objeto = null;
        $registro = $comando->fetch();
        if ($registro) {
            $objeto = new Usuario(
                $registro['ra'],
                $registro['nome'],
                $registro['id']
            );
        }
        return $objeto;
    }

    private function inserir()
    {
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->ra);
        $comando->bindValue(2, $this->nome);
        $comando->execute();
    }
}
