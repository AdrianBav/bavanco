@extends('layouts.dashboard')
@inject('statistics', 'App\Services\TrafficStatisticsService')


@section('content')

    <h3 class="mt-4 mb-5">
        Bavanco Traffic Dashboard
        <small class="text-muted">Get the traffic statistics across all Bavanco domains</small>
    </h3>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <h4>Summary:</h4>

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


    <refresh-dashboard
        :new-ip-count="{{ $statistics->getNewIps()->count() }}"
        :new-agent-count="{{ $statistics->getNewAgents()->count() }}"
        class="mt-5 mb-5"
    ></refresh-dashboard>


    <h4 class="mt-4">Top 10 IP countries</h4>

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


    <h4 class="mt-5">Agents</h4>

    <div class="d-flex justify-content-between">
        <chart :options="{{ json_encode($statistics->browserShareChart()) }}"></chart>
        <chart :options="{{ json_encode($statistics->platformShareChart()) }}"></chart>
        <chart :options="{{ json_encode($statistics->deviceShareChart()) }}"></chart>
    </div>

@endsection
