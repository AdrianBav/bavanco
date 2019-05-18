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
    GALLERY—Since @right($since['year'])<br>
    @ditto('GALLER') number of years @right($since['years'])<br>
    @ditto('GALLER') @ditto('number') @ditto('of') months @right($since['months'])<br>
    @ditto('GALLER') @ditto('number') @ditto('of') weeks @right($since['weeks'])<br>
    @ditto('GALLER') @ditto('number') @ditto('of') days @right($since['days'])<br>
    @ditto('GALLER') TOTAL days @right($since['totalDays'])<br>
    <small>A gallery of photographs documenting the world travels of Adrian and Jillian since the time they first met.</small><br>
    GALLERY has {{ $meta['total_collections'] }} destinations<br>
    @ditto('GALLERY') @ditto('has') {{ $meta['total_photos'] }} photographs<br>
    @spacer('GALLERY') @spacer('has') Various cameras<br>
    VISITS since launch, {{ $visits }}
@overwrite
