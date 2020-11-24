<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>user name</th>
            <th>user e-mail</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
