@extends('layouts.app')

@section('content')
    <br>
    <br>
    <section class="module">
        <div class="container">
            <h1>Cтатистика </h1>
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>
    </section>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <br><br>
    <div id="myfirstchart"></div>

    <script>
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Уроки');
            data.addColumn('number', 'Урок');

            data.addRows([
                <?php
                foreach ($results as $item)
                    echo ' [\''.$item->created_at.'\', '.$item->result.', ], '
                ?>

            ]);

            // Set chart options
            var options = {
                chart: {
                    title: 'Статистика по уроку',
                },
                hAxis: {
                    title: 'Количество',
                },
                vAxis: {
                    title: 'Баллы',
                },
                'width':1000,
                'height':400,
                axes: {
                    x: {
                        0: {side: 'top'}
                    }
                }
            };

            // Instantiate and draw the chart.
            var chart = new google.charts.Line(document.getElementById('myfirstchart'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
    </script>


@endsection