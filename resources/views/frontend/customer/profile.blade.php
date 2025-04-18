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
                            <div class="mt-2">
                                <a href="#" class="btn btn-sm btn-facebook">Update</a>
                            </div>
                        </div>

                    </div>
                  </div>
              </div>

              {{-- <div class="col-lg-8 m-auto">
                  <div class="mt-4 fs-4 list">
                      <div class="d-flex inline py-1">
                          <div class="col-3">
                              Name:
                          </div>
                          <div class="col-10">
                              {{ Auth::guard('customer')->user()->name }}
                          </div>
                      </div>
                      <div class="d-flex inline py-1">
                          <div class="col-3">
                              Email:
                          </div>
                          <div class="col-10">
                              {{ Auth::guard('customer')->user()->email }}
                          </div>
                      </div>
                      <div class="d-flex inline py-1">
                          <div class="col-3">
                              Created at:
                          </div>
                          <div class="col-10">
                              {{ Auth::guard('customer')->user()->created_at }}
                          </div>
                      </div>

                        <div class="mt-2">
                            <a href="" class="btn btn-primary btn-sm">Update</a>
                        </div>
                  </div>
              </div> --}}
            </div>

            {{-- <div class="row">
              <div class="text-center">
                  <a href="" class="btn btn-primary btn-sm">Update</a>
              </div>
            </div> --}}

          </div>

        </div>

      </div>

    </div>

</div>

<!-- End Contact Form -->


@endsection
