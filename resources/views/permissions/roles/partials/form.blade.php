<form action="{{ route('role.store') }}" class="mb-3" method="POST">
    @csrf
    <div class="form-group">
        <label for="roleName">Name</label>
        <input type="text" class="form-control" id="roleName" name="name">
    </div>
    <div class="form-group">
        <label for="roleGuard">Guard</label>
        <input type="text" class="form-control" id="roleGuard" name="guard" placeholder='default to "web"'>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
