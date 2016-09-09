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
    GALLERY has 3 collections<br>
    @ditto('GALLERY') @ditto('has') 33 photos<br>
    @spacer('GALLERY') @spacer('has') in 7 countries<br>
    Number of DAYS live, {{ $days }}
@overwrite
