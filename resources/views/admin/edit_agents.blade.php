@extends('admin.layout')
@section('title','ثبت‌نام کارشناس')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تغییر مشخصات کارشناس</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{asset('admin/edit_agents')}}" method="post" role="form">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="agent">شماره کارشناس: @if($editAgent) <span style="color: red">{{$editAgent->agent}}</span> @endif</label>
                            <?php //dd($editAgent[0]->name);?>
                            <input name="agent" type="number" class="form-control" value="{{$editAgent->agent}}" id="agent" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="name"> نام و نام‌خانوادگی: <span style="color: red">{{$editAgent->name}}</span></label>
                            <input name="name" type="text" class="form-control" value="{{$editAgent->name}}" id="name" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="position">گروه: <span style="color: red">{{$editAgent->position}}</span></label>
                            <select name="position" class="form-control">
                                <option value="0">انتخاب کنید</option>
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
                        <button type="submit" id="reg" class="btn btn-primary">ثبت تغییرات</button>
                    </div>



                </form>
            </div>




        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
@endsection
