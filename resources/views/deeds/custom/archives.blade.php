@extends('deeds.property')

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
    ARCHIVES—Bavanco History<br>
    @ditto('ARCHIV') YTD unique visits @right($ydt_unique_visits)<br>
    @ditto('ARCHIV') @ditto('YTD') visits @right($ydt_visits)<br>
    @ditto('ARCHIV') Total unique visits @right($total_unique_visits)<br>
    @ditto('ARCHIV') @ditto('Total') visits @right($total_visits)<br>
    @ditto('ARCHIV') leaderboard @right($leaderboard)<br>
    <small>If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    ARCHIVES has 3 domains<br>
    @ditto('ARCHIVES') @ditto('has') 13 archived sites<br>
    @spacer('ARCHIVES') @spacer('has') 1 author<br>
    Number of DAYS live, {{ $days }}
@overwrite
