<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\vendedores;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\DB;
use PDF;

class RelatorioController extends Controller
{

    public function relatorio(Request $request)
    {


        // at the top of the file

        PDF::SetTitle('Listagem');



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
  

        ');


     

            $b = "img/indice.jpeg";

            // set default header data
            PDF::SetHeaderData($b, '20', 'Relatorio Gerencial de Vendas', 'Empresa Nome', array(0, 0, 0), array(255, 255, 255));
            PDF::setFooterData(array(0, 64, 0), array(0, 64, 128));

            // set header and footer fonts
            PDF::setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            PDF::setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	PDF::SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
	PDF::SetHeaderMargin(10);
	PDF::SetFooterMargin(20);
	PDF::SetTopMargin(35);
	// set auto page breaks
	PDF::SetAutoPageBreak(TRUE, 0);
            // set auto page breaks
            PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);


            // ---------------------------------------------------------
            //convert to PDF


            PDF::SetFont('dejavusans', '', 9, '', true);
            PDF::AddPage('P', 'A4');

            // set text shadow effect
            PDF::setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));


            PDF::SetFont('helvetica', 'B', 13);
            PDF::Text(40, 8, 'teste');
            PDF::SetFont('helvetica', 'B', 10);
            PDF::Text(40, 16, 'teste');
            PDF::SetFont('dejavusans', '', 16, '', true);
            PDF::Text(70, 30, 'Listagem das Vendas');
            $t = "<br /><br />";
            PDF::writeHTML($t);

            PDF::SetFont('dejavusans', '', 9, '', true);


            $tbl_header = 
            
            
         
            
            '<table align="center" border="1">';
            $thead = '<thead align="center">						
                 <tr>
            <td style="text-align:center;margin-bottom:12px;font-weight:bold;width:120px;">
            Data da Venda</td>
            <td style="text-align:center;margin-bottom:12px;width:90px;">
            Funcionario</td>
            <td style="text-align:center;margin-bottom:12px;width:150px;">
            Descrição</td>
            <td style="text-align:left;margin-bottom:12px;width:70px;">
            Valor</td>
            <td style="text-align:left;margin-bottom:12px;width:130px;">
            Tipo de Mercadoria</td>
            <td style="text-align:left;margin-bottom:12px;width:70px;">
            Comissao</td>
            
            </tr>
                      </thead>';
            $tbl_footer = '</table>';

            $tbl = '';
            $ok = '';

            $Tot_Percentual = '0';

            foreach ($results as $row) {
                $dt_venda = $row->Data_Venda;
                $nome = $row->Nome_Funcionario;
                $descricao = $row->Descricao_Produto;
                $valor = $row->Valor;
                $Descricao_Mercadoria = $row->Descricao_Mercadoria;
    
    
                $Percentual = '0';
    if ($Descricao_Mercadoria == 'Produto')
    {
    $Percentual = (($valor / 100) * 15);
    
    }
    if ($Descricao_Mercadoria == 'Servico')
    {
        $Percentual = (($valor / 100) * 30);
        
    }
    $Tot_Percentual = ($Tot_Percentual + $Percentual);
    
    $Percentual = number_format($Percentual, 2, ',', '.');

            $dt_venda = substr($dt_venda, 0, 10);
            $dataP = explode('-', $dt_venda);
            $dataParaExibir = $dataP[2] . '/' . $dataP[1] . '/' . $dataP[0];



            //$total = $total + 1;

            $tbl .= '<tr>
        <td style="text-align:center;margin-bottom:12px;font-weight:bold;width:120px;">' . $dataParaExibir  . '</td>
        <td style="text-align:center;padding-left:12px;width:90px;">' . $nome  . '</td>
        <td style="text-align:centermargin-bottom:12px;width:150px;">' . $descricao . '</td>
        <td style="text-align:left;margin-bottom:12px;width:70px;">' . $valor . '</td>
        <td style="text-align:left;margin-bottom:12px;width:130px;">' . $Descricao_Mercadoria . '</td>
        <td style="text-align:left;margin-bottom:12px;width:70px;">' . 'R$' .$Percentual. '</td>

        </tr>';

            $ok = '<h4 style="text-align:right;font-weight:bold;">Total: ' . $Tot_Percentual . '</h4>';

        }

        $Tot_Percentual = number_format($Tot_Percentual, 2, ',', '.');

            PDF::writeHTML($tbl_header . $thead . $tbl . $tbl_footer . $ok, true, false, false, false, '');

            PDF::Output('REL-3-1.pdf', 'I');
      





        //   PDF::Output('hello_world.pdf');


    }
}
