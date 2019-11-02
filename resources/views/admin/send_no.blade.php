@extends('admin.layout')
@section('title','ارسال شماره')
@section('content')
    <div class="row">
        <div class="col-md-6"></div>

        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ارسال شماره</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{asset('admin/sendno')}}" method="post" role="form">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="number">شماره</label>
                            <input name="number" type="text" class="form-control" id="number" placeholder="شماره مشترک" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="comment">شرح</label>
                            <textarea rows="3" name="comment" type="text" class="form-control" id="comment" placeholder="شرح" required autofocus></textarea>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" id="reg" class="btn btn-primary">ارسال</button>
                    </div>



                </form>
            </div>




        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
@endsection
