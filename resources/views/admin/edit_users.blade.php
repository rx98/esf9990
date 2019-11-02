@extends('admin.layout')
@section('title','تغییر مشخصات کاربرها')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تغییر مشخصات کاربرها</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{asset('admin/edit_users')}}" method="post" role="form">
                    {{csrf_field()}}
                    <div class="box-body">
                        <input name="id" type="hidden" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="name"> نام و نام‌خانوادگی: </label>
                            <input name="name" type="text" value="{{$user->name}}" class="form-control" id="name" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email"> ایمیل: </label>
                            <input name="email" type="text" value="{{$user->email}}" class="form-control" id="email" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="sex"> جنیست: </label>
                            <select id="sex" type="checkbox" class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" name="sex"  required>
                                <option selected value="1">مرد</option>
                                <option value="">زن</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password"> رمز عبور: </label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                        </div>

                        <div class="form-group">
                            <label for="grade"> تحصیلات: </label>
                            <select id="grade" type="checkbox" class="form-control{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" required>
                                <option value="دیپلم">دیپلم</option>
                                <option value="فوق‌دیپلم">فوق‌دیپلم</option>
                                <option selected value="لیسانس">لیسانس</option>
                                <option value="فوق‌لیسانس">فوق‌لیسانس</option>
                                <option value="دکتری">دکتری</option>
                            </select>
                            @if ($errors->has('number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                            @endif
                            </div>

                            <div class="form-group">
                                    <label for="zoon"> مرکز: </label>
                                    <select id="zoon" type="checkbox" class="form-control{{ $errors->has('zoon') ? ' is-invalid' : '' }}" name="zoon" required>
                                        <option value="MCI">MCI</option>
                                        <option selected value="تهران">تهران</option>
                                        <option value="اصفهان">اصفهان</option>
                                        <option value="تبریز">تبریز</option>
                                        <option value="مشهد">مشهد</option>
                                        <option value="اهواز">اهواز</option>
                                        <option value="شیراز">شیراز</option>
                                        <option value="اراک">اراک</option>
                                    </select>
                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                    <label for="agent"> کد کاربری: </label>
                                    <input id="agent" type="number" class="form-control{{ $errors->has('agent') ? ' is-invalid' : '' }}" name="agent" value="{{$user->agent}}" required>
                                </div>
                    </div>

                        <div class="form-group">
                            <label for="group">گروه سوپروایزر(برای کارشناس پاسخگو خالی باشد): <span style="color: red">{{$user->group}}</span></label>
                            <select id="group" name="group" class="form-control">
                                <option value="">انتخاب کنید</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>

                        <div class="form-group">
                                <label for="group">گروه کارشناس پاسخگو: <span style="color: red">{{$user->position}}</span></label>
                                <select id="group" name="position" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        @if(Auth::user()->privilege == 1 || Auth::user()->privilege ==5)
                        <div class="form-group">
                            <label for="privilege">نوع کاربر: <span style="color: red">{{$user->privilege}}</span></label>
                            <select id="privilege" name="privilege" class="form-control">
                                <option value="">انتخاب کنید</option>
                                @if(Auth::user()->privilege == 5)<option value="5">مدیر</option>@endif
                                <option value="1">مدیرمرکز</option>
                                <option value="4">مدیریت مرخصی</option>
                                <option value="2">سوپروایزر</option>
                                <option value="3">کارشناس پاسخگو</option>
                            </select>
                        </div> @endif

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" id="user" class="btn btn-primary">ثبت تغییرات</button>
                    </div>
<hr>
<hr>


                </form>

                <form enctype="multipart/form-data" action="{{asset('admin/upload_image')}}" method="post" role="form">
                    {{csrf_field()}}
                    <div class="box-body">
                        <input name="id" type="hidden" value="{{$user->id}}">

                        <div class="form-group">
                            <label for="image">تصویر کاربر: </label>
                            <input name="image" type="file" id="image" >
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" id="img" class="btn btn-primary">بارگزاری</button>
                    </div>



                </form>
            </div>

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
@endsection
