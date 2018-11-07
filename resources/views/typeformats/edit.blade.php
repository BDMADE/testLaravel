@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Typeformat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeformat, ['route' => ['typeformats.update', $typeformat->id], 'method' => 'patch']) !!}

                        @include('typeformats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection