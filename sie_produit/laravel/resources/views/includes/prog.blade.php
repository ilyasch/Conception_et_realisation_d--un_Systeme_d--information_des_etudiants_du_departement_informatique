@extends('home')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class='col-md-6'>
                <h1>Page des notes par semestre</h1>
                <canvas id="projects-graph" width="1000" height="400"></canvas>

           </div>
        </div>
    <div>

        <script src="{{ asset('/plugins/chartjs/chart.min.js') }}"></script>

        <script>
            (function() {
                //get container
                var ctx = document.getElementById('projects-graph').getContext('2d');
                //prepare data to chart
                var chart = {
                    labels: ['Semestre 3','Semestre 4','Semestre 5','Semestre 6'],
                    datasets :[{
                        label: "Note par semestre",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                    data:[{{  $semPmoy['s3'] }},{{  $semPmoy['s4'] }},{{  $semPmoy['s5'] }},{{  $semPmoy['s6'] }}]
                    }]
                };
                //drow
                new Chart(ctx).Line(chart);
            })();
        </script>
@endsection
