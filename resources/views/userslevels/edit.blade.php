@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Userslevel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userslevel, ['route' => ['userslevels.update', $userslevel->id], 'method' => 'patch']) !!}

                        @include('userslevels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection