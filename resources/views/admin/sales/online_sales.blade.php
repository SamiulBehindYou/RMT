@extends('admin.layout')
@section('main')

{{-- <div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">
            <div class="card-header bg-warning">
                <h3 class="text-white text-center">This page under Development!</h3>
                <p class="text-white text-center">Online sale coming soon!</p>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Online Orders</h3>
            </div>
            <div class="card-body">
                @if(session()->has('invoice_delete'))
                    <div class="alert alert-danger">
                        {{ session('invoice_delete') }}
                    </div>
                @endif
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Order_id</th>
                            <th>Transaction_id</th>
                            <th>Customar</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $sl=>$order)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->transaction_id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td class="text-white">
                                    @if($order->status == 'Pending')
                                        <span class="badge badge-warning">{{ $order->status }}</span>
                                    @elseif($order->status == 'Processing')
                                        <span class="badge badge-info">{{ $order->status }}</span>
                                    @elseif($order->status == 'Completed')
                                        <span class="badge badge-success">{{ $order->status }}</span>
                                    @elseif($order->status == 'Cancelled')
                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                    @elseif($order->status == 'Refunded')
                                        <span class="badge badge-secondary">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $order->created_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-facebook" onclick="return confirm('Do you want to delete invoice permanatly?');">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10"><p>No data found!</p></td>
                            </tr>
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
