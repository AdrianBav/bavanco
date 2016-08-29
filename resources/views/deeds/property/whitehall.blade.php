@extends('deeds.property')

@section('group') 
    deed-group3
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Whitehall
@overwrite


@section('details')
    RENT—Site only @right('&#163;10')<br>
    @ditto('RENT') With 1 House @right('50')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('150')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('450')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('625')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('750')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;100 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;100<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;70
@overwrite
