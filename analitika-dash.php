<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo '<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template page">
    <meta name="keywords" content="Template page">
    <meta name="author" content="Omer Dedic">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="slike/icons8-capital-100.png">
    <title>Dashboard</title>
    <style>
    .bg-error {
        height: 300px;
        width: 50%;
        background-color: rgba(184, 184, 184, 0.155);
        border-radius: 12px;
    }
    .naslov-error-login {
        font-family: Arial, Helvetica, sans-serif;
        padding-top: 50px;
        text-align: center;
        color: rgb(123, 123, 123);
    }
    .error-dugmad {
        display: flex;
        justify-content: center;
        margin-top: 50px;
        gap: 50px;
    }
    .primary-button-error {
        background-color: #071952;
        color: white;
        border: none;
        padding: 12px;
        font-size: 18px;
        border-radius: 12px;
    }
    .secondary-button-error {
        background-color: transparent;
        color: #133FD1;
        border: 2px solid #133FD1;
        padding: 12px;
        font-size: 18px;
        border-radius: 12px;
    }
    .askdjn {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>
<body>
    <div class="askdjn">
    <div class="bg-error">
        <h1 class="naslov-error-login"> Prijavite se kako bi vidjeli ovu stranicu! </h1>
        <div class="error-dugmad">
            <a href="pocetna.php"><button class="secondary-button-error">Idi na početnu</button></a>
            <a href="login.php"><button class="primary-button-error">Idi na prijavu</button></a>
        </div>
    </div>
    </div>
</body>
</html>';
    die();
}

$conn = new mysqli("localhost", "root", "", "bazapodataka");
if ($conn->connect_error) {
    die("Konekcija s bazom nije uspjela: " . $conn->connect_error);
}

$month_start = date('Y-m-01');
$month_end = date('Y-m-t');

$unique_visitors_query = "SELECT COUNT(DISTINCT id) as total FROM posjete WHERE datum BETWEEN '$month_start' AND '$month_end'";
$unique_visitors = $conn->query($unique_visitors_query)->fetch_assoc()['total'] ?? 0;
$unique_visitors_formatted = number_format($unique_visitors);

$pageviews_query = "SELECT SUM(broj_posjeta) as total FROM posjete WHERE datum BETWEEN '$month_start' AND '$month_end'";
$pageviews = $conn->query($pageviews_query)->fetch_assoc()['total'] ?? 0;
$pageviews_formatted = number_format($pageviews);

$total_visits_query = "SELECT COUNT(*) as total FROM posjete WHERE datum BETWEEN '$month_start' AND '$month_end'";
$total_visits = $conn->query($total_visits_query)->fetch_assoc()['total'] ?? 0;
$bounce_visits_query = "SELECT COUNT(*) as total FROM posjete WHERE session_duration < 10 AND datum BETWEEN '$month_start' AND '$month_end'";
$bounce_visits = $conn->query($bounce_visits_query)->fetch_assoc()['total'] ?? 0;
$bounce_rate = $total_visits > 0 ? round(($bounce_visits / $total_visits) * 100, 1) : 0;

$visit_duration_query = "SELECT AVG(session_duration) as avg FROM posjete WHERE datum BETWEEN '$month_start' AND '$month_end' AND session_duration IS NOT NULL";
$visit_duration_result = $conn->query($visit_duration_query);
$visit_duration = $visit_duration_result->fetch_assoc()['avg'] ?? 0;
$visit_duration_formatted = $visit_duration ? floor($visit_duration / 60) . 'm ' . round($visit_duration % 60) . 's' : '0s';

$last_month_start = date('Y-m-01', strtotime('-1 month'));
$last_month_end = date('Y-m-t', strtotime('-1 month'));

$unique_visitors_last_query = "SELECT COUNT(DISTINCT id) as total FROM posjete WHERE datum BETWEEN '$last_month_start' AND '$last_month_end'";
$unique_visitors_last = $conn->query($unique_visitors_last_query)->fetch_assoc()['total'] ?? 0;
$unique_visitors_change = $unique_visitors_last > 0 ? round(($unique_visitors - $unique_visitors_last) / $unique_visitors_last * 100, 1) : 0;

