@extends('deeds.property')

@section('extra')
@overwrite

@section('group')
    deed-group5
@overwrite

@section('subtitle')
    Bavanco.co.uk
@overwrite

@section('title')
    Five+Twenty Past
@overwrite


@section('details')
    BLOG—Since @right($card->since()['year'])<br>
    @ditto('BLOG') number of years @right($card->since()['years'])<br>
    @ditto('BLOG') @ditto('number') @ditto('of') months @right($card->since()['months'])<br>
    @ditto('BLOG') @ditto('number') @ditto('of') weeks @right($card->since()['weeks'])<br>
    @ditto('BLOG') @ditto('number') @ditto('of') days @right($card->since()['days'])<br>
    @ditto('BLOG') TOTAL days @right($card->since()['totalDays'])<br>
    <small>A personal blog for me to showcase my articles and photographs on subjects such as life, music and comedy.</small><br>
    BLOG has {{ $number_of_articles }} articles<br>
    @ditto('BLOG') @ditto('has') {{ $number_of_photos }} photos<br>
    @spacer('BLOG') @spacer('has') NO stock photos<br>
    VISITS since launch, {{ $ydt_unique_visits }}
@overwrite
