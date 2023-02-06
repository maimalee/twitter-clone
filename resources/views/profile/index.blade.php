@extends('layouts.app')
@section('content')
    <div class="">
        <div class="row">
            <!-- center -->
            <div class="col-md-7" style="borer-right: 1px solid black">
                <div class="p-2">
                    <a href="" class="">
                        <i class="fa fa-arrow-left col-sm-1"></i>

                    </a>
                    {{$user->username}}
                </div>
                <div class="bg-dark" style="height: 200px; width: auto">
                    <div class="">
                        @if(Auth::user()['profile'])
                            <img src="/assets/images/th.webp" class="rounded-circle" alt="anas"
                                 style="width: 120px; height: 120px; margin-left: 8px; margin-top: 130px">
                        @else
                            <img src="/assets/images/th.webp" alt="" class="rounded-circle"
                                 style="width: 120px; height: 120px; margin-left: 8px; margin-top: 130px">
                        @endif
                    </div>

                    <div class="text-end" style="margin-top: -20px">
                        <a href="" class="btn btn-dark">
                            Edit Profile
                        </a>
                    </div>
                    <!-- main part -->
                    <div class="container-fluid">
                        {{$user->first_name}} <br>
                        @ {{ $user->username }}
                        <div class="mt-3">
                            <i class="fa fa-calendar"></i>
                            Joined {{ \Carbon\Carbon::parse($user->created_at)->format('M Y')}}
                        </div>
                      <div class="row mt-3">
                          <div class="col-md-2" style="margin-left: 65px">
                              Tweets
                          </div>

                          <div class="col-md-3" style="margin-left: 35px">
                                Tweets and Replies
                          </div>

                          <div class="col-md-2" style="margin-left: 35px">
                                Media
                          </div>

                          <div class="col-md-2"style="margin-left: 35px">
                                Likes
                          </div>
                      </div>
                        <hr>
                    </div>


                </div>


            </div>

            <!-- last part -->
            <div class="col-md-5">

            </div>
        </div>
    </div>
    &nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>

@endsection