$pageviews_last_query = "SELECT SUM(broj_posjeta) as total FROM posjete WHERE datum BETWEEN '$last_month_start' AND '$last_month_end'";
$pageviews_last = $conn->query($pageviews_last_query)->fetch_assoc()['total'] ?? 0;
$pageviews_change = $pageviews_last > 0 ? round(($pageviews - $pageviews_last) / $pageviews_last * 100, 1) : 0;

$total_visits_last_query = "SELECT COUNT(*) as total FROM posjete WHERE datum BETWEEN '$last_month_start' AND '$last_month_end'";
$total_visits_last = $conn->query($total_visits_last_query)->fetch_assoc()['total'] ?? 0;
$bounce_visits_last_query = "SELECT COUNT(*) as total FROM posjete WHERE session_duration < 10 AND datum BETWEEN '$last_month_start' AND '$last_month_end'";
$bounce_visits_last = $conn->query($bounce_visits_last_query)->fetch_assoc()['total'] ?? 0;
$bounce_rate_last = $total_visits_last > 0 ? round(($bounce_visits_last / $total_visits_last) * 100, 1) : 0;
$bounce_rate_change = $bounce_rate_last > 0 ? round($bounce_rate - $bounce_rate_last, 1) : 0;

$visit_duration_last_query = "SELECT AVG(session_duration) as avg FROM posjete WHERE datum BETWEEN '$last_month_start' AND '$last_month_end' AND session_duration IS NOT NULL";
$visit_duration_last = $conn->query($visit_duration_last_query)->fetch_assoc()['avg'] ?? 0;
$visit_duration_change = $visit_duration_last > 0 ? round(($visit_duration - $visit_duration_last) / $visit_duration_last * 100, 1) : 0;

$traffic_data = array_fill(0, 30, 0);
$dates = [];
for ($i = 29; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $dates[] = date('d M', strtotime($date));
    $traffic_query = "SELECT SUM(broj_posjeta) as total FROM posjete WHERE datum = '$date'";
    $traffic_result = $conn->query($traffic_query);
    $traffic_data[29 - $i] = $traffic_result->fetch_assoc()['total'] ?? 0;
}

$country_data = [];
$country_query = "SELECT country, SUM(broj_posjeta) as total FROM posjete WHERE datum BETWEEN '$month_start' AND '$month_end' GROUP BY country ORDER BY total DESC LIMIT 3";
$country_result = $conn->query($country_query);
$total_country_visits = 0;
while ($row = $country_result->fetch_assoc()) {
    if ($row['country']) {
        $country_data[$row['country']] = $row['total'] ?? 0;
        $total_country_visits += $row['total'];
    }
}
$country_percentages = [];
foreach ($country_data as $country => $visits) {
    $country_percentages[$country] = $total_country_visits > 0 ? round(($visits / $total_country_visits) * 100) : 0;
}

$devices = ['Desktop' => 0, 'Mobitel' => 0, 'Tablet' => 0];
$device_query = "SELECT uredjaj, SUM(broj_posjeta) as total FROM posjete WHERE datum BETWEEN '$month_start' AND '$month_end' GROUP BY uredjaj";
$device_result = $conn->query($device_query);
$total_device_visits = 0;
while ($row = $device_result->fetch_assoc()) {
    if (isset($devices[$row['uredjaj']])) {
        $devices[$row['uredjaj']] = $row['total'] ?? 0;
        $total_device_visits += $row['total'];
    }
}
$device_heights = [];
foreach ($devices as $device => $visits) {
    $device_heights[$device] = $total_device_visits > 0 ? round(($visits / $total_device_visits) * 100) : 0;
}

$conn->close();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template page">
    <meta name="keywords" content="Template page">
    <meta name="author" content="Omer Dedic">
    <link href="style.css?v=1.8" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="slike/icons8-capital-100.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <title>Dashboard-Analitika</title>

