<?php

namespace App\Http\Controllers;
use App\Models\vendas;
use App\Models\comissao;
use App\Models\mercadorias;
use App\Models\Usuario;
use App\Models\vendedores;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AdmController extends Controller
{

    public function login(Request $request)
    {

        $data = [];


        if ($request->isMethod("POST")) {

            $login = $request->input("login");
            $senha = $request->input("senha");
            $credentials = ['login' => $login, 'password' => $senha];

          

            if (Auth::attempt($credentials)) {
            
                return redirect()->route("home");
            } else {

                $request->session()->flash("err", "Usuário / Senha Inválido");
                return redirect()->route("login");
            }
        }


        return view('login', $data);
    }


    public function adm(Request $request)
    {
   
        $data = [];

        $listaAdm = Usuario::all();
        $data  = ['lista_adm' => $listaAdm];

        return view("adm", $data);

    }

    public function vendedores(Request $request)
    {
   
        $data = [];

        $listaVendedores = vendedores::all();
        $data  = ['listaVendedores' => $listaVendedores];

        return view("vendedores/vendedores", $data);

    }

    public function vendas(Request $request)
    {
   
        $data = [];

        $listaVendas = Vendas::all();
        $data  = ['listaVendas' => $listaVendas];

        return view("vendas", $data);

    }

    public function comissoes(Request $request)
    {
   
        $data = [];

        $listaComissao = comissao::all();
        $data  = ['listaComissao' => $listaComissao];
       
        return view("comissoes", $data);

    }

    public function comissoes_listagem()
    {
   
        $data = [];

        $listaComissao = comissao::all();
        $data  = ['listaComissao' => $listaComissao];
  
        echo json_encode($data);

    }

    public function mercadorias(Request $request)
    {
   
        $data = [];

        $listaMercadorias = mercadorias::all();
        $data  = ['listaMercadorias' => $listaMercadorias];

        return view("mercadorias", $data);

    }
    
    public function sair(Request $request)
    {


        Auth::logout();
        return redirect()->route('home');
    }  

}
