<div class="row">
    <div class="col-lg-8">
        <div class="subscription-form">
            <h3 class="d-flex align-items-center"><span class="me-1"><img src="{{ asset('frontend') }}/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>
            @if(session()->has('subscribed'))
                <div class="alert alert-success">
                    {{ session('subscribed') }}
                </div>
            @endif
            <form wire:submit='add' class="row g-3">
                <div class="col-auto">
                    <input type="text" wire:model='name' class="form-control" placeholder="Enter your name">
                    @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-auto">
                    <input type="email" wire:model='email' class="form-control" placeholder="Enter your email">
                    @error('email')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-paper-plane"></span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
