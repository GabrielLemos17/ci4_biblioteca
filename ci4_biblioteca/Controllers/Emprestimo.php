<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmprestimoModel;
use App\Models\LivroModel;
use App\Models\AlunoModel;
use App\Models\UsuarioModel;
use App\Models\ObraModel;
use CodeIgniter\Session\Session;



class Emprestimo extends BaseController
{
    private $emprestimoModel;
    private $livroModel;
    private $alunoModel;
    private $usuarioModel;
    private $obraModel;
    
    public function __construct(){
        $this->emprestimoModel = new EmprestimoModel();
        $this->livroModel = new LivroModel();
        $this->alunoModel = new AlunoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->obraModel = new ObraModel();
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $emprestimo = $this->emprestimoModel->findAll();
        $livro = $this->livroModel->findAll();
        $aluno = $this->alunoModel->findAll();
        $usuario = $this->usuarioModel->findAll();
        $obra = $this->obraModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/index.php',['listaEmprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaAluno'=> $aluno,'listaUsuario'=>$usuario,'listaObra' => $obra]);
        echo view('_partials/footer');
    }

    public function cadastrar(){
        $emprestimo = $this->request->getPost();
        $this->emprestimoModel->save($emprestimo);
        $this->livroModel->update($emprestimo['id_livro'], ['disponivel' => 0]);
        return redirect()->to('Emprestimo/index');
    }
    
    public function editar($id){
        $emprestimo = $this->emprestimoModel->find($id);
        $livro = $this->livroModel->findAll();
        $aluno = $this->alunoModel->findAll();
        $obra = $this->obraModel->findAll();
        $usuario = $this->usuarioModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/edit',['emprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaAluno'=> $aluno,'listaUsuario'=>$usuario,'listaObra' => $obra]);
        echo view('_partials/footer');
    }

    public function salvar(){
        $emprestimo = $this->request->getPost();
        $this->emprestimoModel->save($emprestimo);
        $this->livroModel->update($emprestimo['id_livro_antigo'], ['disponivel' => 1]);
        $this->livroModel->update($emprestimo['id_livro'], ['disponivel' => 0]);
        return redirect()->to('Emprestimo/index');
    }

    public function excluir(){
        $emprestimo = $this->request->getPost();
        $this->livroModel->update($emprestimo['id_livro'], ['disponivel' => 1]);
        $this->emprestimoModel->delete($emprestimo);
        return redirect()->to('Emprestimo/index');
    }
    public function devolucao($id){
        $emprestimo = $this->emprestimoModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('devolução/index.php',['emprestimo'=>$emprestimo]);
        echo view('_partials/footer');
    }
    public function salvar_devolucao(){
        $emprestimo = $this->request->getPost();
        $this->livroModel->update($emprestimo['id_livro'], ['disponivel' => 1]);
        $this->emprestimoModel->save($emprestimo);
        return redirect()->to('emprestimo/index');
    }
}