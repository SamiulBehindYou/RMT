@extends('frontend.layout')

@section('main')

<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-5 mb-5 mt-2 mb-md-0 m-auto">
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Transaction ID</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $sl=>$order)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $order->transaction_id }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="mx-1 p-1"><i class="bi bi-eye"></i></a>
                                        {{-- <a href="#" class="mx-1 p-1"><i class="bi bi-x-lg"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            <div class="text-primary">
                {{-- {{ $products->links('vendor.pagination.bootstrap-5') }} --}}
            </div>
        </div>
    </div>
</div>

@endsection
