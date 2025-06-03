<x-navmin></x-navmin>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<body class="bg-[#f5f8ff] text-gray-900 pt-16">

<main class="flex flex-col sm:flex-row min-h-[calc(100vh-56px)]">

<x-sidemin></x-sidemin>



<section class="bg-white rounded-2xl flex-grow p-4 flex flex-col space-y-4">
    
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Banyaknya Penggunaan Kalkulator Setiap Usaha per Bulan
        </p>
    </figure>

    <figure class="highcharts-figure">
        <div id="pie"></div>
        <p class="highcharts-description">
            Pie chart where the individual slices can be clicked to expose more
            detailed data.
        </p>
    </figure>
  
</section>

</main>

</body>

<x-footer></x-footer>


//script untuk grafik kolom
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Statistik Download Kalkulator Setiap Usaha per Bulan'
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
            title: {
                text: 'Jumlah Download'
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



//script untuk pie chart
<script>
    Highcharts.chart('pie', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Total Download Kalkulator per Usaha (Sejak Awal)'
        },
        subtitle: {
            text: 'Persentase dan jumlah download seluruh layanan'
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