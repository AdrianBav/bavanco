@extends('layouts.dashboard')
@inject('statistics', 'App\Services\TrafficStatisticsService')


@section('content')

    <h1>Dashboard</h1>

    <hr class="mt-5 mb-5">

    <table class="table table-sm table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Site</th>
                <th>Visits</th>
                <th>Robots</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics->sites() as $site)
            <tr>
                <td>{{ $site->slug }}</td>
                <td>{{ $site->visits }}</td>
                <td>{{ $site->robots }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr class="mt-5 mb-5">

    <p>There are {{ $statistics->getNewIps()->count() }} new IPs and {{ $statistics->getNewAgents()->count() }} new Agents...</p>
    <form action="/dashboard/refresh" method="POST">
        @csrf
        <button type="submit">Refresh Dashboard Statistics</button>
    </form>

    <hr class="mt-5 mb-5">

    <h3>Top 10 IP countries</h3>
    <table class="table table-sm table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Country</th>
                <th>Flag</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics->top10Ips() as $ip)
            <tr>
                <td>{{ $ip->country }}</td>
                <td><img src="{{ $ip->flag }}" alt="{{ $ip->country }}" height="10"></td>
                <td>{{ $ip->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr class="mt-5 mb-5">

    <h3>Agents</h3>

    <div class="d-flex justify-content-between">
        <chart :options="{{ json_encode($statistics->browserShareChart()) }}"></chart>
        <chart :options="{{ json_encode($statistics->platformShareChart()) }}"></chart>
        <chart :options="{{ json_encode($statistics->deviceShareChart()) }}"></chart>
    </div>

@endsection
