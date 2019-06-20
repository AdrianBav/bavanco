@extends('decks.property')

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
    BLOG—Since @right($since['year'])<br>
    @ditto('BLOG') number of years @right($since['years'])<br>
    @ditto('BLOG') @ditto('number') @ditto('of') months @right($since['months'])<br>
    @ditto('BLOG') @ditto('number') @ditto('of') weeks @right($since['weeks'])<br>
    @ditto('BLOG') @ditto('number') @ditto('of') days @right($since['days'])<br>
    @ditto('BLOG') TOTAL days @right($since['totalDays'])<br>
    <small>A personal blog for me to showcase my articles and photographs on subjects such as life, music and comedy.</small><br>
    BLOG has {{ $meta->itemOne }}<br>
    @ditto('BLOG') @ditto('has') {{ $meta->itemTwo }}<br>
    @spacer('BLOG') @spacer('has') {{ $meta->info }}<br>
    VISITS since launch, {{ $visits }}
@overwrite
