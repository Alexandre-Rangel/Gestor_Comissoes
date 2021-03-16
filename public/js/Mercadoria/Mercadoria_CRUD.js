

//*** */
//Busca por campos simples

//*********************Codigo para chamar a tela e codificar se for Inserir ou Alterar ********/
function Alterar(value) {

    //var data_recebida = value.Data;
  
    //let dataFormatada = ((data_recebida.getDate())) + "/" + ((data_recebida.getMonth() + 1)) + "/" + data_recebida.getFullYear();
  
    document.getElementById('titulo_tela01').innerHTML = 'Alterando';
  
  
    console.log(value);
    document.getElementById('descricao').value = value.Descricao;
    document.getElementById('valor').value = value.Valor;
    document.getElementById('id_categoria').value = value.ID_Categoria;
    document.getElementById('id').value = value.ID;
  
  }
  
  function Inserir() {
  
    document.getElementById('titulo_tela01').innerHTML = 'Incluir';
    var form_data = $("input").serializeArray(); 
    var i;
    for (i = 2; i < form_data.length; i++) {
  
      document.getElementById(form_data[i].name).value = '';
    } 
    
  }
  
  function deletar(value) {
  
  
    //var data_recebida = value.Data;
    
    //let dataFormatada = ((data_recebida.getDate())) + "/" + ((data_recebida.getMonth() + 1)) + "/" + data_recebida.getFullYear();
    
    document.getElementById('titulo_tela01').innerHTML = 'Deseja Deletar esse registro?';
    
    document.getElementById('descricao').value = value.Descricao;
    document.getElementById('valor').value = value.Valor;
    document.getElementById('id_categoria').value = value.ID_Categoria;
    document.getElementById('id').value = value.ID;
    
    
    }
  
  //**************************************************************** */
  
  
  
  //*****Codigo para Identificar se esta alterando/inserindo ou deletando e executar no banco de dados */
  function salvar_mudancas() {
  
    if (document.getElementById('titulo_tela01').innerHTML == 'Incluir') {
  
      var str = $( "form" ).serialize();
    
      $.ajax({
  
        type: 'POST',
        url: '/Mercadorias_insere',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: str,
        success: function(data) {
  
          recarrega_tabela();
        }
      });
  
    }
  
  
    if (document.getElementById('titulo_tela01').innerHTML == 'Alterando') {
  
      var str = $( "form" ).serialize();
  
  
  
      $.ajax({
        type: 'PUT',
        url: '/Mercadorias_altera',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: str,
  
        success: function(data) {
  
          recarrega_tabela();
  
        }
      });
  
    }
  
  
    if (document.getElementById('titulo_tela01').innerHTML == 'Deseja Deletar esse registro?') {
  
      var str = $( "form" ).serialize();
  
  
  $.ajax({
  type: 'GET',
  url: '/Mercadorias_delete',
  data: str,
  
  success: function(data) {
  
  recarrega_tabela();
  
  }
  });
  
  }
  
  
  
  
  
  } // fecha funcao salva mudancas
  
  //******************************************************************************** */
  
  
  
  
  
  
  