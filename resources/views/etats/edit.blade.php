@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Etat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($etat, ['route' => ['etats.update', $etat->id], 'method' => 'patch']) !!}

                        @include('etats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection