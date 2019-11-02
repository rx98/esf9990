@extends('admin.layout')
@section('title','انتخاب تاریخ مرخصی استحقاقی')
@section('content')

<br>


<div style="font-size:18px" class="container">
    <div class=" row justify-content-center">
        <div style="direction: rtl; width:100%" class="col-md-9">
            <div class="card">
                <div style="text-align:center" class="card-header-tabs">{{'مرخصی استحقاقی'}}</div>
                </br>


                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{asset('admin/sendOff')}}" onsubmit="return checkForm(this);">
                        @csrf

                                <div style="margin-top: 50px; clear: both;"></div>

                        <div class="container" style="max-width: 300px;">

                            <div class="form-group">
                                <label class="sr-only" for="exampleInput1"> ثبت مرخصی استحقاقی </label>
                                <div class="input-group">
                                    <div class="input-group-addon" data-MdDateTimePicker="true" data-targetselector="#exampleInput1" data-trigger="click" data-enabletimepicker="true">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input name="date" type="text" class="form-control" id="exampleInput1" placeholder="" />
                                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}" class="form-control" />
                                    <input name="name" type="hidden" value="{{Auth::user()->name}}" class="form-control" />
                                </div>
                            </div>

                            <br>



                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-4">


                                <button name="myButton" type="submit" class="btn btn-success btn-sx">
                                    {{ __('ارسال') }}
                                </button>

                            </div>
                        </div>
                        </div>
                    </form>




                    <script type="text/javascript">

                        function checkForm(form)
                        {
                            //
                            // validate form fields
                            //

                            form.myButton.disabled = true;
                            return true;
                        }

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="row">


    <div class="col-xs-3">

        <div class="box">
            <div class="box-header">
                <h5 class="box-title">بین تاریخ‌های زیر می‌توانید مرخصی انتخاب کنید</h5>

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
                    </tr>
                    </thead>
                    <tbody>
                    <?php $Row= 1; ?>
                    @foreach($po as $pos)
                        <tr>

                            <td>{{$Row}}</td><?php $Row ++;?>

                            <td>{{$pos->date}}</td>

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
                    <h3 class="box-title">مرخصی‌های ثبت شده</h3>


                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align:right">ردیف</th>
                            <th style="text-align:right">تاریخ مرخصی</th>
                            <th style="text-align:right">زمان ثبت مرخصی</th>
                            <th style="text-align:right">اولویت</th>
                            <th style="text-align:right">وضعیت</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php $Row= 1; ?>

                        @foreach($offs as $off)
                            <tr>
                                <td>{{$Row}}</td><?php $Row++; ?>
                                <td>{{$off->date}}</td>
                                <td>{{new Verta($off->created_at)}}</td>
                                <td></td>
                                <?php
                                $st= null;
                                if($off->status == null) $st= 'در انتظار تایید';
                                else $st= 'تایید شده'; ?>
                                <td>{{$st}}</td>
                            </tr>

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