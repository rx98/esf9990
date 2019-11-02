@extends('admin.layout')
@section('title','Agent Performance Report')
@section('content')
@include('admin.selectD&User')
<a href="{{asset('admin/view2')}}" style="margin: -530px 600px 0 0" class="btn btn-info btn-xs">فقط گروه</a>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Agent Performance Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>شماره کاربری</th>
                                <th>نام و نام خانوادگی</th>
                                <th> تاریخ </th>
                                <th>تعداد تماس بالای ۱۰ ثانیه</th>
                                <th>میانگین طول تماس (ثانیه)</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $CountofAnswredCallsWithTalkTimeGrThanTenSecond = 0;
                            $CountAvgTalkDuration= 0;
                            ?>

                            <?php $row= 1?>

                            @foreach($viewPer as $v)

                                <tr>
                                    <td>{{$row}}</td><?php $row++?>
                                    <td>{{$v->AgentID}}</td>
                                    <td>{{$v->AgentName}}</td>
                                    <td>{{$v->Date}}</td>
                                    <td style="@if($v->CountofAnswredCallsWithTalkTimeGrThanTenSecond <160) color: red; @endif">{{$v->CountofAnswredCallsWithTalkTimeGrThanTenSecond}}</td>
                                    <?php
                                    $mAvgTalkDuration = $v->AvgTalkDuration;
                                    $mAvgTalkDuration = explode(':',$mAvgTalkDuration);
                                    $sAvgTalkDuration =($mAvgTalkDuration[0]*60*60)+($mAvgTalkDuration[1]*60)+($mAvgTalkDuration[2]);
                                    $mAvgTalkDuration = ($mAvgTalkDuration[0]*60)+($mAvgTalkDuration[1])+($mAvgTalkDuration[2]/60);
                                    ?>
                                    <td style="@if($sAvgTalkDuration>120) color: magenta; @endif">{{$sAvgTalkDuration}}</td>
                                    <td></td>

                                </tr>
                                <?php

                                $CountofAnswredCallsWithTalkTimeGrThanTenSecond += $v->CountofAnswredCallsWithTalkTimeGrThanTenSecond;
                                $CountAvgTalkDuration += $sAvgTalkDuration; ?>

                                {{--getAttributeValue()--}}
                            @endforeach

                            </tbody>
                            <tfoot>

                            <tr>


                                <th></th>

                                <td></td>
                                <td></td>
                                <th>جمع تعداد تماس بالای ۱۰ ثانیه</th>
                                <th>میانگین طول تماس (کل)</th>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>

                            <?php
                                    if (count($viewPer)){

                                    $avgten= $CountofAnswredCallsWithTalkTimeGrThanTenSecond/ count($viewPer);
                                    $avgtalk= $CountAvgTalkDuration/ count($viewPer);
                                    }
                                ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th style="font-weight: bold">{{$CountofAnswredCallsWithTalkTimeGrThanTenSecond}}</th>
                                <th style="font-weight: bold">@if(count($viewPer)){{round($avgtalk,3)}}@endif</th>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>میانگین تعداد تماس بالای ۱۰ ثانیه</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="font-weight: bold">@if(count($viewPer)){{round($avgten,3)}}@endif</th>
                                <th style="font-weight: bold"></th>
                                <th style="font-weight: bold"></th>
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
