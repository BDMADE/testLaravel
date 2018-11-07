@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Typepaper
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typepaper, ['route' => ['typepapers.update', $typepaper->id], 'method' => 'patch']) !!}

                        @include('typepapers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection