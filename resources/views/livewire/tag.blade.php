
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Add Brand</h3>
            </div>
            <div class="card-body">
                @if (session()->has('tag_delete'))
                <div class="alert alert-success">
                    {{ session('tag_delete') }}
                </div>
                @endif
                <table class="table table-borderd text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Tag Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $sl=>$tag)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->created_at->diffForHumans() }}</td>
                            <td>
                                <a wire:click="deleteTag({{ $tag->id }})" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="4"><h3>No Data found</h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Add Tag</h3>
            </div>
            <div class="card-body">
                @if (session()->has('tag_add'))
                <div class="alert alert-success">
                    {{ session('tag_add') }}
                </div>
                @endif
                <form wire:submit='saveTag' method="POST">
                    <div class="mb-3">
                        <label class="form-label">Tag name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button wire:loading.remove wire:target='saveTag()' type="submit" class="btn btn-primary">Add</button>
                        <button wire:loading wire:target='saveTag()' class="btn-custom border-0" type="button" disabled>
                            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                            Adding...
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
