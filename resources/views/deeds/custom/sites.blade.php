@extends('deeds.property')

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
    SITES—Other Work<br>
    @ditto('SITES') YTD unique visits @right($ydt_unique_visits)<br>
    @ditto('SITES') @ditto('YTD') visits @right($ydt_visits)<br>
    @ditto('SITES') Total unique visits @right($total_unique_visits)<br>
    @ditto('SITES') @ditto('Total') visits @right($total_visits)<br>
    @ditto('SITES') leaderboard @right($leaderboard)<br>
    <small>If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    SITES has 5 domains<br>
    @ditto('SITES') @ditto('has') 23 sub-domains<br>
    @ditto('SITES') @ditto('has') 7 databases<br>
    Number of DAYS live, {{ $days }}
@overwrite
