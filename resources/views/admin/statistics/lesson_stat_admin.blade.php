@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <br>

            <div class="col-md-9">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <br><br>
                <div id="myfirstchart"></div>

                <script>
                    google.charts.load('current', {packages: ['corechart', 'line']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        // Define the chart to be drawn.
                        var data = new google.visualization.DataTable();
                        <?php
                        echo 'data.addColumn(\'string\',  \'Урок '.$id.' \');';
                        echo 'data.addColumn(\'number\', \'Урок '.$id.' \');'
                        ?>

                       data.addRows([
                            <?php
                            foreach ($results as $item)
                                echo ' [\''.$item->name.'\', '.$item->result.', ], '
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
                            'width':900,
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
            </div>
        </div>
    </div>
@endsection