</head>
<body>

    <!-- Navbar fixed left -->
        <div class="navbar-fixed-left">
            <img class="logo-nav-dash" src="slike/logo.png">
            <div class="logcircle-dash">
                <img class="logiconimage-dash" src="slike/user-icon-login.png">
            </div>
            <p class="welcome-dash"><?= htmlspecialchars($_SESSION['username']) ?></p>
            <a href="dashboard.php" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                    <path class="st0" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" stroke="#1C274C" stroke-width="1.5"/>
                    <path class="st0" d="M15 18H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/></svg>
                Pocetna</a>
            <a href="blog-dash.php" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" xml:space="preserve">
                    <polygon class="st0" points="17.8,17 15,17 15,14.2 25.6,3.6 28.4,6.4"/>
                    <path class="st0" d="M25,10v13c0,1.1-0.9,2-2,2H9c-1.1,0-2-0.9-2-2V9c0-1.1,0.9-2,2-2h13.2"/></svg>
                Blog</a>
            <a href="poruke-dash.php" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                    <path class="st0" d="M3 13V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.0799 18 6.2 18H16.2446C16.5263 18 16.6672 18 16.8052 18.0193C16.9277 18.0365 17.0484 18.065 17.1656 18.1044C17.2977 18.1488 17.4237 18.2118 17.6757 18.3378L21 20V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H13M8.12132 3.87868C9.29289 5.05025 9.29289 6.94975 8.12132 8.12132C6.94975 9.29289 5.05025 9.29289 3.87868 8.12132C2.70711 6.94975 2.70711 5.05025 3.87868 3.87868C5.05025 2.70711 6.94975 2.70711 8.12132 3.87868Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Poruke</a>
            <a href="rec-dash.php" class="svg-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px" viewBox="0 0 52 52">
                    <path class="icon-shape" d="M27.4133467,3.10133815 L32.0133467,18.1013381 C32.2133467,18.7013381 32.8133467,19.0013381 33.4133467,19.0013381 L48.4133467,19.0013381 C49.9133467,19.0013381 50.5133467,21.0013381 49.3133467,21.9013381 L37.1133467,30.9013381 C36.6133467,31.3013381 36.4133467,32.0013381 36.6133467,32.6013381 L42.4133467,48.0013381 C42.8133467,49.4013381 41.3133467,50.6013381 40.1133467,49.7013381 L27.0133467,39.9013381 C26.5133467,39.5013381 25.8133467,39.5013381 25.2133467,39.9013381 L12.0133467,49.7013381 C10.8133467,50.6013381 9.21334668,49.4013381 9.71334668,48.0013381 L15.3133467,32.6013381 C15.5133467,32.0013381 15.3133467,31.3013381 14.8133467,30.9013381 L2.61334668,21.9013381 C1.41334668,21.0013381 2.11334668,19.0013381 3.51334668,19.0013381 L18.5133467,19.0013381 C19.2133467,19.0013381 19.7133467,18.8013381 19.9133467,18.1013381 L24.6133467,3.00133815 C25.0133467,1.60133815 27.0133467,1.70133815 27.4133467,3.10133815 Z M26.0133467,12.8023264 C26,14.1700393 26,33.5426636 26,34.4953918 C26.1865845,34.6476135 28.9331193,36.6890643 34.2396046,40.6197441 C34.9394191,41.144605 35.8141872,40.4447905 35.5809157,39.6283403 L35.5809157,39.6283403 L32.3085327,31.0201416 C31.9597778,30.2501831 32.3085327,29.7487793 32.7398682,29.4849854 L32.7398682,29.4849854 L39.6048489,24.6961622 C40.3046634,24.1713013 39.9547562,23.0049438 39.0799881,23.0049438 L39.0799881,23.0049438 L31.0206299,23.0049438 C30.6707226,23.0049438 29.7518921,22.8880615 29.5025635,21.9888306 L29.5025635,21.9888306 L26.8332347,13.4436151 C26.7175852,13.0388421 26.3602784,12.8204102 26.0133467,12.8023264 Z"/></svg>
                Recenzije</a>
            <a href="analitika-dash.php" class="svg-link active">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2.8 -2.8 33.60 33.60" height="207px" width="207px" class="custom-icon">
                    <g>
                        <path d="M1 20C1 18.8954 1.89543 18 3 18H6C7.10457 18 8 18.8954 8 20V25C8 26.1046 7.10457 27 6 27H3C1.89543 27 1 26.1046 1 25V20ZM6 20.4C6 20.1791 5.82091 20 5.6 20H3.4C3.17909 20 3 20.1791 3 20.4V24.6C3 24.8209 3.17909 25 3.4 25H5.6C5.82091 25 6 24.8209 6 24.6V20.4Z" clip-rule="evenodd" class="icon-shape"></path>
                        <path d="M10 3C10 1.89543 10.8954 1 12 1H15C16.1046 1 17 1.89543 17 3V25C17 26.1046 16.1046 27 15 27H12C10.8954 27 10 26.1046 10 25V3ZM15 3.4C15 3.17909 14.8209 3 14.6 3L12.4 3C12.1791 3 12 3.17909 12 3.4V24.6C12 24.8209 12.1791 25 12.4 25H14.6C14.8209 25 15 24.8209 15 24.6V3.4Z" clip-rule="evenodd" class="icon-shape"></path>
                        <path d="M19 11C19 9.89543 19.8954 9 21 9H24C25.1046 9 26 9.89543 26 11V25C26 26.1046 25.1046 27 24 27H21C19.8954 27 19 26.1046 19 25V11ZM24 11.4C24 11.1791 23.8209 11 23.6 11H21.4C21.1791 11 21 11.1791 21 11.4V24.6C21 24.8209 21.1791 25 21.4 25H23.6C23.8209 25 24 24.8209 24 24.6V11.4Z" clip-rule="evenodd" class="icon-shape"></path>
                    </g></svg>
                Analitika</a>
            <a class="logout-nav svg-link" href="logout.php">
                <svg class="st0" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)">
                    <g id="SVGRepo_bgCarrier"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                    <polyline points="46.02 21.95 55.93 31.86 46.02 41.77"></polyline><line x1="55.93" y1="31.86" x2="19.59" y2="31.86"></line>
                    <path d="M40,38.18V52a2.8,2.8,0,0,1-2.81,2.8H12A2.8,2.8,0,0,1,9.16,52V11.77A2.8,2.8,0,0,1,12,9H37.19A2.8,2.8,0,0,1,40,11.77V25"></path>
                    </g></svg>
                Odjavi se</a>
        </div>
    <!-- End of navbar fixed left -->

    <!-- Page content -->
        <div class="content-dashboardAnalytics">

            <h1 class="porukeHeader">ANALITIKA</h1>

            <div class="gvbhnj">
                <div class="dashboard">
                    <!-- Metrics Cards -->
                    <div class="analkard">
                        <!-- Unique Visitors Card -->
                        <div class="card">
                            <div class="card-header">Posjetitelji</div>
                            <div class="metric-value"><?= $unique_visitors_formatted ?></div>
                            <div class="metric-change <?= $unique_visitors_change >= 0 ? 'positive' : 'negative' ?>">
                                <?= $unique_visitors_change >= 0 ? '+' : '' ?><?= $unique_visitors_change ?>% <span style="color: var(--light-text); margin-left: 5px;">naspram zadnjeg mjeseca</span>
                            </div>
                        </div>
                        
                        <!-- Total Pageviews Card -->
                        <div class="card">
                            <div class="card-header">Posjećenost stranica</div>
                            <div class="metric-value"><?= $pageviews_formatted ?></div>
                            <div class="metric-change <?= $pageviews_change >= 0 ? 'positive' : 'negative' ?>">
                                <?= $pageviews_change >= 0 ? '+' : '' ?><?= $pageviews_change ?>% <span style="color: var(--light-text); margin-left: 5px;">naspram zadnjeg mjeseca</span>
                            </div>
                        </div>
                        
                        <!-- Bounce Rate Card -->
                        <div class="card">
                            <div class="card-header">Izlazni posjetitelji</div>
                            <div class="metric-value"><?= $bounce_rate ?>%</div>
                            <div class="metric-change <?= $bounce_rate_change <= 0 ? 'positive' : 'negative' ?>">
                                <?= $bounce_rate_change > 0 ? '+' : '' ?><?= $bounce_rate_change ?>% <span style="color: var(--light-text); margin-left: 5px;">naspram zadnjeg mjeseca</span>
                            </div>
                        </div>
                        
                        <!-- Visit Duration Card -->
                        <div class="card">
                            <div class="card-header">Dužina posjeta stranici</div>
                            <div class="metric-value"><?= $visit_duration_formatted ?></div>
                            <div class="metric-change <?= $visit_duration_change >= 0 ? 'positive' : 'negative' ?>">
                                <?= $visit_duration_change >= 0 ? '+' : '' ?><?= $visit_duration_change ?>% <span style="color: var(--light-text); margin-left: 5px;">naspram zadnjeg mjeseca</span>
                            </div>
                        </div>
                    </div>

                    <div class="restanalt">
                        <!-- Analytics Chart Card -->
                        <div class="cardspec">
                            <div class="card-header">Posjete</div>
                            <div style="color: var(--light-text); font-size: 14px; margin-bottom: 10px;">Posjete ovog mjeseca</div>
                            <div class="chart-container">
                                <canvas id="analyticsChart"></canvas>
                            </div>
                        </div>  
                        
                        <!-- Customers Demographic Card -->
                        <div class="card">
                            <div class="card-header">Posjećenost iz zemalja</div>
                            <div class="demographic-container">
                                <?php if (!empty($country_data)): ?>
                                    <?php foreach ($country_data as $country => $visits): ?>
                                        <div class="country-item">
                                            <div>
                                                <div class="country-name"><?= htmlspecialchars($country) ?></div>
                                                <div class="country-count"><?= number_format($visits) ?> Visits</div>
                                            </div>
                                            <div class="country-percentage"><?= $country_percentages[$country] ?>%</div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="country-item">
                                        <div>No data available</div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Sessions By Device Card -->
                        <div class="card">
                            <div class="card-header">Posjećenost uređaja</div>
                            <div class="devices-container">
                                <div class="device">
                                    <div class="device-name">Desktop</div>
                                    <div class="device-chart">
                                        <div class="device-bar" style="height: <?= $device_heights['Desktop'] ?>%;"></div>
                                        <span class="device-tooltip"><?= number_format($devices['Desktop']) ?> posjete</span>
                                    </div>
                                </div>
                                <div class="device">
                                    <div class="device-name">Mobitel</div>
                                    <div class="device-chart">
                                        <div class="device-bar" style="height: <?= $device_heights['Mobitel'] ?>%;"></div>
                                        <span class="device-tooltip"><?= number_format($devices['Mobitel']) ?> posjete</span>
                                    </div>
                                </div>
                                <div class="device">
                                    <div class="device-name">Tablet</div>
                                    <div class="device-chart">
                                        <div class="device-bar" style="height: <?= $device_heights['Tablet'] ?>%;"></div>
                                        <span class="device-tooltip"><?= number_format($devices['Tablet']) ?> posjete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- End of page content -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = {
            labels: <?= json_encode($dates) ?>,
            datasets: [{
                label: 'Visitors',
                data: <?= json_encode($traffic_data) ?>,
                backgroundColor: '#0882952d',
                borderColor: '#088295',
                borderWidth: 1,
                tension: 0.4,
                fill: true
            }]
        };

        const chartConfig = {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            stepSize: 100
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        };

            window.onload = function() {
                const ctx = document.getElementById('analyticsChart').getContext('2d');
                new Chart(ctx, chartConfig);
                
                document.querySelectorAll('.time-filter').forEach(filter => {
                    filter.addEventListener('click', function() {
                        document.querySelectorAll('.time-filter').forEach(f => f.classList.remove('active'));
                        this.classList.add('active');
                        console.log('Time filter changed to:', this.textContent);
                    });
                });
                
                document.querySelectorAll('.view-report').forEach(report => {
                    report.addEventListener('click', function() {
                        console.log('Viewing report:', this.previousElementSibling.querySelector('thead th').textContent);
                    });
                });
            };
    </script>
</body>
</html>