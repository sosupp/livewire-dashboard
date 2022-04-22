
<div>
    <h1>Users</h1>

    {{-- table cta --}}
    <div class="table-cta-wrapper">
        <div class="row">
            <div class="col-md-5">
                 {{-- search --}}
                <form class="d-flex">
                    <input  wire:model.debounce.300ms="search" class="form-control search-sm me-2"
                        type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>

            <div class="col-md-2">
                {{-- sortby --}}
                <select wire:model="sortField" class="form-select form-select-sm"
                    aria-label=".form-select-sm example">
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Sign up date</option>
                </select>
            </div>

            <div class="col-md-2">
                {{-- orderby --}}
                <select wire:model="sortAsc" class="form-select form-select-sm"
                    aria-label=".form-select-sm example">
                    <option value="1">Ascending</option>
                    <option value="0">Descending</option>
                </select>
            </div>

            <div class="col-md-2">
                {{-- number per page --}}
                <select wire:model="perPage" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>

            <div class="col-md-1">
                <button wire:click.prevent="deleteUser()" class="btn btn-sm btn-danger">Delete</button>
            </div>
        </div>

    </div>


    {{-- table --}}
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Select</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
            <tr>
                <th>
                    <input wire:model="selected" value="{{$user->id}}" type="checkbox">
                </th>
                <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
            </tr>

            @empty
                <p>Oops! No users at the moment</p>
            @endforelse

        </tbody>
      </table>

      {{ $users->links()}}
</div>

<style>
    .table-cta-wrapper{
        margin: 1rem 0;
    }
</style>
