<?php

namespace App\Http\Controllers;

use App\Models\comissao;
use App\Models\mercadorias;
use App\Models\vendedores;
use App\Models\vendas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;


class BuscaController extends Controller
{
     


     public function Home_Chart()
     {
          $data = [];
        $nome2 = '';
        $i = 0;
        $valor_total = 0;
          $results = DB::select('
        
          Select v.dt_venda as Data_Venda, vd.nome as Nome_Funcionario, m.descricao as Descricao_Produto, m.valor as Valor, c.descricao as Descricao_Mercadoria
          from 
          vendas v
           join vendedores vd
            on v.id_vendedor = vd.id
           join mercadorias m
            on m.id = v.id_mercadoria
            join comissoes c 
            on m.id_categoria = c.id 
            order by Nome_Funcionario
             ');
            
             foreach ($results as $row) {
               $dt_venda = $row->Data_Venda;
               $nome = $row->Nome_Funcionario;
               $descricao = $row->Descricao_Produto;
               $valor = $row->Valor;
               $Descricao_Mercadoria = $row->Descricao_Mercadoria;


               
               $valor_total += $valor;

               if ($nome != $nome2)
               {
                   
                    $key = array_search($nome , $data); 
                              if ($key === false){

                    $i++;
                   $valor_total = 0;
                   $valor_total = $valor;
                              }else
                              {
                                //$i = $key;
                                   $data[$key]  = ['category' => $nome,
                                   'value' => $valor_total];   
                              }
               }

                      $data[$i]  = ['category' => $nome,
                    'value' => $valor_total];
                    $nome2 = $nome;



             }

          echo json_encode($data);  
     }
     


//***************Comissao********************** */

     public function Comissao_delete (Request $request){
        comissao::where('id', $request['id'])->delete();   
     }

     public function Comissao_altera (Request $request){
          $descricao = $request->input('descricao');
          $valor = $request->input('valor');
          $id = $request->input('id');

          comissao::where('id', $id ) ->update(
               [
               'descricao' => $descricao ,
               'valor' => $valor
               ]);   
     }
     
     public function Comissao_insere(Request $request){ 
          $descricao = $request->input('descricao');
          $valor = $request->input('valor');        
          $ContratoDB = new comissao();
          $ContratoDB->descricao = $descricao;
          $ContratoDB->valor = $valor;
          $ContratoDB->save();
         }


//***************Vendedores********************** */

public function Vendedores_delete (Request $request){
     vendedores::where('id', $request['id'])->delete();   
  }

  public function Vendedores_altera (Request $request){
       $nome = $request->input('nome');
       $telefone = $request->input('telefone');
       $dt_entrada = $request->input('data');   
       $id = $request->input('id');

       $orderdate = explode('/', $dt_entrada);
       $mes = $orderdate[0];
       $dia   = $orderdate[1];
       $ano  = $orderdate[2];
       $dt_sql = "$ano-$dia-$mes";
          vendedores::where('id', $id ) -> update(
               [
               'nome' => $nome ,
               'dt_entrada' => $dt_sql ,
               'telefone' => $telefone
               ]);  
           }

  public function Vendedores_insere(Request $request){ 
       $nome = $request->input('nome');
       $telefone = $request->input('telefone');    
       $dt_entrada = $request->input('data');    
     
       $orderdate = explode('/', $dt_entrada);
       $mes = $orderdate[0];
       $dia   = $orderdate[1];
       $ano  = $orderdate[2];
       $dt_sql = "$ano-$dia-$mes";

       $vendedores = new vendedores();
       $vendedores->nome = $nome;
       $vendedores->telefone = $telefone;   
       $vendedores->dt_entrada = $dt_sql;
       $vendedores->save();
      }


//***************Mercadorias********************** */

public function Mercadorias_delete (Request $request){
     mercadorias::where('id', $request['id'])->delete();   
  }

  public function Mercadorias_altera (Request $request){
       $descricao = $request->input('descricao');
       $valor = $request->input('valor');
       $id_categoria = $request->input('id_categoria');   
       $id = $request->input('id');

          mercadorias::where('id', $id ) -> update(
               [
               'descricao' => $descricao ,
               'valor' => $valor ,
               'id_categoria' => $id_categoria
               ]);  
           }

  public function Mercadorias_insere(Request $request){ 
       $descricao = $request->input('descricao');
       $valor = $request->input('valor');    
       $id_categoria = $request->input('id_categoria');    
           
       $mercadorias = new mercadorias();
       $mercadorias->descricao = $descricao;
       $mercadorias->valor = $valor;   
       $mercadorias->id_categoria = $id_categoria;
       $mercadorias->save();
      }
//***************Vendas********************** */

public function Vendas_delete (Request $request){
     vendas::where('id', $request['id'])->delete();   
  }

  public function Vendas_altera (Request $request){
       $dt_venda = $request->input('dt_venda');
       $id_vendedor = $request->input('T_Vendedor');
       $id_mercadoria = $request->input('T_Mercadoria');   
       $id = $request->input('id');

       $orderdate = explode('/', $dt_venda);
       $mes = $orderdate[0];
       $dia   = $orderdate[1];
       $ano  = $orderdate[2];
       $dt_sql = "$ano-$dia-$mes";



       vendas::where('id', $id ) -> update(
               [
               'dt_venda' => $dt_sql ,
               'id_vendedor' => $id_vendedor ,
               'id_mercadoria' => $id_mercadoria
               ]);  
           }

  public function Vendas_insere(Request $request){ 
     $dt_venda = $request->input('dt_venda');
     $id_vendedor = $request->input('T_Vendedor');
     $id_mercadoria = $request->input('T_Mercadoria');  


     $orderdate = explode('/', $dt_venda);
     $mes = $orderdate[0];
     $dia   = $orderdate[1];
     $ano  = $orderdate[2];
     $dt_sql = "$ano-$dia-$mes";


       $vendas = new vendas();
       $vendas->dt_venda = $dt_sql;
       $vendas->id_vendedor = $id_vendedor;   
       $vendas->id_mercadoria = $id_mercadoria;
       $vendas->save();
      }






public function Comissao_Grid()
{
     $data = comissao::all();
     echo json_encode($data);  
}
public function Vendedores_Grid()
{
     $data = vendedores::all();
     echo json_encode($data);  
}
public function Mercadorias_Grid()
{
     $data = mercadorias::all();
     echo json_encode($data);  
}

public function Vendas_Grid()
{
     $data = vendas::all();
     echo json_encode($data);  
}


public function Vendas_Select_Vendedor()
{
     $data = vendedores::all();
     echo json_encode($data);  
}
public function Vendas_Select_Mercadoria()
{
     $data = mercadorias::all();
     echo json_encode($data);  
}
public function Mercadoria_Select_Comissao()
{
     $data = comissao::all();
     echo json_encode($data);  
}




}
