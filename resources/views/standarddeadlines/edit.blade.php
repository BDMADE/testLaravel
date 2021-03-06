@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Standarddeadline
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($standarddeadline, ['route' => ['standarddeadlines.update', $standarddeadline->id], 'method' => 'patch']) !!}

                        @include('standarddeadlines.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection