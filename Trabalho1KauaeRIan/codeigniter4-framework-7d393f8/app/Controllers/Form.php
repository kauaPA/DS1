<?php
namespace App\Controllers;
class Form extends BaseController
{
    public function index(): string
    {
        return view('formulario');
    }
    public function receiveData(): string
    {
        $data = array(
            'nome' => $this->request->getVar('nome'),
            'nascimento' => $this->request->getVar('nascimento'),
            'salario' => $this->request->getVar('salario')
        );
        //DEFINIÇÃO ÍNDICE IDADE
        $idade= 2024 - $data['nascimento'];
        $salario = $data['salario'];
        if($idade<=18){
            $indice_idade=0;
        };
        if($idade>=19 && $idade<=23){
            $indice_idade=1;
        };
        if($idade>=24 && $idade<=28){
            $indice_idade=2;
        };
        if($idade>=29 && $idade<=33){
            $indice_idade=3;
        };
        if($idade>=34 && $idade<=38){
            $indice_idade=4;
        };
        if($idade>=39 && $idade<=43){
            $indice_idade=5;
        };
        if($idade>=44 && $idade<=48){
            $indice_idade=6;
        };
        if($idade>=49 && $idade<=53){
            $indice_idade=7;
        };
        if($idade>=54 && $idade<=58){
            $indice_idade=8;
        };
        if($idade>=59){
            $indice_idade=9;
        };
        //DEFINIÇÃO INDÍCE SALÁRIO
        if($salario<=1499){
            $indice_salario=0;
        };
        if($salario>=1500 && $salario<=1999){
            $indice_salario=1;
        };
        if($salario>=2000 && $salario<=2499){
            $indice_salario=2;
        };
        if($salario>=2500 && $salario<=2999){
            $indice_salario=3;
        };
        if($salario>=3000 && $salario<=3999){
            $indice_salario=4;
        };
        if($salario>=4000 && $salario<=5499){
            $indice_salario=5;
        };
        if($salario>=5500 && $salario<=7499){
            $indice_salario=6;
        };
        if($salario>=7500){
            $indice_salario=7;
        };
        //CRIAÇÃO TABELA DE VALORES
        $valores=[
            [150, 157, 159, 165, 170, 176, 190, 193, 196, 206], 
            [142, 150, 152, 157, 162, 167, 181, 184, 187, 196], 
            [135, 142, 145, 150, 154, 160, 171, 174, 177, 187], 
            [130, 135, 138, 142, 147, 153, 164, 166, 169, 177], 
            [123, 130, 132, 135, 140, 146, 156, 159, 161, 169], 
            [111, 114, 116, 117, 122, 128, 130, 132, 134, 137], 
            [107, 109, 111, 111, 116, 122, 124, 126, 128, 131], 
            [102, 103, 105, 106, 111, 116, 117, 119, 121, 124]
        ];
        $data['indice_salario'] = $indice_salario;
        $data['indice_idade'] = $indice_idade;
        $data['idade'] = $idade;
        $data['valores'] = $valores;
        $ressarcimento = ($valores[$indice_salario])[$indice_idade];
        $data['ressarcimento'] = $ressarcimento;
        return view('resposta', $data);
    }
}