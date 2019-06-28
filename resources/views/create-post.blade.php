@extends("apptemplate")
@section("content")
@if(session('response')!==null)
    <create-post-form response="{{session('response')}}"></create-post-form>
@else
    <create-post-form ></create-post-form>
@endif
@endSection