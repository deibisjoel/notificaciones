@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Enviar Mensaje</div>
                <form action="{{ route('messages.store') }}" class="form" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <select name="recipient_id" class="form-control  {{ $errors->has('recipient_id') ? 'is-invalid' : '' }}">
                                <option value="">Seleccione Usuario </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id}}">{{ $user->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('recipient_id','<span class="invalid-feedback">:message</span>')  !!}
                        </div>
                        <div class="form-group ">
                            <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Escribe Aquí tu mensaje"></textarea>
                            {!! $errors->first('body','<span class="invalid-feedback">:message</span>')  !!}
                        </div>
                        <div class="form-group">
                            <button  class="btn btn-primary btn-block">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
