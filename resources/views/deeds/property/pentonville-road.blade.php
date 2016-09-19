@extends('deeds.property')

@section('extra')
@overwrite

@section('group') 
    deed-group2
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Pentonville Road
@overwrite


@section('details')
    RENT—Site only @right('&#163;8')<br>
    @ditto('RENT') With 1 House @right('40')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('100')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('300')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('450')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('600')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;50 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;50<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;60
@overwrite
