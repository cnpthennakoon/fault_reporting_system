@extends('main')

@section('title', '| Login')

@section('content')

    <div class="columns">
        <div class="column is-6 is-offset-3">
            <br><br><br>
            <nav class="panel">
                <p class="panel-heading">
                    Login to continue
                </p>

                <div class="panel-block">
                    {!! Form::open() !!}

                    {{ Form::label('email', 'Email:') }}
                    {{ Form::email('email', null, ['class'=>'input']) }}

                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', ['class'=>'input']) }}

                    <hr>
                    {{ Form::label('remember', 'Remember me') }}
                    {{ Form::checkbox('remember') }}

                    <br>
                    {{ Form::submit('Login', ['class' => 'button is-primary']) }}

                    {!! Form::close() !!}
                </div>
            </nav>
        </div>
    </div>
@endsection