@extends('deeds.station')

@section('title') 
    Times
@overwrite

@section('subtitle') 
   Bavanco Global
@overwrite


@section('details')
    Time<br><br>
    @ditto('Time') in Dallas @right($dallas)<br><br>
    @ditto('Time') @ditto('in') London @right($london)<br><br>
    @ditto('Time') @ditto('in') Honolulu @right($honolulu)<br><br>
    Dallas Season @right('Summer')
@overwrite
