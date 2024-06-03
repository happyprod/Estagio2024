function sendUserId(user_id) {
    $.ajax({
        type: "POST",
        url: "bookmark.php",
        data: {
            user_id: user_id
        }, // Envia o user_id para o PHP
        success: function (result) {
            $("#result").text(result); // Exibe o resultado retornado pelo PHP
        }
    });
}


var swiper = new Swiper(".mySwiper", {
    // Defina a quantidade de slides visíveis para diferentes resoluções
    slidesPerView: 1, // Padrão para resoluções maiores
    breakpoints: {

        1920: {
            slidesPerView: 7,
        },

        1650: {
            slidesPerView: 6,
        },

        1366: {
            slidesPerView: 4,
        },
        // Configuração para resoluções menores, como tablets
        1024: {
            slidesPerView: 4,
        },
        // Configuração para resoluções ainda menores, como smartphones
        768: {
            slidesPerView: 3,
        },
        // Configuração para resoluções muito pequenas, como smartphones em modo paisagem
        576: {
            slidesPerView: 2,
        },

        390: {
            slidesPerView: 1,
        }
    },
    centeredSlides: false,
    spaceBetween: 10,
    grabCursor: true,
    /* pagination: {
       el: ".swiper-pagination",
       clickable: true,
     },*/
});


var copy = document.querySelector(".logos-slide").cloneNode(true);
document.querySelector(".logos").appendChild(copy);

document.addEventListener("DOMContentLoaded", function () {
    const logosContainer = document.querySelector(".logos");
    const logosSlide = document.querySelector(".logos-slide");
    const logos = logosSlide.querySelectorAll("img");
    const logoWidth = logos[0].offsetWidth; // Largura de cada logo
    const slideDuration = 10; // Duração da animação em segundos
    const pauseBetweenLoops = 1; // Pausa entre loops em segundos

    // Configuração inicial do carrossel
    let currentIndex = 0;
    let slideInterval = null;

    function startCarousel() {
        slideInterval = setInterval(() => {
            currentIndex++;
            const offset = -currentIndex * logoWidth;
            logosSlide.style.transform = `translateX(${offset}px)`;

            // Verifica se atingiu o final dos logos
            if (currentIndex >= logos.length) {
                // Pausa breve antes de reiniciar o carrossel
                setTimeout(() => {
                    logosSlide.style.transition = "none"; // Desativa a transição para reiniciar suavemente
                    currentIndex = 0;
                    logosSlide.style.transform = `translateX(0)`;
                    setTimeout(() => {
                        logosSlide.style.transition = `transform ${slideDuration}s linear`;
                    }, 100);
                }, pauseBetweenLoops * 1000);
            }
        }, (slideDuration + pauseBetweenLoops) * 1000);
    }

    startCarousel();
});


// Quando o documento estiver carregado...
$(document).ready(function () {
    var tooltipTimer;

    // Exibir a tooltip quando o mouse passar sobre o botão
    $('#tooltipButton').mouseenter(function () {
        clearTimeout(tooltipTimer);
        $('#customTooltip').css({
            'display': 'block',
        });
    });

    // Manter a tooltip visível mesmo quando o mouse sair do botão
    $('#customTooltip').mouseenter(function () {
        clearTimeout(tooltipTimer);
    });

    // Esconder a tooltip quando o mouse sair tanto do botão quanto da própria tooltip
    $('#tooltipButton, #customTooltip').mouseleave(function () {
        tooltipTimer = setTimeout(function () {
            // Aplica a animação de desaparecer
            $('#customTooltip').css('animation', 'fadeOut 0.5s ease forwards');
            // Esconde a tooltip após a animação
            setTimeout(function () {
                $('#customTooltip').css('display', 'none');
                // Remove a animação para que ela possa ser reaplicada na próxima vez que a tooltip aparecer
                $('#customTooltip').css('animation', '');
            }, 500); // Tempo correspondente à duração da animação (0.5s)
        }, 500);
    });

});

var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
        damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}


var ctx = document.getElementById("chart-bars").getContext("2d");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
        },],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
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
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 15,
                    font: {
                        size: 14,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
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
                    display: false
                },
            },
        },
    },
});


var ctx2 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

new Chart(ctx2, {
    type: "line",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

        },
        {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
        },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
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
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#b2b9bf',
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#b2b9bf',
                    padding: 20,
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});