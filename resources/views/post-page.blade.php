@extends("apptemplate")
@section("content")





<post-page id="{{$post->id}}" :comments="{{json_encode($comments)}}" title="{{$post->title}}" content="{{$post->content}}"

    @if(session('snackbar')!==null)
        snackbar-passed-content="{{session('snackbar')}}"
        snackbar-status
    @endif
></post-page>
@endSection