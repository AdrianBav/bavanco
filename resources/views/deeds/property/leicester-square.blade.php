@extends('deeds.property')

@section('extra')
@overwrite

@section('group') 
    deed-group6
@overwrite

@section('subtitle') 
    Title Deed
@overwrite

@section('title') 
    Leicester Square
@overwrite


@section('details')
    RENT—Site only @right('&#163;22')<br>
    @ditto('RENT') With 1 House @right('110')<br>
    @ditto('RENT') @ditto('With') 2 Houses @right('330')<br>
    @ditto('RENT') @ditto('With') 3 Houses @right('8000')<br>
    @ditto('RENT') @ditto('With') 4 Houses @right('975')<br>
    @ditto('RENT') @ditto('With') HOTEL @right('1150')<br>
    <small class="indent">If a player owns ALL the Sites on any Colour-Group, the rent is Doubled on Unimproved Sites in that group.</small><br>
    COST of Houses, &#163;150 each<br>
    @ditto('COST') @ditto('of') Hotels, &#163;150<br>
    @spacer('COST') @spacer('of') plus 4 houses<br>
    MORTGAGE Value of Site, &#163;130
@overwrite
