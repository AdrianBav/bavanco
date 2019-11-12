@extends('decks.property')

@section('extra')
@overwrite

@section('group')
    deed-group7
@overwrite

@section('subtitle')
    Bavanco.co.uk
@overwrite

@section('title')
    Lonopolystreets
@overwrite


@section('details')
    STREETS—Since @right($since['year'])<br>
    @ditto('STREETS') number of years @right($since['years'])<br>
    @ditto('STREETS') @ditto('number') @ditto('of') months @right($since['months'])<br>
    @ditto('STREETS') @ditto('number') @ditto('of') weeks @right($since['weeks'])<br>
    @ditto('STREETS') @ditto('number') @ditto('of') days @right($since['days'])<br>
    @ditto('STREETS') TOTAL days @right($since['totalDays'])<br>
    <small>My personal collection of photographs taken at and around each of the streets on the London monopoly board.</small><br>
    STREETS has {{ $meta->itemOne }}<br>
    @ditto('STREETS') @ditto('has') {{ $meta->itemTwo }}<br>
    @spacer('STREETS') @spacer('has') {{ $meta->info }}<br>
    VISITS since launch, {{ $visits }}
@overwrite
