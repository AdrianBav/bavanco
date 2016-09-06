@extends('deeds.station')

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
    @ditto('Temperat') @ditto('in') Honolulu @right($honolulu)<br><br>
    Dallas YTD Max @right($dallas_max)
@overwrite
