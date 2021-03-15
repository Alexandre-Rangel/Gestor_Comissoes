<?php

namespace App\Http\Controllers;

use App\Models\comissao;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuscaController extends Controller
{



     public function delete (Request $request){
   


          DB::table('comissoes')
          ->where('id', $request['id'])->delete();
     
     }




     public function edit (Request $request){

          $descricao = $request->input('descricao');
          $valor = $request->input('valor');
          $id = $request->input('id');
     
      
            DB::table('comissoes')
            ->where('id', $id)
            ->update(
                 [
                 'descricao' => $descricao ,
                 'valor' => $valor
                 ]
                  );
      //   return response()->json(array('dt'=> $dt_sql, 'contrato'=> $contrato  ), 200); 
     }
     


public function contratos()
{

    $data = DB::table('comissoes')->get();  
     echo json_encode($data);
     
}
     //   return response()->json(array('msg'=> $request), 200);     



     public function call(Request $request){

 

   
          $descricao = $request->input('descricao');
          $valor = $request->input('valor');
          
        $ContratoDB = new comissao();
        //$data = DB::table('pessoa');

   
   $ContratoDB->descricao = $descricao;
   $ContratoDB->valor = $valor;

  
          $ContratoDB->save();
   //            return redirect('insert')->with('status',"Insert successfully");
       
   }


}


