<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>AKUNaZma</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <!-- Font style -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f5f8ff] text-gray-900 pt-16 min-h-screen">

    <!-- Navbar -->
    <x-navmin />

    <!-- Layout utama -->
    <main class="flex min-h-[calc(100vh-4rem)]">
        <!-- Sidebar -->
        <aside class="w-64 bg-white min-h-full border-r sticky top-16">
            <x-sidemin />
        </aside>

        <!-- Konten Utama -->
        <section class="flex-1 bg-white p-4 flex flex-col gap-8 justify-start">
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

    <!-- Highcharts: Grafik Kolom -->
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statistik Download Kalkulator Setiap Usaha per Bulan',
                style: { fontFamily: 'Poppins, sans-serif' }
            },
            xAxis: {
                categories: {!! json_encode($bulan) !!},
                crosshair: true,
                accessibility: { description: 'Bulan' }
            },
            yAxis: {
                min: 0,
                max: 100,
                tickInterval: 20,
                title: {
                    text: 'Jumlah Download',
                    style: { fontFamily: 'Poppins, sans-serif' }
                }
            },
            tooltip: { valueSuffix: ' download' },
            plotOptions: {
                column: { pointPadding: 0.2, borderWidth: 0 }
            },
            series: {!! json_encode($series) !!}
        });
    </script>

    <!-- Highcharts: Pie Chart -->
    <script>
        Highcharts.chart('pie', {
            chart: { type: 'pie' },
            title: {
                text: 'Total Download Kalkulator per Usaha (Sejak Awal)',
                style: { fontFamily: 'Poppins, sans-serif' }
            },
            subtitle: {
                text: 'Persentase dan jumlah download seluruh layanan',
                style: { fontFamily: 'Poppins, sans-serif' }
            },
            accessibility: {
                announceNewData: { enabled: true },
                point: { valueSuffix: ' download' }
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
</body>
</html>
