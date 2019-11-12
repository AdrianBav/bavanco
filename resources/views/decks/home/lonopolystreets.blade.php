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
    PROJECT—Since @right($since['year'])<br>
    @ditto('PROJECT') number of years @right($since['years'])<br>
    @ditto('PROJECT') @ditto('number') @ditto('of') months @right($since['months'])<br>
    @ditto('PROJECT') @ditto('number') @ditto('of') weeks @right($since['weeks'])<br>
    @ditto('PROJECT') @ditto('number') @ditto('of') days @right($since['days'])<br>
    @ditto('PROJECT') TOTAL days @right($since['totalDays'])<br>
    <small>My personal collection of photographs taken at and around each of the streets on the London monopoly board.</small><br>
    PROJECT has {{ $meta->itemOne }}<br>
    @ditto('PROJECT') @ditto('has') {{ $meta->itemTwo }}<br>
    @spacer('PROJECT') @spacer('has') {{ $meta->info }}<br>
    VISITS since launch, {{ $visits }}
@overwrite
