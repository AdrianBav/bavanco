@extends('deeds.property')

@section('extra')
@overwrite

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
    SITES—A Reference<br>
    @ditto('SITES') YTD unique visits @right($ydt_unique_visits)<br>
    @ditto('SITES') @ditto('YTD') visits @right($ydt_visits)<br>
    @ditto('SITES') Total unique visits @right($total_unique_visits)<br>
    @ditto('SITES') @ditto('Total') visits @right($total_visits)<br>
    @ditto('SITES') popularity @right($rankings)<br>
    <small>This Site serves as a Handy Reference to ALL the Websites I have recently Developed for Friends and Myself.</small><br>
    SITES has 5 domains<br>
    @ditto('SITES') @ditto('has') 2 development sites<br>
    @ditto('SITES') @ditto('has') 5 microsites<br>
    Number of DAYS live, {{ $days }}
@overwrite
