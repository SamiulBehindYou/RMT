@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Customers</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Register at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $sl=>$customer)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td class="text-{{ $customer->status == 0 ? 'success':'danger' }}">{{ $customer->status == 0 ? 'Active':'Suspened' }}</td>
                            <td>{{ $customer->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('suspend', $customer->id) }}" class="btn btn-danger">Suspend</a>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
