@extends('layout')

@section('content')

    <div class="main-content">
        <div class="container">

            <!-- Drop down menu -->
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Отделы
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">

                            <li><a href="{{route('department.show', $slug='it-otdel')}}">IT Отдел</a> </li>


                            <li><a href="{{route('department.show', $slug='otdel-prodazh')}}">Отдел продаж</a></li>


                            <li><a href="{{route('department.show', $slug ='finansovyy-otdel')}}">Финансовый отдел</a> </li>

                        </ul>
                    </div>

                </div>
            </div>
            <!-- /drop down menu -->
            <!-- Main content -->

            <div class="row">
                <div class="col-md-12">
                    @foreach( $tickets as $ticket)
                        <article class="post">
                            <p style="text-align: left; width:49%;  display: inline-block;">{{$ticket-> author-> name}}</p>
                            <p style="text-align: right; width:50%;  display: inline-block;"> {{$ticket-> department-> title}} / {{$ticket-> data()}}</p>
                                <div class="post-thumb">
                                    <a href="{{route('ticket.show', $ticket->slug)}}" class="post-thumb-overlay text-center"></a>
                                </div>
                            <div class="post-content">
                                     <header class="entry-header text-left text-uppercase">

                                         <h1 class="entry-title"><a href="{{route('ticket.show', $ticket->slug)}}">{{$ticket->title}}</a></h1>

                                     </header>

                                <div class="entry-content">
                                    <p>{{$ticket->content}}
                                    </p>
                                    <!-- latest comment -->
                                    @if(!$ticket-> comments->isEmpty())

                                     @foreach($ticket->comments3->reverse() as $comment)

                                          <div class="bottom-comment">

                                               <div class="comment-text">
                                                   <h5>{{$comment->author->name}}</h5>
                                                   <p class="comment-date">
                                                    {{$comment->created_at-> diffForHumans()}}
                                                   </p>
                                                   <p class="para">{{$comment->title}}</p>
                                               </div>
                                          </div>
                                    @endforeach @endif
                                    <!-- /. latest comment -->
                                </div>
                            </div>
                            @if($ticket->status==1)
                                <h3 class="red">Tикет закрыт</h3>
                                @endif

                    </article>
                    @endforeach
                    <!-- pagination -->
                    <div class="row">
                        <div class="col-12 text-center">
                            {{$tickets->links()}}

                        </div>

                    </div>
                    <!-- /.pagination -->

                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>

@endsection