@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Deadline
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deadline, ['route' => ['deadlines.update', $deadline->id], 'method' => 'patch']) !!}

                        @include('deadlines.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection