@extends('decks.station')

@section('extra')
@overwrite

@section('title')
    World Temperatures
@overwrite

@section('subtitle')
    Bavanco Global
@overwrite


@section('details')
    Temperature @right('&deg;C/&deg;F')<br><br>
    @ditto('Temperat') in Dallas @right($dallas)<br><br>
    @ditto('Temperat') @ditto('in') London @right($london)<br><br>
    @ditto('Temperat') @ditto('in') Melbourne @right($melbourne)<br><br>
    Season in Dallas @right($dallas_season)
@overwrite
