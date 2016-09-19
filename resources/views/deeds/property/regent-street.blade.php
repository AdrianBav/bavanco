@extends('deeds.property')

@section('extra')
@overwrite

@section('group') 
    deed-group7
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Regent Street
@overwrite


@section('details')
    RENT—Site only @right('&#163;26')<br>
    @ditto('RENT') With 1 House @right('130')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('390')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('900')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('1100')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('1275')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;200 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;200<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;150
@overwrite
