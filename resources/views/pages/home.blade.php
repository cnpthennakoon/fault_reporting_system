@extends('main')

@section('title', 'Home')

@section('content')

    <div class="columns">
        <div class="column is-8">
            <canvas id="barChart"></canvas>
        </div>
    </div>

@endsection

@section('script')

    <script>
        const CHART = document.getElementById("barChart");

        Chart.defaults.scale.ticks.beginAtZero = true;

        var barChart = new Chart(CHART, {

            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        label: "Number of Faults Reported",
                        data: [@foreach($data as $number)
                                    {{$number.','}}
                               @endforeach],
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderWidth: "1",
                        borderColor: "rgb(102, 204, 255)",
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        spanGaps: false,
                    },

                    {
                        label: "Number of Completed Reported",
                        data: [@foreach($completed_data as $number)
                            {{$number.','}}
                            @endforeach],
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(255, 206, 86, 0.2)",
                        borderWidth: "1",
                        borderColor: "rgba(255, 206, 86, 1)",
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        spanGaps: false,
                    }
                ]



            }
        });

    </script>

    @endsection