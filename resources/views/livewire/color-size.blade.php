<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Colors Table</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('color_deleted'))
                        <div class="alert alert-success">
                            {{ session('color_deleted') }}
                        </div>
                    @endif
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Color</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $sl=>$color)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $color->color_name }}</td>
                                <td>{{ $color->created_at->format('H:i d-m-Y') }}</td>
                                <td>
                                    <a wire:click="deleteColor({{ $color->id }})" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Sizes Table</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('size_deleted'))
                        <div class="alert alert-success">
                            {{ session('size_deleted') }}
                        </div>
                    @endif
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Size</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $sl=>$size)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $size->size }}</td>
                                <td>{{ $size->created_at->format('H:i d-m-Y') }}</td>
                                <td>
                                    <a wire:click="deleteSize({{ $size->id }})" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>


        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Add Color</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('color_added'))
                        <div class="alert alert-success">
                            {{ session('color_added') }}
                        </div>
                    @endif
                    <form action="#" wire:submit='saveColor' method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Color</label>
                            <input type="text" wire:model='color_name' class="form-control">
                            @error('color_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Add Size</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('size_added'))
                        <div class="alert alert-success">
                            {{ session('size_added') }}
                        </div>
                    @endif
                    <form action="#" wire:submit='saveSize' method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Color</label>
                            <input type="text" wire:model='size' class="form-control">
                            @error('size')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>
    <div class="row mt-4">
        <div class="col-md-8">

        </div>
        <div class="col-md-4">

        </div>

    </div>
</div>
