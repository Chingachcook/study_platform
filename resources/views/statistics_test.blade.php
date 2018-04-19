<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- Useful meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, noodp">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">

    <title>Главная</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="">Имя ученика</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Модули
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="statistics.blade.php">Статистика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.html">Настройки</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Поиск</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <section class="module">
        <div class="container">
            <h1>Ваша статистика </h1>
            <br>
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>
    </section>



    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                <?php
                   foreach ($results as $item)
                       if ($item->module_id_test==$id_module)
                   echo ' { period: \''.$item->created_at.'\', value: '.$item->result.', number: '.$item->test_admin_id.'  },';
                ?>

            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'period',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value','number'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            xLabelFormat: function(period) {
                return period.getDate()+'/'+(period.getMonth()+1)+'/'+period.getFullYear();
            },
            labels: ['Баллы','Урок']
        });
    </script>
    <!-- JS -->
    <script src="js/main.js"></script>

</body>

</html>