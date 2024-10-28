
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Coupons</h3>
            </div>
            <div class="card-body">
                @if (session()->has('coupon_deleted'))
                <div class="alert alert-success">
                    {{ session('coupon_deleted') }}
                </div>
                @endif
                <table class="table table-borderd text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th class="text-success">Coupon ID</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coupons as $sl=>$coupon)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td class="text-success">{{ $coupon->coupon_id }}</td>
                            <td>{{ $coupon->discount }}</td>
                            <td>{{ $coupon->status == 0 ? 'Not Applied':'Applied' }}</td>
                            <td>{{ $coupon->created_at->diffForHumans() }}</td>
                            <td>
                                <a wire:click="deleteCoupon({{ $coupon->id }})" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5"><h3>No Data found</h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $coupons->links() }}
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Create coupon</h3>
            </div>
            <div class="card-body">
                @if (session()->has('coupon_add'))
                <div class="alert alert-success">
                    {{ session('coupon_add') }}
                </div>
                @endif
                <form wire:submit='saveCoupon' method="POST">
                    <div class="mb-3">
                        <label class="form-label">Coupon discount (TK)</label>
                        <input type="number" wire:model="discount" class="form-control">
                        @error('discount')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button wire:loading.remove wire:target='saveCoupon()' type="submit" class="btn btn-primary">Add</button>
                        <button wire:loading wire:target='saveCoupon()' class="btn-custom border-0" type="button" disabled>
                            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                            Adding...
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
