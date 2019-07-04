@extends("apptemplate")
@section("content")
<br>

@if(session('response')!==null)

    <create-user-form response="{{session('response')}}">
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
    </create-user-form>
@else
    <create-user-form>
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
    </create-user-form>

@endif


@endSection