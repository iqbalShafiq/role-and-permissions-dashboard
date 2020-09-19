<div>
    @can('create post')
    <div class="mb-4">
        <div class="text-muted mb-1 text-uppercase">Post</div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Create New Post</a>
            <a href="#" class="list-group-item list-group-item-action">Data Table Posts</a>
        </div>
    </div>
    @endcan

    @can('create category')
    <div class="mb-4">
        <div class="text-muted mb-1 text-uppercase">Category</div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Create a Category</a>
            <a href="#" class="list-group-item list-group-item-action">Data Table Category</a>
        </div>
    </div>
    @endcan

    @can('create user')
    <div class="mb-4">
        <div class="text-muted mb-1 text-uppercase">User</div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Create User</a>
            <a href="#" class="list-group-item list-group-item-action">Data Table User</a>
        </div>
    </div>
    @endcan

    @can('setting permission')
    <div class="mb-4">
        <div class="text-muted mb-1 text-uppercase">Roles and Permission</div>
        <div class="list-group">
            <a href="{{ route('role.index') }}" class="list-group-item list-group-item-action">Roles</a>
            <a href="{{ route('permission.index') }}" class="list-group-item list-group-item-action">Permission</a>
            <a href="{{ route('assign.create') }}" class="list-group-item list-group-item-action">Assign Permission</a>
        </div>
    </div>
    @endcan

    @auth
    <div class="mb-4">
        <div class="text-muted mb-1 text-uppercase">Logout</div>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    @endauth
</div>
