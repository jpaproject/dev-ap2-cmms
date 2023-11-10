<ul>
    @foreach ($role->permissions as $permission)
    <li>{{$permission->name }}</li>
    @endforeach
</ul>