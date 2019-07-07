@extends('decks.property')

@section('extra')
@overwrite

@section('group')
    deed-group6
@overwrite

@section('subtitle')
    Bavanco.co.uk
@overwrite

@section('title')
    My RHDB
@overwrite


@section('details')
    DB—Since @right($since['year'])<br>
    @ditto('DB') number of years @right($since['years'])<br>
    @ditto('DB') @ditto('number') @ditto('of') months @right($since['months'])<br>
    @ditto('DB') @ditto('number') @ditto('of') weeks @right($since['weeks'])<br>
    @ditto('DB') @ditto('number') @ditto('of') days @right($since['days'])<br>
    @ditto('DB') TOTAL days @right($since['totalDays'])<br>
    <small>A complete database of Radiohead concerts I have attended visually represeted by statistics, tables and charts.</small><br>
    DB has {{ $meta->itemOne }}<br>
    @ditto('DB') @ditto('has') {{ $meta->itemTwo }}<br>
    @spacer('DB') @spacer('has') {{ $meta->info }}<br>
    VISITS since launch, {{ $visits }}
@overwrite
