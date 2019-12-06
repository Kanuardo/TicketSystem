@extends('layout')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                            @foreach( $tickets as $ticket)
                            <article class="post post-grid">
                                <p style="text-align: left; width:49%;  display: inline-block;" class="text-danger">{{$ticket->author->name}}</p>
                                <p style="text-align: right; width:50%;  display: inline-block;" class="comment-text"> {{$ticket-> department-> title}} / {{$ticket->data()}}</p>
                                <div class="post-thumb">


                                    <a href="{{route('ticket.show', $ticket->slug)}}" class="post-thumb-overlay text-center">

                                    </a>
                                </div>
                                <div class="post-content">
                                    <header class="entry-header text-left text-uppercase">


                                        <h1 class="entry-title"><a href="{{route('ticket.show', $ticket->slug)}}">{{$ticket->title}}</a></h1>


                                    </header>
                                    <div class="entry-content">
                                        {!! $ticket->content !!}

                                        <div class="social-share">
                                            <span class="social-share-title pull-left text-capitalize">By Rubel On February 12, 2016</span>
                                        </div>
                                    </div>
                                </div>

                            </article>
                            @endforeach


                        <div class="row">
                            <div class="col-12 text-center">
                                {{$tickets->links()}}
                            </div>
                        </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection