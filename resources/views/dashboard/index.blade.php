@extends('layouts.dashboard')


@section('content')

    <h1>Dashboard</h1>

    <table class="table">
        <tr>
            <th>Site</th>
            <th>Visits</th>
            <th>Robots</th>
        </tr>
        @foreach ($sites as $site)
        <tr>
            <td>{{ $site->slug }}</td>
            <td>{{ $site->visits }}</td>
            <td>{{ $site->robots }}</td>
        </tr>
        @endforeach
    </table>

    <p>Statistics last updated on x days ago</p>
    <button>Update</button>

    <h3>Top 10 IP countries</h3>
    <table class="table">
        <tr>
            <th>IP</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>xxx.xxx.xxx.xxx</td>
            <td>Country</td>
        </tr>
        <tr>
            <td>xxx.xxx.xxx.xxx</td>
            <td>Country</td>
        </tr>
        <tr>
            <td>xxx.xxx.xxx.xxx</td>
            <td>Country</td>
        </tr>
    </table>

    <h3>Agents</h3>

    <h5>Pie chart of devices</h5>
    <canvas id="chart1" width="400" height="400"></canvas>

    <h5>Pie chart of devices</h5>
    <p>pie</p>

    <h5>Pie chart of platform (version)</h5>
    <p>pie</p>

    <h5>Pie chart of browser (version)</h5>
    <p>pie</p>

    <h5>Pie chart of device type</h5>
    <p>pie</p>

@endsection


@push('scripts')
<script>
    var ctx = document.getElementById('chart1');
    var data = {
        datasets: [{
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            data: [12, 19, 3, 5, 2, 3]
        }],
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']
    };

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: false
        },
    });
</script>
@endpush
