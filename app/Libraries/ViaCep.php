<?php

namespace App\Libraries;

class ViaCep
{
    public function consultar($cep)
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);

        if (strlen($cep) != 8) {
            return null;
        }

        $url = rtrim(env('viacep.url', 'https://viacep.com.br/ws'), '/') . '/' . $cep . '/json/';
        $timeout = (int) env('viacep.timeout', 5);

        try {
            $cliente = \Config\Services::curlrequest();
            $resposta = $cliente->get($url, ['timeout' => $timeout, 'http_errors' => false]);
        } catch (\Exception $e) {
            return null;
        }

        $dados = json_decode($resposta->getBody(), true);

        if (!$dados || isset($dados['erro'])) {
            return null;
        }

        return [
            'endereco' => $dados['logradouro'] . ', ' . $dados['bairro'] . ' - ' . $dados['localidade'] . '/' . $dados['uf'],
        ];
    }
}
