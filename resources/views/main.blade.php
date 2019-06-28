@extends("apptemplate")
@section("content")

    <feed-page :posts="{{json_encode($posts)}}"></feed-page>

@endSection