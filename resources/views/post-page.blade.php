@extends("apptemplate")
@section("content")

@if(session('snackbar')===null)

    <post-page id="{{$post->id}}" :comments="{{json_encode($comments)}}" title="{{$post->title}}" content="{{$post->content}}"></post-page>

@else

    <post-page snackbar-passed-content="{{session('snackbar')}}" snackbar-status id="{{$post->id}}" :comments="{{json_encode($comments)}}" title="{{$post->title}}" content="{{$post->content}}"></post-page>

@endIf

@endSection