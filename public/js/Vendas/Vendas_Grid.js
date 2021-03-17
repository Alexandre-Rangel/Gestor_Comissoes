
recarrega_tabela();



function recarrega_tabela() {



    //*********************************  inicia GRIG  com Framework Kendo JQuery */
  var reg;

  $.ajax({
    url: '/Vendas_Grid',
    type: 'GET',
    dataType: 'json',
    success: function(data) {

      var sampleData = [];
      for (reg = 0; reg < data.length; reg++) {
        sampleData.push({
          ID: data[reg].id,
          ID_Vendedor: data[reg].id_vendedor,
          Data: data[reg].dt_venda,
          ID_Mercadoria: data[reg].id_mercadoria
          
        });
      }
   

      // $(document).ready(function () {

      var dataSource = new kendo.data.DataSource({
        transport: {
          read: function(e) {
            e.success(sampleData);
          }
        },
        error: function(e) {
          alert("Status: " + e.status + "; Error message: " + e.errorThrown);
        },
        pageSize: 10,
        batch: false,
        schema: {
          model: {
            id: "id",
            fields: {
              ID: {
                editable: false,
                nullable: true
              },
              ID_Mercadoria: {
                validation: {
                  required: true
                }
              },
              Data: {
                type: "date"
              },
              ID_Vendedor: {
                type: "integer"
              }
            }
          }
        }
      });



      $("#grid").kendoGrid({
        dataSource: dataSource,
        pageable: true,
        columns: [{
            field: "ID",
            title: "ID",
            width: "20px"
          },
          {
            field: "ID_Vendedor",
            title: "ID_Vendedor",
            width: "200px"
          },
          {
            field: "Data",
            title: "Data",
            format: "{0:dd/MM/yyyy}",
            width: "120px"
          },
          {
            field: "ID_Mercadoria",
            title: "ID_Mercadoria",
            format:  "{0:0}",
            width: "120px"
          },         
          {
            command: [

              {
                text: "Alterar",
                name: "Alterar",
                click: function(e) {
                  var tr = $(e.target).closest("tr");
                  var data = this.dataItem(tr);

                  document.getElementById('inserir_alterar').click();
                  Alterar(data);
                }
              },
              {
                text: "Deletar",
                name: "Deletar",
                click: function(e) {
                  var tr = $(e.target).closest("tr");
                  var data = this.dataItem(tr);

                  document.getElementById('inserir_alterar').click();

                  
                  deletar(data);
                }
              }
            ],
            title: " ",
            width: "140px"
          }
        ]
      })


      //  });  // $document



      self.close();
    }
  });


}; //recarrega_tabela









var reg;
$.ajax({
  url: '/Vendas_Select_Vendedor',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
    var sampleData = [];
    for (reg = 0; reg < data.length; reg++) {
      sampleData.push({
        id: data[reg].id,
        nome: data[reg].nome
        
      });
    }
    var dataSource = new kendo.data.DataSource({
      transport: {
        read: function(e) {
          e.success(sampleData);
        }
      }});

$("#T_Vendedor").kendoDropDownList({
  dataSource: dataSource,
  dataTextField: "nome",
  dataValueField: "id"
});

var dropdownlist = $("#T_Vendedor").data("kendoDropDownList");

dropdownlist.select(0);

  }

});






var reg;
$.ajax({
  url: '/Vendas_Select_Mercadoria',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
    var sampleData = [];
    for (reg = 0; reg < data.length; reg++) {
      sampleData.push({
        id: data[reg].id,
        descricao: data[reg].descricao+' R$ '+data[reg].valor,
        valor: data[reg].valor,
        
      });
    }
    var dataSource = new kendo.data.DataSource({
      transport: {
        read: function(e) {
          e.success(sampleData);
        }
        
      }}
      
      );


$('#T_Mercadoria').kendoDropDownList({
  dataSource: dataSource,
  dataTextField: "descricao",
  dataValueField: "id"
});

var dropdownlist = $('#T_Mercadoria').data("kendoDropDownList");

dropdownlist.select(0);

  }

});



$("#dt_venda").kendoDatePicker({
  format: "dd/MM/yyyy"
});
//********************************fim do carregamento do Grid******************* *

