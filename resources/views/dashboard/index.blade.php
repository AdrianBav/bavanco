@extends('layouts.dashboard')
@inject('statistics', 'App\Services\TrafficStatisticsService')


@section('content')

    <h1>Dashboard</h1>

    <table class="table">
        <tr>
            <th>Site</th>
            <th>Visits</th>
            <th>Robots</th>
        </tr>
        @foreach ($statistics->sites() as $site)
        <tr>
            <td>{{ $site->slug }}</td>
            <td>{{ $site->visits }}</td>
            <td>{{ $site->robots }}</td>
        </tr>
        @endforeach
    </table>

    <p>There are x new IPS and x new Agents...</p>
    <button>Refresh Dashboard Statistics</button>

    <h3>Top 10 IP countries</h3>
    <table class="table">
        <tr>
            <th>Country</th>
            <th>Total</th>
        </tr>
        @foreach ($statistics->top10Ips() as $ip)
        <tr>
            <td>{{ $ip->country }}</td>
            <td>{{ $ip->total }}</td>
        </tr>
        @endforeach
    </table>

    <h3>Agents</h3>

    <h5>Pie chart of devices</h5>
    <doughnut-chart :chart-data="{{ json_encode($statistics->sampleChartData()) }}"></doughnut-chart>

    <h5>Pie chart of devices</h5>
    <p>pie</p>

    <h5>Pie chart of platform (version)</h5>
    <p>pie</p>

    <h5>Pie chart of browser (version)</h5>
    <p>pie</p>

    <h5>Pie chart of device type</h5>
    <p>pie</p>

@endsection
