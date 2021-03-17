

//*** */
//Busca por campos simples

//*********************Codigo para chamar a tela e codificar se for Inserir ou Alterar ********/
function Alterar(value) {

  var data_recebida = value.Data;

  let dataFormatada = ((data_recebida.getDate())) + "/" + ((data_recebida.getMonth() + 1)) + "/" + data_recebida.getFullYear();

  document.getElementById('titulo_tela01').innerHTML = 'Alterando';


  console.log(value);
  document.getElementById('dt_venda').value = dataFormatada;
  document.getElementById('T_Vendedor').value = value.ID_Vendedor;
  document.getElementById('T_Mercadoria').value = value.ID_Mercadoria;
  document.getElementById('id').value = value.ID;
}

function Inserir() {

  document.getElementById('titulo_tela01').innerHTML = 'Incluir';

  //document.getElementById('T_Vendedor').value = '01';
  //document.getElementById('T_Mercadoria').value = '01';

  document.getElementById('dt_venda').value = '';




}

function deletar(value) {


  var data_recebida = value.Data;

  let dataFormatada = ((data_recebida.getDate())) + "/" + ((data_recebida.getMonth() + 1)) + "/" + data_recebida.getFullYear();

  document.getElementById('titulo_tela01').innerHTML = 'Deseja Deletar esse registro?';

  document.getElementById('dt_venda').value = dataFormatada;
  document.getElementById('T_Vendedor').value = value.ID_Vendedor;
  document.getElementById('T_Mercadoria').value = value.ID_Mercadoria;
  document.getElementById('id').value = value.ID;

}

//**************************************************************** */



//*****Codigo para Identificar se esta alterando/inserindo ou deletando e executar no banco de dados */
function salvar_mudancas() {

  if (document.getElementById('titulo_tela01').innerHTML == 'Incluir') {

    var str = $("form").serialize();

    $.ajax({

      type: 'POST',
      url: '/Vendas_insere',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: str,
      success: function (data) {

        recarrega_tabela();
      }
    });

  }


  if (document.getElementById('titulo_tela01').innerHTML == 'Alterando') {

    var str = $("form").serialize();



    $.ajax({
      type: 'PUT',
      url: '/Vendas_altera',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: str,

      success: function (data) {

        recarrega_tabela();

      }
    });

  }


  if (document.getElementById('titulo_tela01').innerHTML == 'Deseja Deletar esse registro?') {

    var str = $("form").serialize();


    $.ajax({
      type: 'GET',
      url: '/Vendas_delete',
      data: str,

      success: function (data) {

        recarrega_tabela();

      }
    });

  }





} // fecha funcao salva mudancas

  //******************************************************************************** */






