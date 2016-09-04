@extends('deeds.property')

@section('group') 
    deed-group3
@overwrite

@section('subtitle') 
    adrianbavister.com
@overwrite

@section('title') 
    Bavanco Sites
@overwrite


@section('details')
    DOMAINS—Other Work<br>
    @ditto('DOMAIN') YTD unique visits @right($ydt_unique_visits)<br>
    @ditto('DOMAIN') @ditto('YTD') visits @right($ydt_visits)<br>
    @ditto('DOMAIN') Total unique visits @right($total_unique_visits)<br>
    @ditto('DOMAIN') @ditto('Total') visits @right($total_visits)<br>
    @ditto('DOMAIN') leaderboard @right($leaderboard)<br>
    <small>If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    DOMAINS has 5 domains<br>
    @ditto('DOMAINS') @ditto('has') 23 sub-domains<br>
    @ditto('DOMAINS') @ditto('has') 7 databases<br>
    Number of DAYS live, {{ $days }}
@overwrite
