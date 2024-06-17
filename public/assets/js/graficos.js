// Converte a string para um array
var organic30 = JSON.parse(organic30);
var unganic30 = JSON.parse(unganic30);
var impressions30 = JSON.parse(impressions30);
var likes30 = JSON.parse(likes30);
var comments30 = JSON.parse(comments30);
        
// Verificando o comprimento do array comments30
var length = comments30.length;

// Criando um novo array para armazenar as strings "Semana 1", "Semana 2", ...
var semanasArray = [];

// Gerando as strings com base no comprimento do array comments30
for (var i = 1; i <= length; i++) {
    semanasArray.push("Semana " + i);
}

// semanasArray agora contém as strings desejadas
console.log(semanasArray);


var organic7 = JSON.parse(organic7);
var unganic7 = JSON.parse(unganic7);
var impressions7 = JSON.parse(impressions7);
var likes7 = JSON.parse(likes7);
var comments7 = JSON.parse(comments7);


var organic1ano = JSON.parse(organic1ano);
var unganic1ano = JSON.parse(unganic1ano);
var impressions1ano = JSON.parse(impressions1ano);
var likes1ano = JSON.parse(likes1ano);
var comments1ano = JSON.parse(comments1ano);

// Obter a data atual
var hoje = new Date();

// Array com os nomes dos meses
var meses = [
  'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
  'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
];

// Obter o mês atual e o ano
var mesAtual = hoje.getMonth(); // Retorna um número de 0 a 11
var anoAtual = hoje.getFullYear();

// Criar um array para armazenar os meses
var mesesExibidos = [];

// Adicionar os 12 meses ao array (11 anteriores + mês atual)
for (var i = 0; i <= 11; i++) {
  // Calcular o índice do mês subtraindo i meses
  var indiceMes = mesAtual - i;
  var ano = anoAtual;

  // Ajustar o índice para garantir que seja um número positivo
  if (indiceMes < 0) {
    indiceMes = 12 + indiceMes; // Mês do ano passado
    ano--; // Reduzir o ano se necessário
  }
  
  // Adicionar o nome do mês e o ano ao array de mesesExibidos
  mesesExibidos.unshift(`${meses[indiceMes]} ${ano}`);
}

// Exibir os meses
console.log("Meses dos últimos 12 meses:");
console.log(mesesExibidos);

// Garante que a tua variável 'organic30' agora é um array
console.log(organic30); // Deverá mostrar [127364, 10] no console
console.log(unganic30);


var organictudo = JSON.parse(organictudo);
var unganictudo = JSON.parse(unganictudo);
var impressionstudo = JSON.parse(impressionstudo);
var likestudo = JSON.parse(likestudo);
var commentstudo = JSON.parse(commentstudo);


// Obter o comprimento do array
var totalMeses = organictudo.length;

// Obter a data atual
var dataAtual = new Date();

// Array com os nomes dos meses
var nomesMeses = [
  'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
  'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
];

// Obter o mês atual e o ano
var mesAtualData = dataAtual.getMonth(); // Retorna um número de 0 a 11
var anoAtualData = dataAtual.getFullYear();

// Criar um array para armazenar os meses
var mesesCalculados = [];

// Adicionar os meses ao array com base no comprimento de dadosArray
for (let i = 0; i < totalMeses; i++) {
  // Calcular o índice do mês subtraindo i meses
  let indiceMes = mesAtualData - i;
  let ano = anoAtualData;

  // Ajustar o índice para garantir que seja um número positivo
  if (indiceMes < 0) {
    indiceMes = 12 + indiceMes; // Mês do ano passado
    ano--; // Reduzir o ano se necessário
  }
  
  // Adicionar o nome do mês e o ano ao array de mesesCalculados
  mesesCalculados.unshift(`${nomesMeses[indiceMes]} ${ano}`);
}

// Exibir os meses
console.log("Meses desde a data atual até o comprimento do array:");
console.log(mesesCalculados);





var ctx1 = document.getElementById("chart-line").getContext("2d");
var ctx2 = document.getElementById("chart-bar").getContext("2d");


var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)');

var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);
gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)');

var gradientStroke3 = ctx1.createLinearGradient(0, 230, 0, 50);
gradientStroke3.addColorStop(1, 'rgba(75,192,192,0.2)');
gradientStroke3.addColorStop(0.2, 'rgba(75,192,192,0.0)');
gradientStroke3.addColorStop(0, 'rgba(75,192,192,0)');

var data = {
  week: {
    labels: ["Dia 1", "Dia 2", "Dia 3", "Dia 4", "Dia 5", "Dia 6", "Dia 7"],
    datasets: [{
      label: "Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: organic7,
      maxBarThickness: 6
    },
    {
      label: "Não Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#4bc0c0",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: unganic7,
      maxBarThickness: 6
    },
    ]
  },
  month: {
    labels: semanasArray,
    datasets: [{
      label: "Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: organic30,
      maxBarThickness: 6
    },
    {
      label: "Não Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#4bc0c0",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: unganic30,
      maxBarThickness: 6
    },
    ]
  },
  year: {
    labels: mesesExibidos,
    datasets: [{
      label: "Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: organic1ano,
      maxBarThickness: 6
    },
    {
      label: "Não Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#4bc0c0",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: unganic1ano,
      maxBarThickness: 6
    },
    ]
  }
};

