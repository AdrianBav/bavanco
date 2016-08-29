@extends('deeds.property')

@section('group') 
    deed-group4
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Vine Street
@overwrite


@section('details')
    RENT—Site only @right('&#163;16')<br>
    @ditto('RENT') With 1 House @right('80')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('220')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('600')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('800')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('1000')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;100 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;100<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;100
@overwrite
