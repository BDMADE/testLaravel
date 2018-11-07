@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Typeofwork
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeofwork, ['route' => ['typeofworks.update', $typeofwork->id], 'method' => 'patch']) !!}

                        @include('typeofworks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection