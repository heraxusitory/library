@extends('index')

@section('content')
    <h3 class="content_title">Авторы</h3>
    <div class="d-flex flex-wrap justify-content-start author-list">
        @auth
            @if (Auth::user()->is_admin)
                <div class="card mt-4" style="width: 21rem;">
                    <div class="img_block"></div>
                    <div class="card-body">
                        <h5 class="card-title">Add author</h5>
                        <button class="btn btn-primary update-author" data-target="#modalWindow"
                                data-toggle="modal"
                                data-url="{{ route('author.get.create') }}">
                            <img src="{{ asset('/assets/img/addNew.svg') }}">
                        </button>
                    </div>
                </div>
            @endif
        @endauth
        @foreach($authors as $author)
            <div class="card mt-4" style="width: 21rem;">
                <div class="img_block"></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $author->name }}</h5>
                    <div class="btn-rows">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <a href="{{route('author.show', $author->id)}}" class="btn btn-primary target">Show:
                                    <span>{{ $author->books_count }}</span></a>
                            </div>
                            @auth
                                @if (Auth::user()->is_admin)
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <div class="btn-group">
                                        <button class="btn btn-danger drop-author" data-id="{{ $author->id }}"
                                                data-url="{{ route('author.drop', $author->id) }}">Drop
                                        </button>
                                        <button class="btn btn-primary update-author" data-target="#modalWindow"
                                                data-toggle="modal" data-id="{{$author->id}}"
                                                data-url="{{ route('author.get.edit', $author->id) }}">Edit
                                        </button>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
