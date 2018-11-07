@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Structure
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($structure, ['route' => ['structures.update', $structure->id], 'method' => 'patch']) !!}

                        @include('structures.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection