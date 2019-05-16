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
    Travel Gallery
@overwrite


@section('details')
    GALLERY—Since @right($card->since()['year'])<br>
    @ditto('GALLER') number of years @right($card->since()['years'])<br>
    @ditto('GALLER') @ditto('number') @ditto('of') months @right($card->since()['months'])<br>
    @ditto('GALLER') @ditto('number') @ditto('of') weeks @right($card->since()['weeks'])<br>
    @ditto('GALLER') @ditto('number') @ditto('of') days @right($card->since()['days'])<br>
    @ditto('GALLER') TOTAL days @right($card->since()['totalDays'])<br>
    <small>A gallery of photographs documenting the world travels of Adrian and Jillian since the time they first met.</small><br>
    GALLERY has {{ $total_collections }} destinations<br>
    @ditto('GALLERY') @ditto('has') {{ $total_photos }} photographs<br>
    @spacer('GALLERY') @spacer('has') Various cameras<br>
    VISITS since launch, {{ $visits }}
@overwrite
