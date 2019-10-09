var ctx1 = document.getElementById('chart1').getContext('2d');
var chart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: entryNumber,
        datasets: [{
            label: 'Your Child',
            borderColor: 'rgb(0, 0, 255)',
            pointBackgroundColor: 'rgb(0, 0, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: bmi
        }, {
            label: 'Upper Range',
            borderColor: 'rgb(0, 255, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: bmiUpper
        }, {
            label: 'Lower Range',
            borderColor: 'rgb(0, 255, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: bmiLower
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Child Weight Trend',
            fontSize: 20
        },
        scales: {
            xAxes: [{
                display: true,  
                scaleLabel: {
                    display: true,
                    labelString: 'Entry Number'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: -3,
                    suggestedMax: 2,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'BMI Z-score'
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                usePointStyle: true,
                boxWidth: 3 
            }
        }
    }
});

var ctx2 = document.getElementById('chart2').getContext('2d');
var chart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: entryNumber,
        datasets: [{
            label: 'Your Child',
            borderColor: 'rgb(0, 0, 255)',
            pointBackgroundColor: 'rgb(0, 0, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: fruits
        }, {
            label: 'Recommended',
            borderColor: 'rgb(255, 0, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            borderDash: [10, 10],
            lineTension: 0,
            data: rFruits
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Fruit Intake Trend',
            fontSize: 20
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Entry Number'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 8,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Serves of Fruit/day'
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                usePointStyle: true,
                boxWidth: 3 
            }
        }
    }
});

var ctx3 = document.getElementById('chart3').getContext('2d');
var chart3 = new Chart(ctx3, {
    type: 'line',
    data: {
        labels: entryNumber,
        datasets: [{
            label: 'Your Child',
            borderColor: 'rgb(0, 0, 255)',
            pointBackgroundColor: 'rgb(0, 0, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: veggies
        }, {
            label: 'Recommended',
            borderColor: 'rgb(255, 0, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: rVeggies
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Vegetable Intake Trend',
            fontSize: 20
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Entry Number'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 8,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Serves of Vegetables/day'
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                usePointStyle: true,
                boxWidth: 3 
            }
        }
    }
});

var ctx4 = document.getElementById('chart4').getContext('2d');
var chart4 = new Chart(ctx4, {
    type: 'line',
    data: {
        labels: entryNumber,
        datasets: [{
            label: 'Your Child',
            borderColor: 'rgb(0, 0, 255)',
            pointBackgroundColor: 'rgb(0, 0, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: duration
        }, {
            label: 'Recommended',
            borderColor: 'rgb(255, 0, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: rExercise
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Exercise Duration Trend',
            fontSize: 20
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Entry Number'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 200,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Duration of Exercise/day'
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                usePointStyle: true,
                boxWidth: 3 
            }
        }
    }
});

var ctx5 = document.getElementById('chart5').getContext('2d');
var chart5 = new Chart(ctx5, {
    type: 'line',
    data: {
        labels: entryNumber,
        datasets: [{
            label: 'Your Child (School Days)',
            borderColor: 'rgb(0, 0, 255)',
            pointBackgroundColor: 'rgb(0, 0, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: screenTimeSD
        }, {
            label: 'Your Child (Weekends)',
            borderColor: 'rgb(0,255,255)',
            pointBackgroundColor: 'rgb(0, 255, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: screenTimeNSD
        }, {
            label: 'Recommended',
            borderColor: 'rgb(255, 0, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: rScreenTime
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Screen Time Trend',
            fontSize: 20
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Entry Number'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 8,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Hours/day'
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                usePointStyle: true,
                boxWidth: 3 
            }
        }
    }
});

var ctx6 = document.getElementById('chart6').getContext('2d');
var chart6 = new Chart(ctx6, {
    type: 'line',
    data: {
        labels: entryNumber,
        datasets: [{
            label: 'Your Child (School Days)',
            borderColor: 'rgb(0, 0, 255)',
            pointBackgroundColor: 'rgb(0, 0, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: durationSD
        }, {
            label: 'Your Child (Weekends)',
            borderColor: 'rgb(0,255,255)',
            pointBackgroundColor: 'rgb(0, 255, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: durationNSD
        }, {
            label: 'Upper Range',
            borderColor: 'rgb(0, 255, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: rSleepMax
        }, {
            label: 'Lower Range',
            borderColor: 'rgb(0, 255, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: rSleepMin
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Sleep Duration Trend',
            fontSize: 20
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Entry Number'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 12,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Hours/day'
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                usePointStyle: true,
                boxWidth: 3 
            }
        }
    }
});

var ctx7 = document.getElementById('chart7').getContext('2d');
var chart7 = new Chart(ctx7, {
    type: 'line',
    data: {
        labels: entryNumber,
        datasets: [{
            label: 'Your Child (Mental State Score)',
            borderColor: 'rgb(0, 0, 255)',
            pointBackgroundColor: 'rgb(0, 0, 255)',
            pointRadius: 3,
            fill: false,
            lineTension: 0,
            data: MentalScore
        }, {
            label: 'Recommended',
            borderColor: 'rgb(255, 0, 0)',
            fill: false,
            pointRadius: 0,
            pointHitRadius: 2,
            lineTension: 0,
            borderDash: [10, 10],
            data: MentalScore
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Mental Score Trend',
            fontSize: 20
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Entry Number'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 30,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Score'
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                usePointStyle: true,
                boxWidth: 3 
            }
        }
    }
});
