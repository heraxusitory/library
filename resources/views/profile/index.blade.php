@extends('index')

@section('content')
    <div class="profile">
        <div class="field_name">
            {{ $userData['name'] }}
            @if($userData['is_admin'])
                <span class="badge badge-success text-wrap">Admin</span>
            @endif
        </div>
        <div class="field_mail">{{ $userData['email'] }}</div>
        <div class="field_favourites"> <a href="{{ route('favourites', $userData['id']) }}">Favourites</a></div>
    </div>
    @if($userData['is_admin'])
        <div class="container">
            <div class="card">
                <div class="card-header">Administration</div>
                <div class="card-body">
                    @include('layouts.components.tables.userTable')
                </div>
            </div>
        </div>
    @endif
@endsection
