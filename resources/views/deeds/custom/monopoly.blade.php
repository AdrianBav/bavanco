@extends('deeds.property')

@section('group') 
    deed-group2
@overwrite

@section('subtitle') 
    Bavanco.co.uk
@overwrite

@section('title') 
    Monophotography
@overwrite


@section('details')
    MONOPOLY—Photography<br>
    @ditto('MONOP') YTD unique visits @right($ydt_unique_visits)<br>
    @ditto('MONOP') @ditto('YTD') visits @right($ydt_visits)<br>
    @ditto('MONOP') Total unique visits @right($total_unique_visits)<br>
    @ditto('MONOP') @ditto('Total') visits @right($total_visits)<br>
    @ditto('MONOP') popularity @right($rankings)<br>
    <small>If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    MONOPOLY has 24 locations<br>
    @ditto('MONOPOLY') @ditto('has') 166 photos<br>
    @spacer('MONOPOLY') @spacer('has') in 1 city<br>
    Number of DAYS live, {{ $days }}
@overwrite
