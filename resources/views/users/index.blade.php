<x-layout>
    @section('title', 'Users')

    @if(empty($users->toArray()))
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark">
                        <h3 class="text-light">CRUD Users</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">No registration found</h5>
                        <p class="card-text">Create your first user by clicking the button below</p>
                        <button type="button" data-action="create" data-model="users"
                            class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#crudModal">
                            <i class="bi-person-plus-fill"></i>
                            Add User
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @else
        <table class="table table-dark table-hover table-striped w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                    <th scope="col">E-mail</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Actions:
                        <button type="button" data-action="create" data-model="users"
                            class="btn ms-3 btn-outline-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#crudModal">
                            <i class="bi-person-plus-fill"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td colspan="2">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ mask($user->cpf, '###.###.###-##') }}</td>
                        <td>
                            <x-actions model="users" entity="{{$user->toJson()}}"/>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <x-modal />

</x-layout>
