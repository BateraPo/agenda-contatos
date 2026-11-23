<?php

namespace App\Controllers;

use App\Libraries\ViaCep;

class Cep extends BaseController
{
    public function buscar($cep)
    {
        $viacep = new ViaCep();
        $dados = $viacep->consultar($cep);

        if ($dados === null) {
            return $this->response->setStatusCode(404)->setJSON(['erro' => true]);
        }

        return $this->response->setJSON($dados);
    }
}
