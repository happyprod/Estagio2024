anychart.onDocumentReady(function() {

    // set the data
    var data = [
        {x: "Km", value: 2},
        {x: "Salario", value: 2},
        {x: "Ajuda de custos", value: 3},
        {x: "Ferias", value: 1},
    ];
  
    // create the chart
    var chart = anychart.pie();
  
    // set the chart title
    chart.title("Fatias a receber");

    // add the data
    chart.data(data);
  
    // display the chart in the container
    chart.container('receber');
    chart.draw();
  
  });
  

  anychart.onDocumentReady(function() {

    // set the data
    var data = [
        {x: "Km", value: 2},
        {x: "Salario", value: 2},
        {x: "Ajuda de custos", value: 3},
        {x: "Ferias", value: 1},
    ];
  
    // create the chart
    var chart = anychart.pie();
  
    // set the chart title
    chart.title("Fatias das despesas");
  
    // add the data
    chart.data(data);
  
    // display the chart in the container
    chart.container('despesas');
    chart.draw();
  
  });
  