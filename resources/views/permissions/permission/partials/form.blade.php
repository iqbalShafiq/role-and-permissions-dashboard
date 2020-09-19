<form action="{{ route('permission.store') }}" class="mb-3" method="POST">
    @csrf
    <div class="form-group">
        <label for="permissionName">Name</label>
        <input type="text" class="form-control" id="permissionName" name="name">
    </div>
    <div class="form-group">
        <label for="permissionGuard">Guard</label>
        <input type="text" class="form-control" id="permissionGuard" name="guard" placeholder='default to "web"'>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
