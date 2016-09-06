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
    @ditto('ARCHIV') popularity @right($rankings)<br>
    <small>This archives site aims to Preserve a Definitive History of the Bavanco branding and online Web Presence.</small><br>
    ARCHIVE spans 5 domains<br>
    @ditto('ARCHIVE') @ditto('span') 11 archived sites<br>
    @spacer('ARCHIVE') @spacer('span') {{ $active_years }} active years<br>
    Number of DAYS live, {{ $days }}
@overwrite