var allData = {
  labels: mesesCalculados,
  datasets: [{
    label: "Orgânico",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 0,
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: organictudo,
    maxBarThickness: 6
  },
  {
    label: "Não Orgânico",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 0,
    borderColor: "#4bc0c0",
    borderWidth: 3,
    backgroundColor: gradientStroke3,
    fill: true,
    data: unganictudo,
    maxBarThickness: 6
  },
  ]
};


var data2 = {
  week: {
    labels: ["Dia 1", "Dia 2", "Dia 3", "Dia 4", "Dia 5", "Dia 6", "Dia 7"],
    datasets: [{
      label: "Impressões",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#123e59",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: impressions7,
      maxBarThickness: 6
    },
    {
      label: "Gostos",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#4bc0c0",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: likes7,
      maxBarThickness: 6
    },
    {
      label: "Comentários",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#4bc0c0",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: comments7,
      maxBarThickness: 6
    },
    ]
  },
  month: {
    labels: semanasArray,
    datasets: [{
      label: "Impressões",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#123e59",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: impressions30,
      maxBarThickness: 6
    },
    {
      label: "Gostos",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#4bc0c0",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: likes30,
      maxBarThickness: 6
    },
    {
      label: "Comentários",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#6facad",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: comments30,
      maxBarThickness: 6
    },
    ]
  },
  year: {
    labels: mesesExibidos,
    datasets: [{
      label: "Impressões",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#123e59",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: impressions1ano,
      maxBarThickness: 6
    },
    {
      label: "Gostos",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#4bc0c0",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: likes1ano,
      maxBarThickness: 6
    },
    {
      label: "Comentários",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#6facad",
      borderWidth: 3,
      backgroundColor: gradientStroke3,
      fill: true,
      data: comments1ano,
      maxBarThickness: 6
    },
    ]
  }
};

var allData2 = {
  labels: mesesCalculados,
  datasets: [{
    label: "Impressões",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 0,
    borderColor: "#123e59",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: impressionstudo,
    maxBarThickness: 6
  },
  {
    label: "Gostos",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 0,
    borderColor: "#4bc0c0",
    borderWidth: 3,
    backgroundColor: gradientStroke3,
    fill: true,
    data: likestudo,
    maxBarThickness: 6
  },
  {
    label: "Comentários",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 0,
    borderColor: "#6facad",
    borderWidth: 3,
    backgroundColor: gradientStroke3,
    fill: true,
    data: commentstudo,
    maxBarThickness: 6
  },
  ]
};

var chartLine = new Chart(ctx1, {
  type: "line",
  data: data.year, // Default to yearly data
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: true,
        position: 'bottom',
        align: 'end'
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
        },
        ticks: {
          suggestedMin: 0,
          suggestedMax: 600,
          beginAtZero: true,
          padding: 15,
          font: {
            size: 14,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
          color: "#000"
        },
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false
        },
        ticks: {
          display: true,
          color: "#000"
        },
      },
    },
  },
});

var chartBar = new Chart(ctx2, {
  type: "bar",
  data: data2.year, // Default to yearly data
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: true,
        position: 'bottom',
        align: 'end'
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
        },
        ticks: {
          suggestedMin: 0,
          suggestedMax: 600,
          beginAtZero: true,
          padding: 15,
          font: {
            size: 14,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
          color: "#000"
        },
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false
        },
        ticks: {
          display: true,
          color: "#000"
        },
      },
    },
  },
});

// Adiciona listeners aos botões do primeiro gráfico de linha
document.getElementById('week-btn-line').addEventListener('click', function () {
  chartLine.data = data.week;
  chartLine.options.scales.y.ticks.suggestedMax = 600;
  chartLine.update();
});

document.getElementById('month-btn-line').addEventListener('click', function () {
  chartLine.data = data.month;
  chartLine.options.scales.y.ticks.suggestedMax = 600;
  chartLine.update();
});

document.getElementById('year-btn-line').addEventListener('click', function () {
  chartLine.data = data.year;
  chartLine.options.scales.y.ticks.suggestedMax = 600;
  chartLine.update();
});

document.getElementById('all-btn-line').addEventListener('click', function () {
  chartLine.data = allData;
  chartLine.options.scales.y.ticks.suggestedMax = 600;
  chartLine.update();
});

// Adiciona listeners aos botões do segundo gráfico de barras
document.getElementById('week-btn-bar').addEventListener('click', function () {
  chartBar.data = data2.week;
  chartBar.options.scales.y.ticks.suggestedMax = 600;
  chartBar.update();
});

document.getElementById('month-btn-bar').addEventListener('click', function () {
  chartBar.data = data2.month;
  chartBar.options.scales.y.ticks.suggestedMax = 600;
  chartBar.update();
});

document.getElementById('year-btn-bar').addEventListener('click', function () {
  chartBar.data = data2.year;
  chartBar.options.scales.y.ticks.suggestedMax = 600;
  chartBar.update();
});

document.getElementById('all-btn-bar').addEventListener('click', function () {
  chartBar.data = allData2;
  chartBar.options.scales.y.ticks.suggestedMax = 600;
  chartBar.update();
});