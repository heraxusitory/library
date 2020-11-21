@extends('index')

@section('content')
    <div class="profile">
        <div class="field_name">Имя пользователя/(Админ)</div>
        <div class="field_mail">Логин пользователя</div>
        <div class="field_favourites"> <a href="{{ route('favourites') }}">Favourites</a></div>
    </div>
@endsection
