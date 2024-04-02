<?php
namespace App\Controllers;
Use App\Models\PokemonsModel;

class pokecontroler extends BaseController
{

    public function pokereceive(): string
    {
        $data = array(
            'Nome' => $this->request->getVar('pokenome'),
            'Tipo' => $this->request->getVar('tipo')
        );
        $my_model= new PokemonsModel();
        $my_model->insert($data);
        $result= $my_model->findAll();
        $data['result']=$result;

        return view('pokeresultado', $data );
    }

    public function pokedelete()
    {
        $id = $this->request->getVar('id');
        $my_model = new PokemonsModel();
        $my_model->delete($id);
        return redirect()->to('pokeshow'); 
    }

    public function pokeshow(){
        $my_model= new PokemonsModel();
        $result= $my_model->findAll();
        $data['result']=$result; 

        return view('pokeresultado', $data);
    }

    public function index(): string
    {
        return view('pokeform');
    }
}    