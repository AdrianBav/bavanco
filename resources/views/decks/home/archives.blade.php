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
    ARCHIVES—Since @right($card->since()['year'])<br>
    @ditto('ARCHIV') number of years @right($card->since()['years'])<br>
    @ditto('ARCHIV') @ditto('number') @ditto('of') months @right($card->since()['months'])<br>
    @ditto('ARCHIV') @ditto('number') @ditto('of') weeks @right($card->since()['weeks'])<br>
    @ditto('ARCHIV') @ditto('number') @ditto('of') days @right($card->since()['days'])<br>
    @ditto('ARCHIV') TOTAL days @right($card->since()['totalDays'])<br>
    <small>This archives site aims to Preserve a Definitive History of the Bavanco branding and online Web Presence.</small><br>
    ARCHIVES spans 20 years<br>
    @ditto('ARCHIVES') has 3 domains<br>
    @spacer('ARCHIVES') @spacer('has') FULL history<br>
    VISITS since launch, {{ $ydt_unique_visits }}
@overwrite
