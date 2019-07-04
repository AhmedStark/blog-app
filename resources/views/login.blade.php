@extends("apptemplate")
@section("content")

@if(session('response')!==null)

<login-form response="{{session('response')}}">
    <div slot="content">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </div>
</login-form>
@else

<login-form >
<div slot="content">

@if ($errors->any())
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </div>    
</login-form>
@endif
@endSection