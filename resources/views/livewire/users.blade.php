<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
        <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <a  href="{{ route('user') }}" class="btn btn-primary">Refresh</a>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Add User</button>
                </div>
                <div class="col-lg-4">
                    <input  type="text" wire:model="search" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Emai</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                        <tr>
                            <td>{{ ($users->currentpage()-1) * $users->perpage() + $loop->iteration}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                            <button data-bs-toggle="modal" data-bs-target="#editModal" wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click.prevent="deleteId({{ $user->id }})">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    @else 
                        <p class="text-danger text-center">No data found</p>
                    @endif
                </tbody>
              </table>
        </div>
    </div>
      <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
    </div>

    @include('livewire.create')
    @include('livewire.edit')
    @include('livewire.deleteModal')
    @if($updateMode == true && $errors->any())
        <script>
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        </script>
    @endif

</div>
