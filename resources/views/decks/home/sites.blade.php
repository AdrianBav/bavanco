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
    SITES—Since @right($card->since()['year'])<br>
    @ditto('SITES') number of years @right($card->since()['years'])<br>
    @ditto('SITES') @ditto('number') @ditto('of') months @right($card->since()['months'])<br>
    @ditto('SITES') @ditto('number') @ditto('of') weeks @right($card->since()['weeks'])<br>
    @ditto('SITES') @ditto('number') @ditto('of') days @right($card->since()['days'])<br>
    @ditto('SITES') TOTAL days @right($card->since()['totalDays'])<br>
    <small>This Site serves as a Handy Reference to ALL the Websites I have recently Developed for Friends and Myself.</small><br>
    SITES has {{ $domains }} domains<br>
    @ditto('SITES') @ditto('has') {{ $microsites }} microsites<br>
    @spacer('SITES') @spacer('has') CUSTOM designs<br>
    VISITS since launch, {{ $visits }}
@overwrite
