@extends('deeds.property')

@section('group') 
    deed-group1
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Old Kent Rd.
@overwrite


@section('details')
    RENT—Site only @right('&#163;2')<br>
    @ditto('RENT') With 1 House @right('10')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('30')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('90')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('160')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('250')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;50 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;50<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;30
@overwrite
