<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">New Quantity</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Inventory</h3>
                </div>
                <div class="card-body">
                    <table class="table" id="datatableX">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product name</th>
                                <th>Product ID</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $sl=>$inventory)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $inventory->product_id }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
