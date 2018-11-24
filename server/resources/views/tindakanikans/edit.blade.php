@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tindakanikan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tindakanikan, ['route' => ['tindakanikans.update', $tindakanikan->id], 'method' => 'patch']) !!}

                        @include('tindakanikans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection