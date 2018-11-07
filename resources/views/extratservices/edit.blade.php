@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Extratservice
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($extratservice, ['route' => ['extratservices.update', $extratservice->id], 'method' => 'patch']) !!}

                        @include('extratservices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection