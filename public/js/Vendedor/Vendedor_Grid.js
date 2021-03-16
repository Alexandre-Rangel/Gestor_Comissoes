
recarrega_tabela();



function recarrega_tabela() {



    //*********************************  inicia GRIG  com Framework Kendo JQuery */
  var reg;

  $.ajax({
    url: '/Vendedores_Grid',
    type: 'GET',
    dataType: 'json',
    success: function(data) {

      var sampleData = [];
      for (reg = 0; reg < data.length; reg++) {
        sampleData.push({
          ID: data[reg].id,
          Nome: data[reg].nome,
          Data: data[reg].dt_entrada,
          Telefone: data[reg].telefone
          
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
              Nome: {
                validation: {
                  required: true
                }
              },
              Data: {
                type: "date"
              },
              Telefone: {
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
            field: "Nome",
            title: "Nome",
            width: "200px"
          },
          {
            field: "Data",
            title: "Data",
            format: "{0:dd/MM/yyyy}",
            width: "120px"
          },
          {
            field: "Telefone",
            title: "Telefone",
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

//********************************fim do carregamento do Grid******************* */