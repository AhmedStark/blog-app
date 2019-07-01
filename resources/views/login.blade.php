@extends("apptemplate")
@section("content")

@if(session('response')!==null)

    <login-form response="{{session('response')}}"></login-form>
@else

    <login-form ></login-form>
@endif
@endSection