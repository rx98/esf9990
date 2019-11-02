@extends('admin.layout')
@section('title','مدیریت گروه‌ها و مراکز')
@section('content')
<div class="row">
        <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ثبت مرکز</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{asset('admin/zoon_store')}}" method="post" role="form">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="agent">شماره مرکز</label>
                                <input name="row" type="number" class="form-control" id="row" placeholder="شماره مرکز" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="name">نام مرکز</label>
                                <input name="sup" type="text" class="form-control" id="sup" placeholder=" نام مرکز" required autofocus>
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
        <!-- /.row -->
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ثبت گروه</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{asset('admin/group_store')}}" method="post" role="form">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="agent">شماره گروه</label>
                        <input name="row" type="number" class="form-control" id="row" placeholder="شماره گروه" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="name">نام و نام‌خانوادگی سوپروایزر</label>
                        <input name="sup" type="text" class="form-control" id="sup" placeholder=" نام و نام‌خانوادگی سوپروایزر" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="name">نام و نام‌خانوادگی تضمین کیفیت</label>
                        <input name="qa" type="text" class="form-control" id="qa" placeholder="نام و نام‌خانوادگی تضمین کیفیت" required autofocus>
                    </div>
                    @if(Auth::user()->privilege ==5)
                    <div class="form-group">
                            <label for="zoon">مرکز</label>

                        <select name="zoon" class="form-control select2" data-placeholder="انتخاب مرکز" style="width: 100%;">
                            <option value="">انتخاب کنید</option>
                            <option value="تهران">تهران</option>
                            <option value="اصفهان">اصفهان</option>
                            <option value="تبریز">تبریز</option>
                            <option value="مشهد">مشهد</option>
                            <option value="اهواز">اهواز</option>
                            <option value="شیراز">شیراز</option>
                            <option value="اراک">اراک</option>
                        </select>
                    </div> @else
                        <input type="hidden" value="{{Auth::user()->zoon}}">

                    @endif



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
