@extends("apptemplate")
@section("content")
@if(session('snackbar')===null)
    <feed-page :posts="{{json_encode($posts)}}"></feed-page>
@else
    <feed-page snackbar-passed-content="{{session('snackbar')}}" snackbar-status :posts="{{json_encode($posts)}}"></feed-page>
@endIf
@endSection