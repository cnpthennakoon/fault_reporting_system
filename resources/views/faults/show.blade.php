@extends('main')

@section('title', 'Fault')

@section('content')

    @if(Session::has('respond_sent'))

        <div class="notification is-success">
            {{ session('respond_sent') }}
        </div>

    @endif

    <div class="box">

        <div class="field is-grouped">
            <p class="control">
                {{--Delete starts--}}
                {!! Form::open(['method'=>'DELETE',  'action'=>['FaultsController@destroy', $fault->id]]) !!}
                {{Form::button('<i class="fa fa-trash"></i>&nbsp Delete',['type' => 'submit', 'class' => 'button is-danger is-pulled-right'])}}
                {!! Form::close() !!}
                {{--Delete ends--}}
            </p>

            <p class="control">
                {{--Status start--}}
                @if($fault->status == 0)
                    {!! Form::open(['method'=>'PUT',  'action'=>['FaultsController@update', $fault->id]]) !!}
                    {!! Form::hidden('status', 1) !!}
                    {!! Form::submit('Complete', ['class'=>'button is-success is-pulled-right']) !!}
                    {!! Form::close() !!}
                @endif
                {{--Status end--}}
            </p>
        </div>

        <h3 class="title">{{ $fault->title }}</h3>

        <h3 class="subtitle">{{ $fault->organization }}</h3>

        <p>
            {{ $fault->email }}

            <span class="tag">{{ $fault->created_at->diffForHumans() }}</span>
        </p>

        <br>
        <p>{{ $fault->description }}</p>

        <hr>

        {{--<image>--}}

            <div class="columns">
                <div class="column">
                    @foreach($fault->photos as $image)
                        <img src="{{$image->file ?  : 'http://placehold.it/1200x700'}}" style="width:20%; max-height: 120px;" onclick="openModal()" class="hover-shadow cursor">
                    @endforeach
                </div>
            </div>

            <div id="myModal" class="modal">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">

                    <div class="mySlides">
                        @foreach($fault->photos as $image)
                            <img src="{{$image->file ?  : 'http://placehold.it/1200x700'}}" style="width:100%">
                        @endforeach
                    </div>
                </div>
            </div>

        {{--</image>--}}
    </div>
    <div class="box">

        <p class="subtitle">Replies</p>
        @if($fault->respond->count() != 0)

            @foreach($fault->respond as $responds)
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>{{ $responds->user->name }}</strong>
                                    <br>
                                    {{ $responds->message }}
                                    <br>
                                    <small>{{ $responds->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                        </div>
                    </article>
            @endforeach

        @endif

            <br>
            {{--respond starts--}}
                {!! Form::open(['route' => 'respond.store', 'files' => true]) !!}

                {{ Form::label('message', 'Reply:', ['class'=>'label']) }}
                {{ Form::textarea('message', null, ['class' => 'textarea', 'placeholder' => 'Message here...', 'required','size' => '40x6']) }}
                <br>

                {{ Form::hidden('fault_id', $fault->id) }}
                {{ Form::hidden('user_id', Auth::id()) }}
                {{ Form::hidden('client_mail', $fault->email) }}

                {{ Form::submit('Reply', ['class'=>'button is-primary']) }}

                {!! Form::close() !!}
                {{--Respond ends--}}
    </div>

@endsection
