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
                                <label for="name">نام مرکز</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder=" نام مرکز" required autofocus>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" id="reg" class="btn btn-primary">ارسال</button>
                        </div>
                    </form>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="text-align:right">ردیف</th>
                                <th style="text-align:right">نام مرکز</th>
                                <th style="text-align:right">عملیات </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $Row= 1; ?>
                            @foreach ($zoons as $zoon)
                            <tr>
                                <td>{{$Row}}</td><?php $Row ++;?>
                                <td>{{$zoon->name}}</td>
                                <td>
                                    {{-- <a onclick="return confirm('برای پاک کردن خاطرجمع هستید؟')" href="{{asset('admin/zoonDell?id=')}}{{$zoon->id}}" class=" btn btn-danger btn-xs glyphicon glyphicon-trash"></a> --}}
                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

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

                        <select name="zoon_id" class="form-control select2" data-placeholder="انتخاب مرکز" style="width: 100%;">
                            <option value="">انتخاب کنید</option>
                            @foreach ($zoons as $zoon)
                            <option value="{{$zoon->id}}">{{$zoon->name}}</option>
                            @endforeach
                        </select>
                    </div> @else
                        <input type="hidden" name="zoon_id" value="{{Auth::user()->zoon}}">

                    @endif
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" id="reg" class="btn btn-primary">ارسال</button>
                </div>



            </form>


                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align:right">ردیف</th>
                            <th style="text-align:right">نام گروه</th>
                            <th style="text-align:right">نام سوپروایزر</th>
                            <th style="text-align:right">تظمین کیفیت</th>
                            <th style="text-align:right">عملیات </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $Row= 1; ?>
                        @foreach ($groups as $group)

                        <tr>
                        <?php $zoon=''; if ($group->zoon_id ==1){
                            $zoon= 'بابل';
                        }elseif($group->zoon_id ==2){
                            $zoon= 'تهران';
                        }elseif($group->zoon_id ==3){
                            $zoon= 'اصفهان';
                        }elseif($group->zoon_id ==4){
                            $zoon= 'تبریز';
                        }elseif($group->zoon_id ==5){
                            $zoon= 'مشهد';
                        }elseif($group->zoon_id ==6){
                            $zoon= 'اهواز';
                        }elseif($group->zoon_id ==7){
                            $zoon= 'شیراز';
                        }elseif($group->zoon_id ==8)
                            $zoon= 'اراک'

                            ?>
                                <td>{{$Row}}</td><?php $Row ++;?>
                                <td>{{$group->row.'-'.$zoon}}</td>
                                <td>{{$group->sup}}</td>
                                <td>{{$group->qa}}</td>
                                <td>
                                    <a onclick="return confirm('برای پاک کردن خاطرجمع هستید؟')" href="{{asset('admin/groupDell?id=')}}{{$group->id}}" class=" btn btn-danger btn-xs glyphicon glyphicon-trash"></a>
                                </td>


                            </tr>

                        @endforeach

                        </tbody>



                    </table>
                </div>
            </div>
        </div>


    </div>


    </div>
    <!--/.col (right) -->
</div>
<!-- /.row -->
@endsection
