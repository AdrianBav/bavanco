@extends('decks.station')

@section('extra')
@overwrite

@section('title')
    World Times
@overwrite

@section('subtitle')
   Bavanco Global
@overwrite


@section('details')
    Time @right('at page load')<br><br>
    @ditto('Time') in Dallas @right($dallas)<br><br>
    @ditto('Time') @ditto('in') London @right($london)<br><br>
    @ditto('Time') @ditto('in') Melbourne @right($melbourne)<br><br>
    % of Year Elapsed @right($percent)
@overwrite
