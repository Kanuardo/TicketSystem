@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">

            <div class="col-md-11 text-right">

                <label>
                    <input type="checkbox" id="show-all" class="minimal" name="status">
                </label>
                <label>
                    Показать закрытые тикеты
                </label>

            </div>
            <div class="col-md-1 text-right">

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Отделы
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">

                        <li><a href="{{route('admindepartment.show', $slug='it-otdel')}}">IT Отдел</a> </li>


                        <li><a href="{{route('admindepartment.show', $slug='otdel-prodazh')}}">Отдел продаж</a></li>


                        <li><a href="{{route('admindepartment.show', $slug='finansovyy-otdel')}}">Финансовый отдел</a> </li>

                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">


                        @foreach( $tickets as $ticket)

                            <article class="post">
                                <p style="text-align: left; width:49%;  display: inline-block;">{{$ticket-> author-> name}}</p>
                                <p style="text-align: right; width:50%;  display: inline-block;"> {{$ticket-> department-> title}} / {{$ticket-> data()}}</p>
                                <div class="post-thumb">

                                  <a href="{{route('admin.ticket.index', $ticket->slug)}}" class="post-thumb-overlay text-center">

                                    </a>
                                </div>
                                <div class="post-content">
                                    <header class="entry-header text-left text-uppercase">


                                        <h1 class="entry-title"><a href="{{route('admin.ticket.index',
                                        $ticket->slug)}}">{{$ticket-> title}}</a></h1>


                                    </header>
                                    <div class="entry-content">
                                        <p>{{$ticket->content}}
                                        </p>
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

                                        <div class="btn-continue-reading text-center text-uppercase">
                                            <a href="{{route('admin.ticket.index', $ticket->slug)}}"
                                               class="more-link">Continue Reading</a>
                                        </div>
                                    </div>




                                </div>
                            </article>
                        @endforeach



                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-12 text-center">
                        {{$tickets->links()}}

                    </div>

                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

@endsection