<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css">

    </head>

    <body>

        <div class="container">
            <div class="column is-8 is-offset-2">
                <div class="section">

                    {!! Form::open(['route' => 'fault.report', 'files' => true]) !!}

                    {{ Form::label('organization', 'Organization:', ['class'=>'label']) }}
                    {{ Form::text('organization', null, ['class' => 'input', 'placeholder' => 'Organization name...', 'required']) }}

                    {{ Form::label('name', 'Name:', ['class'=>'label']) }}
                    {{ Form::text('name', null, ['class' => 'input', 'placeholder' => 'Your name...','required']) }}

                    {{ Form::label('email', 'Email', ['class'=>'label']) }}
                    {{ Form::text('email', null, ['class' => 'input', 'placeholder' => 'Contact email...', 'required']) }}

                    {{ Form::label('title', 'Title', ['class'=>'label']) }}
                    {{ Form::text('title', null, ['class' => 'input', 'placeholder' => 'Fault type...', 'required']) }}

                    {{ Form::label('description', 'Description', ['class'=>'label']) }}
                    {{ Form::textarea('description', null, ['class' => 'textarea', 'placeholder' => 'Description about the fault...', 'required']) }}

                    {{ Form::label('photo_id', 'Upload a screen-shot:', ['class'=>'label']) }}
                    {{ Form::file('photo_id[]', ['multiple'=>true]) }}
                    <hr>
                    {{ Form::submit('Send Report', ['class' => 'button is-primary']) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </body>
</html>