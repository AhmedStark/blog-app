@extends("apptemplate")
@section("content")
<br>

@if(session('response')!==null)

    <create-user-form response="{{session('response')}}"></create-user-form>
@else
    <create-user-form></create-user-form>

@endif
@endSection