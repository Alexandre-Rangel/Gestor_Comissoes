@extends('layouts.header')

@section('header')


</html>

  <div class="container">
    <div class="row">





      <div class="col-12">

        <div class="alert alert-danger"> </div>
      </div>



      <div class="col-12">

        <div class="alert alert-success"> </div>
      </div>





    </div>
  </div>




</html>

<div id="chart"></div>




<script>

var reg;

  $.ajax({
    url: '/Home_Chart',
    type: 'GET',
    dataType: 'json',
    success: function(data) {


$("#chart").kendoChart({
    title: {
        text: "Funcionarios que mais venderam"
    },
    legend: {
        position: "bottom"
    },
    seriesDefaults: {
        labels: {
            visible: true,
            format: "R${0}"
        }
    },
    series: [{
        type: "pie",
        data: data
    }]
});
self.close();
    }
  });









function updateChart(dataSource){
  var dataItems = dataSource.view();
    var chartSeries = [];
    var chartData = [];
     
    dataItems.forEach(function(item){         
      var data = [];
      months.forEach(function(month){
        //Each month's value is added to the data collection
        data.push(item[month]);
      })         
       
      chartSeries.push({
        data: data,
        //we will be using the Year from the dataItem as the name
        name: item.Year
        })
    })
   
    var chart = $("#chart").data("kendoChart");
    var options = chart.options;
    options.series = chartSeries; //setting the series with the new data to the options
    chart.setOptions(options); //re-initializing the Chart
}

</script>
@endsection
