<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>AKUNaZma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<x-navmin></x-navmin>

<body class="bg-[#f5f8ff] text-gray-900 pt-16">

    <main class="flex flex-col sm:flex-row min-h-[calc(100vh-56px)]">
        <!-- Sidebar -->
            <aside class="h-full">
                <x-sidemin />
            </aside>
        <section class="bg-white flex-1 p-4 flex flex-col gap-8 justify-center">
    <div class="w-full max-w-3xl mx-auto">
        <div class="bg-[#f5f8ff] rounded-xl shadow p-4 mb-8">
            <div id="container" class="w-full min-h-[320px]"></div>
        </div>
        <div class="bg-[#f5f8ff] rounded-xl shadow p-4">
            <div id="pie" class="w-full min-h-[320px]"></div>
        </div>
    </div>
</section>
    </main>
</body>


<!-- //script untuk grafik kolom -->
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Statistik Download Kalkulator Setiap Usaha per Bulan',
            style: {
                fontFamily: 'Poppins, sans-serif',
            }
        },
        subtitle: {
            text:
                '' +
                ''
        },
        xAxis: {
            categories: {!! json_encode($bulan) !!},
            crosshair: true,
            accessibility: {
                description: 'Bulan'
            }
        },
        yAxis: {
            min: 0,
            max: 100,
            tickInterval: 20,
            title: {
                text: 'Jumlah Download',
                style: {
                fontFamily: 'Poppins, sans-serif',
            }
            }
        },
        tooltip: {
            valueSuffix: ' download'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: {!! json_encode($series) !!}
    });

    

</script>



<!-- //script untuk pie chart -->
<script>
    Highcharts.chart('pie', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Total Download Kalkulator per Usaha (Sejak Awal)',
            style: {
                fontFamily: 'Poppins, sans-serif',
            }
        },
        subtitle: {
            text: 'Persentase dan jumlah download seluruh layanan',
            style: {
                fontFamily: 'Poppins, sans-serif',
            }
        },
        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: ' download'
            }
        },
        plotOptions: {
            pie: {
                borderRadius: 5,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y} download<br>({point.percentage:.1f}%)',
                    style: {
                        fontSize: '0.95em',
                        textOutline: 'none'
                    }
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} download</b> ({point.percentage:.1f}%)<br/>'
        },
        series: [{
            name: 'Total Download',
            colorByPoint: true,
            data: {!! json_encode($pieData) !!}
        }]
    });
</script>