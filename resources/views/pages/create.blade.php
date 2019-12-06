@extends('layout')
@section('content')
    <div class="main-content">
        <!-- Main content -->
        <section class="container">
        {{Form::open([
        'route'=>'create.store'
        ])}}
            <!-- Default box -->

                        <h3 class="box-title">Создание нового тикета</h3>
            @include('admin.errors')
                    <div class="box-body">
                        <div class="col-md-6">
                         <div class="form-group">
                             <label for="exampleInputEmail1">Заголовок</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{old('title')}}" placeholder="">
                         </div>
                            <div class="form-group">
                             <label>Категория</label>
                                {{Form::select('department_id',
                                  $departments,
                                  null,
                                  ['class' => 'form-control select2'])
                                                                  }}
                              </div>
                        </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea id="" cols="30" rows="10" class="form-control" name="content"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
           {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection