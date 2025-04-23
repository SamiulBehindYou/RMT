@extends('frontend.layout')

@section('css')
    <style>
        .profile-img img{
            width: 150px;
        }
        .profile-img{
            /* z-index: 5; */
        }
        .profile-list {
            height: 450px;
            background: #3b5d50;
            border-radius: 4%;
            backdrop-filter: blur(5px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .bg-layer{
            background:#3b5d50;
            border-radius: 4%;
        }
        .list{
            /* margin: auto; */
        }

    </style>
@endsection

@section('main')


    <!-- Start Contact Form -->
    <div class="container">

        <div class="block">
            <div class="row justify-content-center">


                <div class="col-md-8 col-lg-8 pb-0 mb-0">


                    <div class="row my-2">
                    <div class="col-lg-6 m-auto ">
                        <div class="bg-layer p-2">
                            <div class="profile-list d-flex justify-content-center align-items-center flex-column p-2">
                                <div class="profile-img my-2">
                                <img src="{{ asset('frontend/images/person_4.jpg') }}" class="rounded-circle profile-pic">
                                </div>
                                <div class="text-center">
                                    <h3 class="text-white m-0">
                                        {{ Auth::guard('customer')->user()->name }}
                                    </h3>
                                    <p class="text-white m-0">
                                        {{ Auth::guard('customer')->user()->email }}
                                    </p>
                                    <p class="text-white m-0">
                                        {{ Auth::guard('customer')->user()->phone }}
                                    </p>
                                    <p class="text-white m-0">
                                        {{ Auth::guard('customer')->user()->address }}
                                    </p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-sm modal-show">Update</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<!-- End Contact Form -->

<!-- Modal Start -->

  <div class="modal fade" id="EditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update profile</h5>
                <button type="button" class="close modal-hide btn btn-sm btn-danger">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateProfile">
                @csrf
                <div class="modal-body">
                    <div class="my-2">
                        <lebel class="form-label">Name</lebel>
                        <input type="text" class="form-control" name="name" value="{{ Auth::guard('customer')->user()->name }}">
                    </div>
                    <div class="my-2">
                        <lebel class="form-label">Eamil</lebel>
                        <input type="text" class="form-control" name="email" value="{{ Auth::guard('customer')->user()->email }}">
                    </div>
                    <div class="my-2">
                        <lebel class="form-label">Phone</lebel>
                        <input type="text" class="form-control" name="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                    </div>
                    <div class="my-2">
                        <lebel class="form-label">Address</lebel>
                        <input type="text" class="form-control" name="address" value="{{ Auth::guard('customer')->user()->address }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modal-hide">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
  </div>
<!-- Modal End -->
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.modal-show').click(function() {
                $('#EditProfile').modal('show');
            });
            $('.modal-hide').click(function() {
                $('#EditProfile').modal('hide');
            });

            $('#updateProfile').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('customer.profile.update') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#EditProfile').modal('hide');
                            location.reload();
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            });
        });
    </script>

@endsection
