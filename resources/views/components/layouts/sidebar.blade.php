<div>
    @foreach ($navigations as $navigation)
    @can($navigation->permission_name)
    <div class="mb-4">
        <div class="text-muted mb-1 text-uppercase">{{ $navigation->name }}</div>
        <div class="list-group">
            @foreach ($navigation->children as $child)
            <a href="{{ url($child->url) }}" class="list-group-item list-group-item-action">{{ $child->name }}</a>
            @endforeach
        </div>
    </div>
    @endcan
    @endforeach

    @can('create navigation')
    <div class="mb-4">
        <div class="text-muted mb-1 text-uppercase">Navigations Setup</div>
        <div class="list-group">
            <a href="{{ route('navigation.create') }}" class="list-group-item list-group-item-action">Create
                Navigation</a>
            <a href="{{ route('navigation.table') }}" class="list-group-item list-group-item-action">Navigations
                Table</a>
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
