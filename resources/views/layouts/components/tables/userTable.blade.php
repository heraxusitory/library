<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>User Name</th>
            <th>User @-mail</th>
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
