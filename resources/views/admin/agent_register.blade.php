@extends('admin.layout')
@section('title','ثبت‌نام کارشناس')
@section('content')
    <div class="col-md-6">
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت‌نام کارشناس</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{asset('admin/agent_store')}}" method="post" role="form">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="agent">شماره کارشناس</label>
                            <input name="agent" type="number" class="form-control" id="agent" placeholder="شماره کارشناس" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="name">نام و نام‌خانوادگی</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="نام و نام‌خانوادگی" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="position">گروه</label>
                            <select name="position" class="form-control">
                                <option value="1">دفاعی-نازی</option>
                                <option value="2">علی‌باز-محمدطاهر</option>
                                <option value="3">مراد-نیکو</option>
                                <option value="4">خوش‌نظر-خادمی</option>
                                <option value="5">فریدنی‌نژاد-براتی</option>
                                <option value="6">قاسمی-اسدی</option>
                                <option value="7">حمزه</option>
                            </select>
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
