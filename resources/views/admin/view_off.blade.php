@extends('admin.layout')
@section('title','مشاهده مرخصی')
@section('content')
    <div>
        <?php
        $link= \App\Link::find(1);
        ?>
        <h4>تغییر وضعیت لینک‌ها</h4>
        <span>مرخصی استحقاقی</span>
        <a href="{{asset('admin/link_status')}}">@if($link->status == 1) فعال @else غیرفعال  @endif</a>

    </div>

    <div>

    </div>

    <div class="col-xs-3">
        <form method="POST" action="{{asset('admin/OffPerm')}}" onsubmit="return checkForm(this);">
            @csrf

            <div style="margin-top: 60px; clear: both;"></div>

            <div class="container" style="max-width: 300px;">

                <div class="form-group">
                    <label class="sr-only" for="exampleInput1"> ثبت مرخصی‌های مجاز </label>
                    <div class="input-group">
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-targetselector="#exampleInput1" data-trigger="click" data-enabletimepicker="true">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input name="datePerm" type="text" class="form-control" id="exampleInput1" placeholder="" />

                    </div>
                </div>

                <br>

                <div class="form-group row mb-0">
                    <div class="col-md-7 offset-md-1">
                        <button name="myButton" type="submit" class="btn btn-success btn-sx">
                            {{ __('ارسال') }}
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="col-xs-9">
        <form method="get" action="{{asset('admin/view_off')}}" onsubmit="return checkForm(this);">
            @csrf

            <div style="margin-top: 50px; clear: both;"></div>

            <div class="container" style="max-width: 500px;">

                <div class="input-group">
                    <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#fromDate2" data-groupid="group2" data-fromdate="true" data-enabletimepicker="false" data-placement="left">
                        <span class="fa fa-calendar"></span>
                    </div>
                    <input name="from" type="text" value="@if($dateFrom){{$dateFrom}} @endif" class="form-control" id="fromDate2" placeholder="از تاریخ" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#fromDate2" data-groupid="group2" data-fromdate="true" data-enabletimepicker="false" data-placement="right" />
                </div>

                <div class="input-group">
                    <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#toDate2" data-groupid="group2" data-todate="true" data-enabletimepicker="false" data-placement="left">
                        <span class="fa fa-calendar"></span>
                    </div>
                    <input name="upTo" type="text" value="@if($dateFrom){{$dateUpTo}} @endif" class="form-control" id="toDate2" placeholder="تا تاریخ" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#toDate2" data-groupid="group2" data-todate="true" data-enabletimepicker="true" data-placement="right" />
                </div>

                <br>



                <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-4">
                        <button name="myButton" type="submit" class="btn btn-success btn-sx">
                            {{ __('مشاهده') }}
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </div>




    <section class="content">

        <div class="row">
            <div class="col-xs-3">

                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">مرخصی‌های مجاز</h4>

                        <div class="box-tools">

                        </div>
                    </div>
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="text-align:right">ردیف</th>
                                <th style="text-align:right">تاریخ مرخصی</th>
                                <th style="text-align:right">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $Row= 1; ?>
                            @foreach($po as $pos)
                                <tr>

                                    <td>{{$Row}}</td><?php $Row ++;?>

                                    <td>{{$pos->date}}</td>


                                    <td>
                                        <a onclick="return confirm('برای پاک کردن خاطرجمع هستید؟')" href="{{asset('admin/permDell?id=')}}{{$pos->id}}" class="btn btn-danger btn-xs glyphicon glyphicon-trash"></a>
                                    </td>


                                </tr>

                                {{--getAttributeValue()--}}
                            @endforeach

                            </tbody>



                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

            <div class="col-xs-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">مرخصی استحقاقی ثبت شده توسط کارشناسان پاسخگو</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="text-align:right">ردیف</th>
                                <th style="text-align:right">نام کارشناس</th>
                                <th style="text-align:right">تاریخ مرخصی</th>
                                <th style="text-align:right">زمان ثبت مرخصی</th>
                                <th style="text-align:right">اولویت</th>
                                <th style="text-align:right">وضعیت</th>
                                <th style="text-align:right">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $Row= 1; ?>
                            @foreach($allOff as $vo)
                                <tr>

                                    <td>{{$Row}}</td><?php $Row ++;?>
                                    <td>{{$vo->name}}</td>

                                    <td>{{$vo->date}}</td>
                                    <td>{{new Verta($vo->created_at)}}</td>

                                    <td></td>


                                    <td>
                                        <a href="{{asset('admin/offChStatus?id=')}}{{$vo->id}}">@if($vo->status == null) در انتظار تایید @else تایید شد @endif</a>
                                    </td>
                                    <td>
                                        <a style="display: @if(Auth::user()->privilege == 4 ||Auth::user()->privilege == 1) @else none @endif" onclick="return confirm('برای پاک کردن خاطرجمع هستید؟')" href="{{asset('admin/offDell?id=')}}{{$vo->id}}" class="btn btn-danger btn-xs glyphicon glyphicon-trash"></a>
                                    </td>


                                </tr>

                                {{--getAttributeValue()--}}
                            @endforeach

                            </tbody>



                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>


@endsection