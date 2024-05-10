import * as GoogleCharts from './GoogleCharts.js';

const colChart = new GoogleCharts.ColumnChart();

const monthlyOrders = document.getElementById('monthly-order-count');
const data1 = [
    ['Month', 'Order Count'],
    ['Oct. 2023', 1600],
    ['Nov. 2023', 1800],
    ['Dec. 2023', 2000],
    ['Jan. 2024', 1000],
    ['Feb. 2024', 1170],
    ['Mar. 2024', 660],
    ['Apr. 2024', 1030]
];
const option1 = JSON.parse(JSON.stringify(GoogleCharts.DefaultColChartOptions));
option1.title = 'Monthly Orders';
colChart.draw(monthlyOrders, data1, option1);

const monthlySales = document.getElementById('monthly-sales');
const data2 = [
    ['Month', 'Sales'],
    ['Oct. 2023', 10000],
    ['Nov. 2023', 18000],
    ['Dec. 2023', 20500],
    ['Jan. 2024', 19500],
    ['Feb. 2024', 11750],
    ['Mar. 2024', 6600],
    ['Apr. 2024', 10300]
];
const option2 = JSON.parse(JSON.stringify(GoogleCharts.DefaultColChartOptions));
option2.title = 'Monthly Sales';
option2.vAxis.format = '₱#,###';
colChart.draw(monthlySales, data2, option2);