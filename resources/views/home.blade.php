@extends('layouts.header')

@section('header')


</html>

<div class="container">
  <div class="row">
    <div id="chart"></div>


  </div>
</div>

</html>

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









  function updateChart(dataSource) {
    var dataItems = dataSource.view();
    var chartSeries = [];
    var chartData = [];

    dataItems.forEach(function(item) {
      var data = [];
      months.forEach(function(month) {
        data.push(item[month]);
      })

      chartSeries.push({
        data: data,
        name: item.Year
      })
    })

    var chart = $("#chart").data("kendoChart");
    var options = chart.options;
    options.series = chartSeries;
    chart.setOptions(options);
  }
</script>
@endsection