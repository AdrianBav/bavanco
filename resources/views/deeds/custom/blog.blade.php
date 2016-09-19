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
    We Blog
@overwrite


@section('details')
    BLOG—Our words<br>
    @ditto('BLOG') YTD unique visits @right($ydt_unique_visits)<br>
    @ditto('BLOG') @ditto('YTD') visits @right($ydt_visits)<br>
    @ditto('BLOG') Total unique visits @right($total_unique_visits)<br>
    @ditto('BLOG') @ditto('Total') visits @right($total_visits)<br>
    @ditto('BLOG') popularity @right($rankings)<br>
    <small>If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    BLOG has {{ $number_of_articles }} articles<br>
    @ditto('BLOG') @ditto('has') {{ $number_of_likes }} likes<br>
    @ditto('BLOG') @ditto('has') {{ $number_of_comments }} comments<br>
    Number of DAYS live, {{ $days }}
@overwrite
