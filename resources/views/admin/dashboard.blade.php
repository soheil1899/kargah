@extends('layouts.admin.master')


@section('content')

    <dashboard-component :useraccess="{{$useraccess}}" :storeaccess="{{$storeaccess}}" :writeraccess="{{$writeraccess}}" :settingaccess="{{$settingaccess}}"></dashboard-component>

@stop
