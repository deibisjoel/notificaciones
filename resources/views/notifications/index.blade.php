@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Lista de Notificaciones</h4><hr>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h6>Notificaciones No Leídas</h6>
            <hr>
            <ul class="list-group" id="unreadNotifications">
                @foreach ($unreadNotifications as $unreadNotification)
                    <li class="list-group-item " >
                        <a href="{{$unreadNotification->data['link']}}">{{$unreadNotification->data['texto']}}</a>
                        <form action="{{ route('notifications.update',$unreadNotification->id) }}" method="POST" class="float-right">
                            @csrf
                            {{ method_field('PUT')}}
                            <button class="btn btn-danger">x</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
         <div class="col-sm-6">
            <h6>Notificaciones  Leídas</h6>
            <hr>
            <ul class="list-group">
                @foreach ($readNotifications as $readNotification)
                    <li class="list-group-item">{{$readNotification->data['texto']}}
                    <form action="{{ route('notifications.destroy',$readNotification->id) }}" method="POST" class="float-right">
                        @csrf
                        {{ method_field('delete')}}
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
