<?php
namespace App\Controllers;
Use App\Models\UsuariosModel;
Use App\Models\LivrosModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function telacadastro(): string
    {
        return view('cadastro');
    }

    public function recebercadastro(): string 
    {
        $data = array(
            'nome' => $this->request->getVar('nome'),
            'email' => $this->request->getVar('email'),
            'senha' =>password_hash($this->request->getVar('senha'), PASSWORD_BCRYPT)
        );

        $my_model= new UsuariosModel();
        $my_model->insert($data);
        $result= $my_model->findAll();
        $data['result']=$result;
       
        return view('cadastrado', $data);

    }
     
    public function validarlogin(): void
    {

        $data = array(
            'email' => $this->request->getVar('email'),
            'senha' => password_hash($this->request->getVar('senha'), PASSWORD_BCRYPT)
        );

        $email = $data['email'];
        $senha= $data['senha'];
        $my_model= new UsuariosModel();
        $datauser= $my_model->where(['email'=> $email],['senha'=> $senha])->first() ;
        echo " dados apresentados: <br>";
        print_r($datauser);








    }
}