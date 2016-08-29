@extends('deeds.property')

@section('group') 
    deed-group1
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Whitechapel Rd.
@overwrite


@section('details')
    RENT—Site only @right('&#163;4')<br>
    @ditto('RENT') With 1 House @right('20')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('60')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('180')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('320')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('450')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;50 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;50<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;30
@overwrite
