@extends('deeds.property')

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
    GALLERY—Our travels<br>
    @ditto('GALLER') YTD unique visits @right($ydt_unique_visits)<br>
    @ditto('GALLER') @ditto('YTD') visits @right($ydt_visits)<br>
    @ditto('GALLER') Total unique visits @right($total_unique_visits)<br>
    @ditto('GALLER') @ditto('Total') visits @right($total_visits)<br>
    @ditto('GALLER') popularity @right($rankings)<br>
    <small>A gallery of photographs documenting the world travels of Adrian and Jillian since the time they first met.</small><br>    
    GALLERY has {{ $duration_in_years }} years of travels<br>
    @ditto('GALLERY') @ditto('has') {{ $total_collections }} destinations<br>
    @spacer('GALLERY') @ditto('has') {{ $total_photos }} photographs<br>
    Number of DAYS live, {{ $days }}
@overwrite
