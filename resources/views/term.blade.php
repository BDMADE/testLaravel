@extends('layouts.template')


@section('css')
    <link href="{{asset('stepForm/css/stepForm.css')}}" rel="stylesheet">
@endsection


@section('menu')
    @include('layouts.menu2')
@endsection

@section('content')

    <div class="container" style="min-height: 500px">
        <div class="row">
            <br>
            <div class="col-xs-12 col-sm-12 term">
                {!! ((!is_null($terms) && count($terms) > 0) ? $terms[0]->content : '') !!}
            </div>

        </div>
    </div>



@endsection