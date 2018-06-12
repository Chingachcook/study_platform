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


<!--
    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [

             //      foreach ($results as $item)
              //         if ($item->module_id_test==$id_module)
              //     echo ' { quantity: \''.$i++.'\',date: \''.$item->created_at.'\' , value: '.$item->result.' ' .', number: '.$item->test_admin_id.' },';


            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'quantity',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart
            yLabelFormat: function (value) { return value; },
            xLabelFormat: function(date) {
                return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear();
            },
            labels: ['Баллы','Урок','Дата']
        });
    </script> -->

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
                echo ' [\''.$item->test_admin_id.'\', '.$item->result.', ], '
            ?>

        ]);

        // Set chart options
        var options = {
            chart: {
                title: 'Статистика по модулю',
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

<!-- JS -->
<script src="js/main.js"></script>

@endsection