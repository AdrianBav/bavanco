@extends('layouts.dashboard')
@inject('statistics', 'App\Services\TrafficStatisticsService')


@section('content')

    <h1>Dashboard</h1>

    <hr class="mt-5 mb-5">

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

    <hr class="mt-5 mb-5">

    <p>There are {{ $statistics->getNewIps()->count() }} new IPs and {{ $statistics->getNewAgents()->count() }} new Agents...</p>
    <form action="/dashboard/refresh" method="POST">
        @csrf
        <button type="submit">Refresh Dashboard Statistics</button>
    </form>

    <hr class="mt-5 mb-5">

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

    <hr class="mt-5 mb-5">

    <h3>Agents</h3>

    <h5>Pie chart of browser</h5>
    <chart :options="{{ json_encode($statistics->browserShareChart()) }}"></chart>

    <h5>Pie chart of platform</h5>
    <chart :options="{{ json_encode($statistics->platformShareChart()) }}"></chart>

    <h5>Pie chart of devices</h5>
    <chart :options="{{ json_encode($statistics->deviceShareChart()) }}"></chart>

@endsection
