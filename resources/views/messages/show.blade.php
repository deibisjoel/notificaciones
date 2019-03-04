@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notificación </div>

                <div class="card-body">
                   <h6> {{ $message->body}}</h6>
                   <small>Enviado por {{ $message->sender->name}}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
