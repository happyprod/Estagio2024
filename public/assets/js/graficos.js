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
    labels: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
    datasets: [{
      label: "Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: [50, 40, 300, 220, 500, 250, 400],
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
      data: [20, 50, 100, 150, 200, 150, 100],
      maxBarThickness: 6
    },
    ]
  },
  month: {
    labels: ["Semana 1", "Semana 2", "Semana 3", "Semana 4"],
    datasets: [{
      label: "Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: [200, 400, 300, 500],
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
      data: [100, 200, 300, 400],
      maxBarThickness: 6
    },
    ]
  },
  year: {
    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    datasets: [{
      label: "Orgânico",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: [50, 40, 300, 220, 500, 250, 400, 230, 500, 450, 380, 600],
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
      data: [20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250],
      maxBarThickness: 6
    },
    ]
  }
};

var allData = {
  labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "Week 1", "Week 2", "Week 3", "Week 4",
    "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: [{
    label: "Orgânico",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 0,
    borderColor: "#cb0c9f",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [50, 40, 300, 220, 500, 250, 400, 200, 400, 300, 500,
      50, 40, 300, 220, 500, 250, 400, 230, 500, 450, 380, 600],
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
    data: [20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250,
      20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250],
    maxBarThickness: 6
  },
  ]
};


var data2 = {
  week: {
    labels: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
    datasets: [{
      label: "Impressões",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#123e59",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: [50, 40, 300, 220, 500, 250, 400],
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
      data: [20, 50, 100, 150, 200, 150, 100],
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
      data: [20, 50, 100, 150, 200, 150, 100],
      maxBarThickness: 6
    },
    ]
  },
  month: {
    labels: ["Semana 1", "Semana 2", "Semana 3", "Semana 4"],
    datasets: [{
      label: "Impressões",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#123e59",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: [200, 400, 300, 500],
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
      data: [100, 200, 300, 400],
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
      data: [100, 200, 300, 400],
      maxBarThickness: 6
    },
    ]
  },
  year: {
    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    datasets: [{
      label: "Impressões",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#123e59",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      data: [50, 40, 300, 220, 500, 250, 400, 230, 500, 450, 380, 600],
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
      data: [20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250],
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
      data: [20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250],
      maxBarThickness: 6
    },
    ]
  }
};

var allData2 = {
  labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "Week 1", "Week 2", "Week 3", "Week 4",
    "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: [{
    label: "Impressões",
    tension: 0.4,
    borderWidth: 0,
    pointRadius: 0,
    borderColor: "#123e59",
    borderWidth: 3,
    backgroundColor: gradientStroke1,
    fill: true,
    data: [50, 40, 300, 220, 500, 250, 400, 200, 400, 300, 500,
      50, 40, 300, 220, 500, 250, 400, 230, 500, 450, 380, 600],
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
    data: [20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250,
      20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250],
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
    data: [20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250,
      20, 50, 100, 150, 200, 150, 100, 80, 120, 180, 220, 250],
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