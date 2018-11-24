@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ikan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ikan, ['route' => ['ikans.update', $ikan->id], 'method' => 'patch']) !!}

                        @include('ikans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection