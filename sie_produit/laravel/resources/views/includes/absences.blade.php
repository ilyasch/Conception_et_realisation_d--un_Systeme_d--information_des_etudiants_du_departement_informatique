@extends('home')
@section('content')
    <script src="{{ asset('/plugins/chartjs/chart.min.js') }}"></script>

    <div class="container-fluid">
        <div class="row">
            @foreach($x as $k => $v)
                    <div class="col-md-4">
                        <h1>Module : {{ strtoupper($k) }}</h1>
                        <canvas id="{{$k}}" width="250" height="250" style="width: 250px; height: 250px;"></canvas>
                        <script>
                            var data = [
                                {
                                    value: {{ $v*100 }},
                                    color:"#F7464A",
                                    highlight: "#FF5A5E",
                                    label: "Absences"
                                },
                                {
                                    value: {{ 100-$v*100  }},
                                    color: "#FDB45C",
                                    highlight: "#FFC870",
                                    label: "Présences"
                                }
                            ]
                            // And for a doughnut chart
                            var myDoughnutChart = new Chart(document.getElementById('{{$k}}').getContext("2d")).Doughnut(data);
                        </script>
                        <h1>{{ $v*100 }} %</h1>
                    </div>
            @endforeach
        </div>
    </div><!-- ./col -->

@endsection