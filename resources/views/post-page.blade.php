@extends("apptemplate")
@section("content")

    <post-page id="{{$post->id}}" :comments="{{json_encode($comments)}}" title="{{$post->title}}" content="{{$post->content}}"></post-page>

@endSection