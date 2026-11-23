<?php

namespace App\Controllers;

use App\Models\ContatoModel;

class Contatos extends BaseController
{
    private $regras = [
        'nome' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email',
        'telefone' => 'required|min_length[8]',
    ];

    public function index()
    {
        $model = new ContatoModel();
        $dados['contatos'] = $model->orderBy('nome')->findAll();

        return view('contatos/lista', $dados);
    }

    public function novo()
    {
        return view('contatos/form', ['contato' => null]);
    }

    public function salvar()
    {
        if (!$this->validate($this->regras)) {
            return redirect()->back()->withInput()->with('erros', $this->validator->getErrors());
        }

        $model = new ContatoModel();
        $model->insert($this->request->getPost(['nome', 'email', 'telefone', 'cep', 'endereco']));

        return redirect()->to('/contatos')->with('msg', 'Contato cadastrado!');
    }

    public function editar($id)
    {
        $model = new ContatoModel();
        $contato = $model->find($id);

        if (!$contato) {
            return redirect()->to('/contatos');
        }

        return view('contatos/form', ['contato' => $contato]);
    }

    public function atualizar($id)
    {
        if (!$this->validate($this->regras)) {
            return redirect()->back()->withInput()->with('erros', $this->validator->getErrors());
        }

        $model = new ContatoModel();
        $model->update($id, $this->request->getPost(['nome', 'email', 'telefone', 'cep', 'endereco']));

        return redirect()->to('/contatos')->with('msg', 'Contato atualizado!');
    }

    public function excluir($id)
    {
        $model = new ContatoModel();
        $model->delete($id);

        return redirect()->to('/contatos')->with('msg', 'Contato excluído!');
    }
}
