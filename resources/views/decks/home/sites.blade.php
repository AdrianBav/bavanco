@extends('decks.property')

@section('extra')
@overwrite

@section('group')
    deed-group3
@overwrite

@section('subtitle')
    adrianbavister.com
@overwrite

@section('title')
    Sites Reference
@overwrite


@section('details')
    SITES—Since @right($since['year'])<br>
    @ditto('SITES') number of years @right($since['years'])<br>
    @ditto('SITES') @ditto('number') @ditto('of') months @right($since['months'])<br>
    @ditto('SITES') @ditto('number') @ditto('of') weeks @right($since['weeks'])<br>
    @ditto('SITES') @ditto('number') @ditto('of') days @right($since['days'])<br>
    @ditto('SITES') TOTAL days @right($since['totalDays'])<br>
    <small>This Site serves as a Handy Reference to ALL the Websites I have recently Developed for Friends and Myself.</small><br>
    SITES has {{ $meta->itemOne }}<br>
    @ditto('SITES') @ditto('has') {{ $meta->itemTwo }}<br>
    @spacer('SITES') @spacer('has') {{ $meta->info }}<br>
    VISITS since launch, {{ $visits }}
@overwrite
