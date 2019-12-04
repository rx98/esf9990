@extends('admin.layout')
@section('title','Agent Performance Report')
@section('content')
<?php $zoons= \App\zoon::get();?>
<div style="margin-top: 30px; clear: both;"></div>
    <div class="container" style="max-width: 200px;">
        <div class="form-group" >
                <a href="{{asset('admin/view2')}}" style="margin: 1px 1px 5px 0" class="btn btn-info btn-xs">فقط گروه</a>

                <div class="form-group">
                        <form>
                            <input type="hidden" name="allzoon" value="1">
                            <button type="submit" style="margin:1px 1px 0 0" class="btn btn-info btn-xs">کل مرکز</button>
                        </form>
                </div>

                    @if(Auth::user()->privilege ==5)
                    <div class="form-group">
                        <form>
                            <select name="zoons" class="form-control">
                                <option value="">انتخاب مرکز</option>
                                @foreach ($zoons as $zoon)
                                <option value="{{$zoon->name}}">{{$zoon->name}}</option>
                                @endforeach
                            </select>
                        <button type="submit" style="margin-top: 5px" class="btn btn-info btn-xs">انتخاب مرکز</button>

                        </form>
                </div> @endif
            <form method="get" action="{{asset('/admin/view2')}}">
                {{--{{csrf_field()}}--}}
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


                <div class="form-group">
                        <select name="agent[]" class="form-control select2" multiple="multiple" data-placeholder="انتخاب کارشناس" style="width: 100%;">
                            @foreach ($users as $agts)
                                <option value="{{$agts->agent}}">{{$agts->name.'-'.$agts->agent}}</option>
                            @endforeach
                        </select>
                </div>


                <button type="submit" style="margin-top: 5px" class="btn btn-primary btn-xs">نمایش اطلاعات</button>
            </form>

        </div>
    </div>

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
