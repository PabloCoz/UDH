<div>
    <div class="card">

        <div class="card-header">
            <input wire:keydown="clearPage" wire:model="search" class="form-control w-100" type="text" placeholder="Buscar...">
        </div>

        @if ($users->count())
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name.' '.$user->lastname}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{route('admin.users.edit', $user)}}">EDITAR</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>

        @else
            <div class="card-body">
                <strong>No hay registro</strong>
            </div>
        @endif    
    </div>
</div>
