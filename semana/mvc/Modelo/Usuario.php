<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Usuario extends Modelo
{
    const BUSCAR_POR_RA = 'SELECT * FROM usuarios WHERE ra = ? LIMIT 1';
    const INSERIR = 'INSERT INTO usuarios(ra,nome) VALUES (?, ?)';
    private $id;
    private $ra;
    private $nome;

    public function __construct(
        $ra,
        $nome,
        $id
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

    private function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->ra);
        $comando->bindValue(2, $this->nome);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function logar($ra, $senha)
    {
        $usuario = self::buscarNoBanco($ra);
        if (!$usuario) {
            $usuario = self::buscarNoLdap($ra);
        }
    }

    private static function buscarNoBanco($ra)
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
}
