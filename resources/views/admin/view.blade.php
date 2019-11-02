@extends('admin.layout')
@section('title','Agent Group Summary Report')
@section('content')
@section('css')
<link href="{{ asset('css/iCheck/all.css')}}">
<link href="{{ asset('css/bootstrap-colorpicker.min.css')}}">
<link href="{{ asset('css/bootstrap-timepicker.min.css')}}">
<link href="{{ asset('css/select2.min.css')}}">

@endsection

@include('admin.selectD&User')
<a href="{{asset('admin/view')}}" style="margin: -530px 600px 0 0" class="btn btn-info btn-xs">فقط گروه</a>




    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Agent Group Summary Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>تاریخ</th>
                                <th>شماره کاربری</th>
                                <th>نام و نام خانوادگی</th>
                                <th>زمان پاسخگویی (دقیقه)</th>
                                <th>استراحت (دقیقه)</th>
                                {{--<th>استراحت (ثانیه)</th>--}}
                                {{--<th>زمان آزاد (AvialTime)</th>--}}
                                <th>زمان آزاد (ثانیه)</th>
                                <th>AHT (ثانیه)</th>
                                {{--<th>Staffed Time</th>--}}
                                <th>Staffed Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $row= 1; $CountmAuxTime = 0;$CountsAvgACDTime=0;$CountmACDTime=0; $Tocc=0; $CountmStaffedTime=0;?>
                            @foreach($viewSum as $v)
                                <tr>
                                    <td>{{$row}}</td><?php $row++?>
                                    <td>{{$v->DATE}}</td>
                                    <td>{{$v->AgentID}}</td>
                                    <td>{{$v->AgentName}}</td>
                                    <?php
                                        $mAvgACDTime= $v->AvgACDTime;
                                        $mAvgACDTime = explode(':',$mAvgACDTime);
                                        $sAvgACDTime= ($mAvgACDTime[0]*60)+($mAvgACDTime[1]*60)+($mAvgACDTime[2]);
                                    ?>
                                    {{--<td style="@if($sAvgACDTime > 120) color: red; @endif">{{$sAvgACDTime}}</td>--}}
                                    <?php $CountsAvgACDTime += $sAvgACDTime;?>
                                    <?php
                                    $mACDTime= $v->ACDTime;
                                    $mACDTime = explode(':',$mACDTime);
                                    $sACDTime= ($mACDTime[0]*60*60)+($mACDTime[1]*60)+($mACDTime[2]);
                                    $mACDTime= ($mACDTime[0]*60)+($mACDTime[1])+($mACDTime[2]/60);
                                    ?>
                                    <td>{{round($mACDTime,3)}}</td>

                                    <?php
                                        $CountmACDTime += $mACDTime;
                                    $mAuxTime= $v->AuxTime;
                                    $mAuxTime = explode(':',$mAuxTime);
                                    $sAuxTime= ($mAuxTime[0]*60*60)+($mAuxTime[1]*60)+($mAuxTime[2]);
                                    $mAuxTime= ($mAuxTime[0]*60)+($mAuxTime[1])+($mAuxTime[2]/60);

                                    ?>
                                    <td style="@if($mAuxTime > 70) color: red; @endif">{{round($mAuxTime, 3)}}</td><?php $CountmAuxTime += $mAuxTime; ?>
                                    {{--<td style="@if($mAuxTime > 70) color: red; @endif">{{$sAuxTime}}</td>--}}
                                    {{--<td>{{$v->AvailTime}}</td>--}}
                                    <?php
                                    $mAvailTime= $v->AvailTime;
                                    $mAvailTime = explode(':',$mAvailTime);

                                    $sAvailTime= ($mAvailTime[0]*60*60)+($mAvailTime[1]*60)+($mAvailTime[2]);
                                    $mAvailTime= ($mAvailTime[0]*60)+($mAvailTime[1])+($mAvailTime[2]/60);
                                    ?>


                                    <td>{{$sAvailTime}}</td>
                                    <?php
                                    $sAHT= $v->AvgHandlingTime;
                                    $sAHT = explode(':',$sAHT);
                                    $sAHT= ($sAHT[0]*60*60)+($sAHT[1]*60)+($sAHT[2]);

                                    ?>
                                    <td>{{$sAHT}}</td>
                                    {{--<td>{{$v->StaffedTime}}</td>--}}
                                    <?php

                                    $mStaffedTime= $v->StaffedTime;
                                    $mStaffedTime = explode(':',$mStaffedTime);
                                    $mStaffedTime= ($mStaffedTime[0]*60)+($mStaffedTime[1])+($mStaffedTime[2]/60);
									$occ= $sACDTime/($sACDTime+ $sAvailTime+ $sAuxTime);
									$Tocc += $occ;

                                    ?>
                                    <td>{{$v->StaffedTime}}</td><?php $CountmStaffedTime += $mStaffedTime; ?>
                                    <td></td>
                                </tr>


                                {{--getAttributeValue()--}}
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>نرخ اشتغال</th>
                                <th></th>
                                <th></th>
                                {{--<th>میانگین طول تماس(کل-ثانیه)</th>--}}
                                <th>میانگین زمان پاسخگویی</th>
                                <th>میانگین میزان استراحت</th>

                                <th></th>
                                <th></th>
                                <th>Avg Staffed Time</th>
                                <th></th>

                            </tr>

                            <tr>
                                <?php
                                    if (count($viewSum)){
                                    $avgAuxTime= $CountmAuxTime/ count($viewSum);
                                    $avgocc= ($Tocc/ count($viewSum));
                                    $avgtotalAvgACDTime= $CountsAvgACDTime/ count($viewSum);
                                    $avgmACDTime= $CountmACDTime / count($viewSum);
                                    $avgmStaffedTime= $CountmStaffedTime / count($viewSum);
									//dd(count($viewSum));

                                }
                                ?>
                                <th>@if(count($viewSum)){{round($avgocc,4)*100}}{{"%"}}@endif</th>

                                <th></th>
                                <th></th>
                                {{--<th>@if(count($viewSum)){{$avgtotalAvgACDTime}}@endif</th>--}}
                                <th>@if(count($viewSum)){{round($avgmACDTime,3)}}@endif</th>
                                <th>@if(count($viewSum)){{round($avgAuxTime,3)}}@endif</th>

                                <th></th>
                                <th></th>
                                <th>@if(count($viewSum)){{round($avgmStaffedTime,3)}}@endif</th>

                            </tr>


                            </tfoot>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection
@section('js')
<link href="{{ asset('css/iCheck/icheck.min.js')}}">
<link href="{{ asset('js/bootstrap-colorpicker.min.js')}}">
<link href="{{ asset('js/bootstrap-timepicker.min.js')}}">
<link href="{{ asset('js/select2.full.min.js')}}">



@endsection
