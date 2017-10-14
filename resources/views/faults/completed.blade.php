@extends('main')

@section('title', 'Reported Faults')

@section('content')

    {{--Completed Faults--}}
    @if(Session::has('fault_delete'))

        <div class="notification is-danger">
            {{ session('fault_delete') }}
        </div>


    @elseif(Session::has('fault_completed'))

        <div class="notification is-danger">
            {{ session('fault_completed') }}
        </div>

    @endif

    <h3 class="title">
        Completed Faults
    </h3>

    <div class="box">

        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Organization</th>
                <th>Title</th>
                <th>Informed at</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
                @foreach($faults as $fault)
                        <tr>
                            <td>{{ $fault->id }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($fault->organization, 20) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($fault->title, 20) }}</td>
                            <td>{{ $fault->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="button" href="{{ route('fault.show',$fault->id) }}" role="button">View</a>
                            </td>
                        </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{--/Completed Faults--}}

        @if($faults->total()/7 > 1)
            <nav class="pagination">

                @if($faults->currentPage() == 1)
                    <a class="pagination-previous is-disabled">Previous</a>
                    <a class="pagination-next" href="{!! $faults->nextPageUrl() !!}">Next page</a>
                @elseif($faults->currentPage() == $faults->lastPage())
                    <a class="pagination-next is-disabled">Next page</a>
                    <a class="pagination-previous" href="{!! $faults->previousPageUrl() !!}">Previous</a>
                @else
                    <a class="pagination-next" href="{!! $faults->nextPageUrl() !!}">Next page</a>
                    <a class="pagination-previous" href="{!! $faults->previousPageUrl() !!}">Previous</a>
                @endif

                <ul class="pagination-list">

                    @for($page_no = 1; $page_no <= $faults->total()/7+1; $page_no++)

                        @if($page_no == $faults->currentPage())
                            <li><a class="pagination-link is-current">{!! $faults->currentPage() !!}</a></li>
                        @else
                            <li><a href="{{ $faults->url($page_no) }}" class="pagination-link">{{ $page_no }}</a></li>
                        @endif

                    @endfor
                </ul>

            </nav>
            @endif

@endsection