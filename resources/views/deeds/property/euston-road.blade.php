@extends('deeds.property')

@section('group') 
    deed-group2
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Euston Road
@overwrite


@section('details')
    RENT—Site only @right('&#163;6')<br>
    @ditto('RENT') With 1 House @right('30')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('90')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('270')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('400')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('550')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;50 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;50<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;50
@overwrite
