<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Usuario;
use \Modelo\Codigo;

class DesafioControlador extends Controlador
{
    public function index()
    {
    	$this->verificarLogado();
        $this->visao('desafio/index.php', [
        	'mensagem' => DW3Sessao::getFlash('mensagem'),
        	'mensagemTipo' => DW3Sessao::getFlash('tipo')
        ], 'desafio.php');
    }

    public function armazenar()
    {
    	$this->verificarLogado();
    	$codigo = new Codigo($this->getUsuario()->getId(), $_POST['codigo']);
    	if ($codigo->isValido()) {
            $codigo->salvar();
    		DW3Sessao::setFlash('mensagem', 'PARABÉNS por descobrir o código.');
    		DW3Sessao::setFlash('tipo', 'success');
        } else {
            $erros = $codigo->getValidacaoErros();
    		DW3Sessao::setFlash('mensagem', $erros[0]);
    		DW3Sessao::setFlash('tipo', 'danger');
        }
        $this->redirecionar(URL_RAIZ . 'desafio');
    }
}
