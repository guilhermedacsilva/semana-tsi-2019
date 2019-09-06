<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Usuario extends Modelo
{
    const BUSCAR_POR_ID = 'SELECT * FROM usuarios WHERE id = ? LIMIT 1';
    const BUSCAR_POR_RA = 'SELECT * FROM usuarios WHERE ra = ? LIMIT 1';
    const INSERIR = 'INSERT INTO usuarios(ra,nome) VALUES (?, ?)';
    const CALCULAR_PONTUACAO = 'SELECT sum(pontos) FROM usuarios_codigos WHERE usuario_id = ?';
    const BUSCAR_CODIGOS_RESOLVIDOS = 'SELECT codigo_id FROM usuarios_codigos WHERE usuario_id = ?';
    const RANKING = 'SELECT u.nome, sum(uc.pontos) pontuacao FROM usuarios u JOIN usuarios_codigos uc ON (u.id = uc.usuario_id) GROUP BY u.nome ORDER BY pontuacao DESC';
    private $id;
    private $ra;
    private $nome;
    private $codigosResolvidos;

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

    public function getNome()
    {
        return $this->nome;
    }

    public function getPontuacao()
    {
        $comando = DW3BancoDeDados::prepare(self::CALCULAR_PONTUACAO);
        $comando->bindValue(1, $this->id);
        $comando->execute();
        $registro = $comando->fetch();
        return $registro[0] == null ? 0 : $registro[0];
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

    public function isCodigoResolvido($codigoId)
    {
        if ($this->codigosResolvidos == null) {
            $comando = DW3BancoDeDados::prepare(self::BUSCAR_CODIGOS_RESOLVIDOS);
            $comando->bindValue(1, $this->id);
            $comando->execute();
            $this->codigosResolvidos = array_column($comando->fetchAll(), 'codigo_id');
        }
        return array_search($codigoId, $this->codigosResolvidos) !== false;
    }

    public static function ranking()
    {
        $comando = DW3BancoDeDados::query(self::RANKING);
        return $comando->fetchAll();
    }
}
