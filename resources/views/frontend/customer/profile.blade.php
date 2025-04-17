@extends('frontend.layout')

@section('css')
    <style>
        .profile-img img{
            width: 150px;
        }
        .profile-img{
            position: absolute;
            z-index: 5;
        }
        .profile-list {
            position: relative;
            height: 450px;
            background: #3b5d50;
            margin-top: 20px;
            border-radius: 35% 11% 0% 0%;
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


            <div class="row">
              <div class="col-lg-4 mt-5">
                  <div class="profile-img">
                    <img src="{{ asset('frontend/images/person_4.jpg') }}" class="rounded-circle profile-pic">
                  </div>
                  <div class="profile-list"></div>
              </div>

              <div class="col-lg-8 m-auto">
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
              </div>
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
