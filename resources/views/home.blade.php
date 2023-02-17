@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-7">
            <div class="container-scroller" style="padding-top: 5px; padding-left: 5px">
                <h4>Home</h4>
            </div>
            <div class="mt-3">
                <div class="row">
                    <div class="col-md-1 mt-2">
                        @if(Auth::user()['profile'])
                            <img src="/assets/images/th.webp" class="rounded-circle" alt="anas"
                                 style="width: 60px; height: 60px; margin-left: 3px">
                        @else
                            <img src="/assets/images/th.webp" alt="" class="rounded-circle"
                                 style="width: 60px; height: 60px; margin-left: 8px">
                        @endif

                    </div>

                    <div class="col-md-3 mt-2">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" id="tweet-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Everyone
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Everyone</a>
                                <a class="dropdown-item" href="#">Only</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-10">
                        <form action="{{Route('post.create')}}" method="GET" multiple="multiple">
                            @csrf
                            {{$errors}}

                            <div class="form-group mt-5" >
                                <textarea name="post_body" id="tweet-form"  cols="60"  class="form-cotrol" onclick="tweet()">

                                </textarea>
                                <hr>
                            </div>

                            <div class="row">
                                <div class="col-md-7 ">
e
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary btn-sm" id="tweetBtn" disabled>
                                        <i class="fas fa-plus"></i>
                                        Tweetee
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <hr>
                <a href="" class="text-decoration-none">
                    Show 100 Tweets
                </a>
                <hr>
            </div>

            <div class="row p-2">
                @foreach($posts as $post)
                    <div class="col-md-1" style="margin-left: 5px">
                        @if($post->profile)
                            <img src="/assets/images/{{$post['profile']}}" alt="" class="rounded-circle"
                                 style="width: 60px; height: 60px">
                        @else
                            <img src="/assets/images/th.webp" alt="" class="rounded-circle"
                                 style="width: 60px; height: 60px">

                        @endif
                    </div>

                    <div class="col-md-9 mt-3">
                        <b>  {{$post->fname}}{{$post->last_name}}
                        </b>
                        @ {{$post->uname}}
                        <div class="mt-4">
                            {{$post->post_body}}
                            @foreach($post['top_comments'] as $comment)
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <span class="p-3">
                                            {{$comment->post_body}}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
                                            data-option-id="{{$post['post_id']}}"
                                            onclick="show({{$post->post_id}})">
                                        <i class="fa fa-retweet"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div id="showOptions-{{$post->post_id}}" style="display: none">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-">
                                            <form action="" method="POST">
                                                <a href="{{Route('post.retweet', $post->post_id)}}" class="btn btn-primary">
                                                    Retweet
                                                </a>
                                            </form>
                                            <a href="" data-toggle="modal"  class="btn btn-primary mt-2" data-target="#reply-modal-{{$post->post_id}}">
                                                Quote Tweet
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- quote tweet modal -->
                            <div class="modal fade" id="reply-modal-{{$post->post_id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form  action="{{Route('post.quoteTweet', $post->post_id)}}" method="GET" id="reply_form">
                                            <div class="modal-body">
                                                @csrf
                                                {{$errors}}



                                                <div class="row">
                                                    <div class="col-md-2">
                                                        @if(Auth::user()['profile'])
                                                            <img src="/assets/images/th.webp" class="rounded-circle" alt="anas"
                                                                 style="width: 60px; height: 60px; margin-left: 3px">
                                                        @else
                                                            <img src="/assets/images/th.webp" alt="" class="rounded-circle"
                                                                 style="width: 60px; height: 60px; margin-left: 8px">
                                                        @endif</div>

                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                    <textarea name="post_body" id="quote-tweet-form" cols="30" rows="10"
                                                              class="textarea-custom" style="border: hidden">
                                                    </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Close
                                                    </button>
                                                    <button onclick="form_submit()" class="btn btn-primary">
                                                        Send
                                                    </button>
                                                </div>

                                                <div class="mt-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            @if(Auth::user()['profile'])
                                                                <img src="/assets/images/th.webp" class="rounded-circle" alt="anas"
                                                                     style="width: 60px; height: 60px; margin-left: 3px"> {{$post->uname}}
                                                            @else
                                                                <img src="/assets/images/th.webp" alt="" class="rounded-circle"
                                                                     style="width: 60px; height: 60px; margin-left: 8px"> {{$post->uname}}
                                                            @endif
                                                                <br>
                                                            {{$post->post_body}}
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a href="" class="text-decoration-none">
                            ....
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Third part-->
        <div class="col-md-5" style="border-left: 1px solid mediumpurple; margin-top: -16px; margin-left: -20px">
            <div class="mt-4">
                <div class="rounded-end" style="margin:15px">
                    <form action="">
                        @csrf
                        {{$errors}}
                        <div class="row">
                            <div class="input-icons">
                                <i class="fa fa-search icon"></i>
                                <input type="search" class="input-field"
                                       style="border-radius: 20px; background-color: #f4f4f4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-4" style="background-color: #f4f4f4;margin: 15px; border-radius: 20px">
                <!-- trending for you -->
                <div class="">
                    <b><p>Trends For You</p></b>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="mt-2">
                            <b>Sports.Trending</b> <br>
                            Premier League <br>
                            12k tweets
                        </div>
                    </div>

                    <div class="col-md-2">
                        <a href="" class="text-decoration-none">
                            ....
                        </a>
                    </div>

                    <div class="col-md-10">
                        <div class="mt-2">
                            <b>Sports.Trending</b> <br>
                            Premier League <br>
                            12k tweets
                        </div>
                    </div>

                    <div class="col-md-2">
                        <a href="" class="text-decoration-none">
                            ....
                        </a>
                    </div>

                    <div class="col-md-10">
                        <div class="mt-2">
                            <b>Sports.Trending</b> <br>
                            Premier League <br>
                            12k tweets
                        </div>
                    </div>

                    <div class="col-md-2">
                        <a href="" class="text-decoration-none">
                            ....
                        </a>
                    </div>

                    <div class="col-md-10">
                        <div class="mt-2">
                            <b>Sports.Trending</b> <br>
                            Premier League <br>
                            12k tweets
                        </div>
                    </div>

                    <div class="col-md-2">
                        <a href="" class="text-decoration-none">
                            ....
                        </a>
                    </div>
                </div>

            </div>

            <div class="p-4" style="background-color: #f4f4f4;margin: 15px; border-radius: 20px">
                <!-- trending for you -->
                <span class="">
                          <b><p>Who to follow</p></b>
                      </span>
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-md-2 mt-2">
                            @if(Auth::user()['profile'])
                                <img src="/assets/images/th.webp" class="rounded-circle" alt="anas"
                                     style="width: 60px; height: 60px; margin-left: 0px">
                            @else
                                <img src="/assets/images/th.webp" alt="" class="rounded-circle"
                                     style="width: 60px; height: 60px; margin-left: 0px">
                            @endif
                        </div>
                        <div class="col-md-6 mt-2">
                            {{$user->first_name}}
                            {{$user->last_name}} <br>
                            @ {{$user->username}}
                        </div>
                        <div class="col-md-4 mt-2">
                            <a href="{{Route('users.follow', $user->user_id)}}" class="btn btn-primary">
                                Follow
                            </a>
                        </div>
                    @endforeach
                    <div class="mt-3">
                        <a href="" class="text-decoration-none">
                            Show More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">

        function tweet() {
            $("#tweet-form").focus().prop("selectionStart", 0).prop("selectionEnd", 0);
            const textarea = document.getElementById("tweet-form");
            const submitButton = document.getElementById("tweetBtn");

            textarea.addEventListener("input", function() {
                if (textarea.value.length > 0) {
                    submitButton.removeAttribute("disabled");
                } else {
                    submitButton.setAttribute("disabled", "true");
                }
            });
        }

        function form_submit() {
            document.getElementById("reply_form").submit();
        }

        $('.btn.btn-show').on('click', e => {
            e.preventDefault();
            const button = e.currentTarget;
            const $option = button.dataset.optionId
            const addLinks = document.getElementById(`showOptions-${$option}`);
            addLinks.style.display = 'block';
        })


    </script>
@endsection
<style type="text/css">
    #quote-tweet-form{
        border: hidden;
        border: .2rem solid #040460;
        resize: vertical; /* control in which direction textarea can be resized */

    }
    #reply_form {
        display: flex;
        flex-direction: column;
        max-width: 1000px;
    }
    #tweet-form {
        border: none;
    }
    #tweet-form:focus {
        border-bottom: 2px solid black;
    }

</style>
