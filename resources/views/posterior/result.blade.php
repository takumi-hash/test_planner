@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-md-1 col-md-5">
            <canvas id="myChart" height="100px"></canvas>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myBarChart = new Chart(ctx, {
                    type: 'horizontalBar',
                    data: {
                        labels: ['統制群', '実験群'],
                        datasets: [{
                            label: 'CVR(%)',
                            data: [10, 15, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 99, 132, 0.2)'

                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    suggestedMin: 0,
                                    suggestedMax: 100
                                }
                            }]
                        }
                    }
            });
            </script>
        </div>
        <div class="col-md-5">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Imp</th>
                        <th scope="col">CV</th>
                        <th scope="col">CVR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">統制群</th>
                        <td>{{ $control_imp }}</td>
                        <td>{{ $control_cv }}</td>
                        <td>{{ round($control_cv/$control_imp, 4)*100 }}%</td>
                    </tr>
                    <tr>
                        <th scope="row">実験群</th>
                        <td>{{ $experimental_imp }}</td>
                        <td>{{ $experimental_cv}}</td>
                        <td>{{ round($experimental_cv/$experimental_imp, 4)*100 }}%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">統計量</th>
                        <th scope="col">値</th>
                        <th scope="col">解釈</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><i>p</i>値</th>
                        <td>{{ $res->p_value }}</td>
                        <td>{{ $res->message_p }}</td>
                    </tr>
                    <tr>
                        <th scope="row">検定力</th>
                        <td>{{ $res->power }}</td>
                        <td>{{ $res->message_power }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
