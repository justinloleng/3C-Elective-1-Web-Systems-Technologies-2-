<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Chart</title>
    <script src="chart.js"></script>
</head>
<body>
    <h2>User Registrations Per Month</h2>
    <canvas id="usersChart" width="600" height="300"></canvas>
    <script>
        const ctx = document.getElementById('usersChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_map(fn($m) => date("F", mktime(0, 0, 0, $m, 10)), array_keys($usersPerMonth->toArray()))) !!},
                datasets: [{
                    label: 'Users',
                    data: {{ json_encode(array_values($usersPerMonth->toArray())) }},
                    backgroundColor: 'rgba(75, 192, 192, 0.4)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>