@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- center -->
        <div class="col-md-7">
            <div class="p-2">
                <div class="row">
                    <div class="col-md-1 mt-2">
                        <a href="{{Route('home')}}" class="">
                            <i class="fa fa-arrow-left col-sm-1"></i>

                        </a>
                    </div>

                    <div class="col-md-6">
                            <span class="" style="font-size: 1.3em">
                               <b> {{$user->first_name }} {{$user->last_name }}</b>
                            </span> <br>
                        {{$totalPost}} Tweets
                    </div>
                </div>


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
                <ul class="container-fluid">
                    {{$user->first_name }} {{$user->last_name}} <br>
                    @ {{ $user->username }}
                    <div class="mt-3">
                        <i class="fa fa-calendar"></i>
                        Joined {{ \Carbon\Carbon::parse($user->created_at)->format('F Y')}}
                        <br>
                        <div class="mt-2">
                               <span class="">
                                130 Followers
                           </span>
                            <span class="col-md-1">
                                130 Following
                           </span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item col-md-3" role="presentation">
                                <button class="nav-link active" id="tweets-tab" data-bs-toggle="tab"
                                        data-bs-target="#tweets"
                                        type="button" role="tab" aria-controls="tweets" aria-selected="true">
                                    Tweets
                                </button>
                            </li>
                            <li class="nav-item col-md-4" role="presentation">
                                <button class="nav-link" id="tweets-replies-tab" data-bs-toggle="tab"
                                        data-bs-target="#tweets-replies"
                                        type="button" role="tab" aria-controls="tweets-replies"
                                        aria-selected="false">
                                    Tweets and Replies
                                </button>
                            </li>

                            <li class="nav-item col-md-2" role="presentation">
                                <button class="nav-link" id="media-tab" data-bs-toggle="tab"
                                        data-bs-target="#media"
                                        type="button" role="tab" aria-controls="media" aria-selected="false">
                                    Media
                                </button>
                            </li>


                            <li class="nav-item col-md-2" role="presentation">
                                <button class="nav-link" id="likes-tab" data-bs-toggle="tab"
                                        data-bs-target="#likes"
                                        type="button" role="tab" aria-controls="likes" aria-selected="false">
                                    Likes
                                </button>
                            </li>


                        </ul>

                        <div class="tab-content mt-4" id="myTabContent">
                            <!-- Tweet part -->
                            <div class="tab-pane fade show active" id="tweets" role="tabpanel"
                                 aria-labelledby="tweets-tab">
                                @foreach($posts as $post)
                                    <div class="row">
                                        <div class="col-md-1 mt-3">
                                            @if(Auth::user()['profile'])
                                                <img src="/assets/images/th.webp" class="rounded-circle" alt="anas"
                                                     style="width: 40px; height: 40px;">
                                            @else
                                                <img src="/assets/images/th.webp" alt="" class="rounded-circle"
                                                     style="width: 40px; height: 40px;">
                                            @endif
                                        </div>

                                        <div class="col-md-10 mt-3">
                                            {{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}
                                            <div class="mt-3">
                                                {{$post->post_body}}
                                                <div class="mt-2">
                                                    <!-- Post Footer-->

                                                    <div class="mt-4">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <form action="">
                                                                    <i class="fa fa-comment m-lg-3"></i>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <form action="">
                                                                    <i class="fa fa-share-square m-lg-3"></i>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <form action="">
                                                                    <i class="fa fa-heart m-lg-3"></i>
                                                                </form>
                                                            </div>

                                                            <div class="col-md-1">
                                                                <button type="button" class="btn btn-show" id="option"
                                                                >
                                                                    <i class="fa fa-retweet"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="tweets-replies" role="tabpanel"
                                 aria-labelledby="tweets-replies-tab">
                                Tweets and reply bn
                            </div>
                            <div class="tab-pane fade" id="media" role="tabpanel"
                                 aria-labelledby="media-tab">
                                media
                            </div>
                            <div class="tab-pane fade" id="likes" role="tabpanel"
                                 aria-labelledby="likes-tab">
                                Likes
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <!-- last part -->
        <div class="col-md-5 mt-5">
            <div class="input-group">
                <div class="form-outline">
                    <input id="search-input" type="search" id="form1" class="form-control"/>
                </div>
                <button id="search-button" type="button" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    &nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>&nbsp;
    <br>&nbsp; <br>

@endsection

@section('script')
    <script type="text/javascript">
        const searchButton = document.getElementById('search-button');
        const searchInput = document.getElementById('search-input');
        searchButton.addEventListener('click', () => {
            const inputValue = searchInput.value;
            alert(inputValue);
        });
    </script>
@endsection
