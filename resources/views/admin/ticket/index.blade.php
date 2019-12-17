@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>Просмотр тикета</h1>


        </section>
    {{ Breadcrumbs::render('ticket') }}

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif
                            <article class="post">
                                <p style="text-align: left; width:49%;  display: inline-block;">{{$ticket->author->name}}</p>
                                <p style="text-align: right; width:50%;  display: inline-block;"> {{$ticket-> department-> title}} / {{$ticket->data()}}</p>
                                <div class="post-content">
                                    <header class="entry-header text-left text-uppercase">


                                        <h1 class="entry-title">{{$ticket->title}}</h1>


                                    </header>
                                    <div class="entry-content">
                                        {!! $ticket->content !!}
                                    </div>

                                </div>
                            </article>
                                <div class="text-center">
                                <h3 class="text-black-50">Диалог:</h3>
                                </div>

                            @if(!$ticket-> comments->isEmpty())
                                @foreach($ticket->comments as $comment)
                                    <div class="bottom-comment"><!--bottom comment-->

                                        <div class="comment-text">

                                            <h5>{{$comment->author->name}}</h5>

                                            <p class="comment-date">
                                                {{$comment->created_at-> diffForHumans()}}
                                            </p>


                                            <p class="para">{{$comment->title}}</p>
                                        </div>
                                    </div>
                            @endforeach @endif

                        <!-- end bottom comment-->

                            @if($ticket->status==0)
                            <div class="leave-comment"><!--leave comment-->
                                <h4>Oтправить ответ</h4>
                                <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                                    {{csrf_field()}}
                                    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                    <div class="form-group">
                                        <div class="col-md-12">
										<textarea class="form-control" rows="6" name="message"
                                                  placeholder="Write Massage"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn send-btn">Oтправить</button>
                                </form>
                            </div>@endif<!--end leave comment-->
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>




@endsection