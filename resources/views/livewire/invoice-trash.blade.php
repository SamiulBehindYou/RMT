<div>
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-white">Invoice Trash</h3>
                </div>
                <div class="card-body">
                    @if(session()->has('restore'))
                        <div class="alert alert-success">
                            {{ session('restore') }}
                        </div>
                    @endif
                    @if(session()->has('trash_invoice_delete'))
                        <div class="alert alert-danger">
                            {{ session('trash_invoice_delete') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Invoice_id</th>
                                <th>Customar</th>
                                <th>Created_at</th>
                                <th>Deleted_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $sl=>$invoice)
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $invoice->invoice_id }}</td>
                                    <td>{{ $invoice->customer != null ? $invoice->customer:'No Name!' }}</td>
                                    <td>{{ $invoice->created_at->diffForHumans() }}</td>
                                    <td>{{ $invoice->deleted_at->diffForHumans() }}</td>
                                    <td>
                                        <a wire:click='restoreInvoice({{ $invoice->id }})' class="btn btn-success">Restore</a>
                                        <a wire:click='deleteInvoice({{ $invoice->id }})' class="btn btn-danger" onclick="return confirm('Do you want to delete invoice permanatly?');">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"><p>No trash data found!</p></td>
                                </tr>
                            @endforelse
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
