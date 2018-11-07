@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bonreduction
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bonreduction, ['route' => ['bonreductions.update', $bonreduction->id], 'method' => 'patch']) !!}

                        @include('bonreductions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection