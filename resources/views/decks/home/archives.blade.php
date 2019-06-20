@extends('decks.property')

@section('extra')
@overwrite

@section('group')
    deed-group1
@overwrite

@section('subtitle')
    Bavanco.co.uk
@overwrite

@section('title')
    The Archives
@overwrite


@section('details')
    ARCHIVES—Since @right($since['year'])<br>
    @ditto('ARCHIV') number of years @right($since['years'])<br>
    @ditto('ARCHIV') @ditto('number') @ditto('of') months @right($since['months'])<br>
    @ditto('ARCHIV') @ditto('number') @ditto('of') weeks @right($since['weeks'])<br>
    @ditto('ARCHIV') @ditto('number') @ditto('of') days @right($since['days'])<br>
    @ditto('ARCHIV') TOTAL days @right($since['totalDays'])<br>
    <small>This archives site aims to Preserve a Definitive History of the Bavanco branding and online Web Presence.</small><br>
    ARCHIVES {{ $meta->itemOne }}<br>
    @ditto('ARCHIVES') {{ $meta->itemTwo }}<br>
    @spacer('ARCHIVES') @spacer('has') {{ $meta->info }}<br>
    VISITS since launch, {{ $visits }}
@overwrite
