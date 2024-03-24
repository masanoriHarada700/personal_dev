import Chart from "chart.js/auto";

const ctx = document.getElementById("myChart").getContext("2d");

var categories = Object.keys(amountTimesByCategoryId);
var amountTimes = Object.values(amountTimesByCategoryId);
var [timeOfBackend, timeOfFrontend, timeOfInfra] = amountTimes;
var [strBackend, strFrontend, strInfra] = categories;


const myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["先々月", "先月", "今月"],
        datasets: [
            {
                label: strBackend,
                data: timeOfBackend,
                backgroundColor: [
                    "rgba(255, 99, 132, 0.5)",
                    "rgba(255, 99, 132, 0.5)",
                    "rgba(255, 99, 132, 0.5)",

                ],
                borderColor: [
                    "rgba(255, 99, 132, 0.5)",
                    "rgba(255, 99, 132, 0.5)",
                    "rgba(255, 99, 132, 0.5)",

                ],
                borderWidth: 0.5,
                barPercentage: 0.8,
                categoryPercentage: 0.8,
            },
            {
                label: strFrontend,
                data: timeOfFrontend,
                backgroundColor: [
                    "rgba(245, 163, 39, 0.4)",
                    "rgba(245, 163, 39, 0.4)",
                    "rgba(245, 163, 39, 0.4)",
                ],
                borderColor: [
                    "rgba(245, 163, 39, 0.8)",
                    "rgba(245, 163, 39, 0.8)",
                    "rgba(245, 163, 39, 0.8)",
                ],
                borderWidth: 0.5,
                barPercentage: 0.8,
                categoryPercentage: 0.8,
            },
            {
                label: strInfra,
                data: timeOfInfra,
                backgroundColor: [
                    "rgba(255, 206, 86, 0.4)",
                    "rgba(255, 206, 86, 0.4)",
                    "rgba(255, 206, 86, 0.4)",
                ],
                borderColor: [
                    "rgba(255, 206, 86, 0.8)",
                    "rgba(255, 206, 86, 0.8)",
                    "rgba(255, 206, 86, 0.8)",
                ],
                borderWidth: 0.5,
                barPercentage: 0.8,
                categoryPercentage: 0.8,
            },
        ],

    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                suggestedMax: 100,
                }
        },
        plugins: {
            title: {
                display: true,
                position: 'top',
                text: 'chart.js Bar Chart',
            }

        },
    },
});