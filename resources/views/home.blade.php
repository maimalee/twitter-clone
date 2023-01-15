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
                               <img src="/assets/images/th.webp" class="rounded-circle" alt="anas" style="width: 60px; height: 60px; margin-left: 3px">
                           @else
                               <img src="/assets/images/th.webp" alt="" class="rounded-circle" style="width: 60px; height: 60px; margin-left: 8px">
                           @endif
                       </div>
                       <div class="col-md-10">
                           <form action="" method="post" multiple="multiple">
                               @csrf
                               {{$errors}}

                               <div class="form-group">
                                <textarea name="" id="tweet-form" cols="30" rows="10" class="form-control">
                                </textarea>
                                   <hr>
                               </div>

                               <div class="text-end">
                                   <button class="btn btn-primary btn-sm">
                                       <i class="fa fa-plus"></i>
                                       Tweet
                                   </button>
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
                               <img src="/assets/images/{{$post['profile']}}" alt="" class="rounded-circle" style="width: 60px; height: 60px">
                           @else
                               <img src="/assets/images/th.webp" alt="" class="rounded-circle" style="width: 60px; height: 60px">

                           @endif
                       </div>

                       <div class="col-md-9 mt-3">
                           <b>  {{$post->fname}}{{$post->last_name}}
                           </b>
                           @ {{$post->uname}}
                           <div class="mt-4">
                               {{$post->post_body}}
                           </div>
                           <!-- Post Footer-->

                           <div class="mt-4">
                               <i class="fa fa-heart m-lg-3"></i>
                               <i class="fa fa-comment m-lg-3"></i>
                               <i class="fa fa-share-square m-lg-3"></i>
                               <i class="fa fa-retweet m-lg-3"></i>
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
                                      <input type="search" class="input-field" style="border-radius: 20px; background-color: #f4f4f4">
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
                                        <img src="/assets/images/th.webp" class="rounded-circle" alt="anas" style="width: 60px; height: 60px; margin-left: 0px">
                                    @else
                                        <img src="/assets/images/th.webp" alt="" class="rounded-circle" style="width: 60px; height: 60px; margin-left: 0px">
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
<style type="text/css">
    #tweet-form {
        border: none;
        resize: none;
        overflow: auto;
          }
    #tweet-form:focus {
        outline: #0a58ca;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        box-sizing: border-box;
        font-size: 1em;
    }
    .input-icons i {
        position: absolute;
    }

    .input-icons {
        width: 100%;
        margin-bottom: 10px;
    }

    .icon {
        padding: 10px;
        color: green;
        min-width: 50px;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        text-align: left;
    }
</style>
