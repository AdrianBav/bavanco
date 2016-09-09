@extends('deeds.property')

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
    <small>If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    GALLERY has {{ $year_span }} year span<br>
    @ditto('GALLERY') @ditto('has') 9 collections<br>
    @spacer('GALLERY') @ditto('has') 90 photos<br>
    Number of DAYS live, {{ $days }}
@overwrite
