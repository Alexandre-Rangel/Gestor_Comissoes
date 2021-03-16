
recarrega_tabela();



function recarrega_tabela() {



    //*********************************  inicia GRIG  com Framework Kendo JQuery */
  var reg;

  $.ajax({
    url: '/Mercadorias_Grid',
    type: 'GET',
    dataType: 'json',
    success: function(data) {

      var sampleData = [];
      for (reg = 0; reg < data.length; reg++) {
        sampleData.push({
          ID: data[reg].id,
          Descricao: data[reg].descricao,
          Valor: data[reg].valor,
          ID_Categoria: data[reg].id_categoria
          
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
            id: "ContratoId",
            fields: {
              ID: {
                editable: false,
                nullable: true
              },
              Descricao: {
                validation: {
                  required: true
                }
              },
              Valor: {
                type: "integer"
              },
              ID_Categoria: {
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
            field: "Descricao",
            title: "Descricao",
            width: "200px"
          },
          {
            field: "Valor",
            title: "Valor",
            format: "{0:00.00}",
            width: "120px"
          },
          {
            field: "ID_Categoria",
            title: "ID_Categoria",
            format: "{0:00}",
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

//********************************fim do carregamento do Grid******************* */




var reg;
$.ajax({
  url: '/Mercadoria_Select_Comissao',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
    var sampleData = [];
    for (reg = 0; reg < data.length; reg++) {
      sampleData.push({
        id_categoria: data[reg].id,
        descricao: data[reg].descricao
        
      });
    }
    var dataSource = new kendo.data.DataSource({
      transport: {
        read: function(e) {
          e.success(sampleData);
        }
      }});

$("#id_categoria").kendoDropDownList({
  dataSource: dataSource,
  dataTextField: "descricao",
  dataValueField: "id_categoria"
});

var dropdownlist = $("#id_categoria").data("kendoDropDownList");

dropdownlist.select(1);

  }

});
