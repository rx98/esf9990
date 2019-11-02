@extends('admin.layout')
@section('title','مشاهده شماره‌های ارسال شده')
@section('content')




    <section class="content">
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">وضعیت مشکلات سیستمی و سرویس‌ها-تیکت‌ها و موارد خاص</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            محتوای مشکل: {{$select_no->comment ?? ''}}<br>
            شماره: {{$select_no->number ?? ''}}<br>
            پاسخ: {{$select_no->result ?? ''}}

        </div>
        <!-- /.box-body -->
@if(Auth::user()->zoon =='MCI' && request()->get('id'))
        <div class="box-footer">
          <form action="{{asset('admin/send_res')}}" method="post" role="form">
            {{csrf_field()}}
            <div class="box-body">
                <input name="id" type="hidden" value="{{$select_no->id ?? 0}}">
                <div class="form-group">
                    <label for="result">راهکار یا نتیجه:</label>
                    <textarea name="result"  class="form-control" id="name" required autofocus></textarea>
                </div>
                <div class="box-footer">
                    <button type="submit" id="user" class="btn btn-xs btn-primary">ارسال نتیجه</button>
                </div>
            </div>
          </form>
        </div>
@endif
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">شماره‌های ارسال شده توسط کارشناسان پاسخگو</h3>

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
                                <th style="text-align:right">شماره مشترک</th>
                                <th style="text-align:right">شرح</th>
                                <th style="text-align:right">نام/کد ارسال کننده</th>
                                <th style="text-align:right">زمان ارسال</th>
                                <th style="text-align:right">عملیات <a href="{{asset('admin/sendno')}}" class=" btn btn-primary btn-xs glyphicon glyphicon-plus"></a> </th>
                                <th style="text-align:right"></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $Row= 1; ?>
                            @foreach($viewNo as $vi)
                                <tr>

                                    <td>{{$Row}}</td><?php $Row ++;
                                    if (strpos($vi->number, '0') == 0){
                                        $number= substr($vi->number, 1);
                                    }else{
                                        $number= $vi->number;
                                    }
                                    ?>
                                    <td>{{$number}}</td>
                                    <td>{{$vi->comment}}</td>

                                    <?php $name= \App\User::where('id', $vi->user_id)->pluck('name');?>
                                    <td>{{$name[0] ?? $vi->agent}}</td>
                                    <?php $t = new Verta($vi->created_at);
                                    ?>
                                    <td>{{$t}}</td>

                                    <td>
                                        <a href="@if(Auth::user()->privilege == 3)# @else {{asset('admin/send_box?id=')}}{{$vi->id}} @endif" class=" btn btn-@if($vi->status == null)default @elseif($vi->status == 1)warning @elseif($vi->status == 2)danger @elseif($vi->status == 3)success @endif btn-xs glyphicon glyphicon-send"></a>
                                        <a href="{{asset('admin/view_no?id=')}}{{$vi->id}}" class=" btn btn-info btn-xs glyphicon glyphicon-folder-open"></a>
                                        <a href=" @if(Auth::user()->privilege == 3)# @else{{asset('admin/del_no?id=')}}{{$vi->id}} @endif" class=" btn btn-danger btn-xs glyphicon glyphicon-trash"></a>
                                    </td>
                                    <td></td>


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


                    {{--</div>--}}
                    {{--<!-- /.box-body -->--}}
                {{--</div>--}}
                {{--<!-- /.box -->--}}
            {{--</div>--}}
            {{--<!-- /.col -->--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}
    {{--</section>--}}
    {{--<!-- /.content -->--}}
    {{--</div>--}}
@endsection

