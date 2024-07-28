<?= $this->extend('Admin\admin') ?>
<?= $this->section('content') ?>

<div class="container">
    <h1>Overview</h1>
    <div id="userChart"></div>
    <h2>Total Products: <?= $productCount ?></h2>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var userCounts = <?= json_encode($userCounts) ?>;

        var labels = userCounts.map(function(entry) {
            return entry.month;
        });
        var data = userCounts.map(function(entry) {
            return entry.count;
        });

        var options = {
            series: [{
                name: 'User Count',
                data: data
            }],
            chart: {
                type: 'line',
                height: '50%',
                width: '95%',
                responsive: true,
                animations: {
                    enabled: true
                }
            },
            title: {
                text: 'User Count Per Month',
                align: 'left'
            },
            xaxis: {
                categories: labels
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            }
        };

        var chart = new ApexCharts(document.querySelector("#userChart"), options);
        chart.render();
    });
</script>

<?= $this->endSection() ?>