@extends('admin.layout')
@section('title','PSM')
@section('content')
<?php $zoons= \App\zoon::get();?>

<div style="margin-top: 30px; clear: both;"></div>
<div style="margin-top: 30px; clear: both;"></div>
<div class="container" style="max-width: 200px;">
    <div class="form-group" >
            <a href="{{asset('admin/psm')}}" style="margin: 1px 1px 5px 0" class="btn btn-info btn-xs">فقط گروه</a>

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
            <form method="get" action="{{asset('/admin/psm')}}">
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
                        <h3 class="box-title">PSM</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>تاریخ</th>
                                <th>شماره کاربری</th>
                                <th>امتیاز</th>
                                <th>برچسب امتیاز</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $CounttotalScore = 0; //dd($viewPsm);?>
                            @foreach($viewPsm as $v)

                                <tr>
                                    <td>{{$v->date}}</td>
                                    <td>{{$v->agentid}}</td>
                                    <td>{{$v->totalScore}}</td>
                                    <td style=" color:white; background-color:@if($v->totalScore >=95) #00b050
                                    @elseif($v->totalScore >=90 && $v->totalScore <95) #33cc33
                                    @elseif($v->totalScore >=85 && $v->totalScore <90) #99ff33
                                    @elseif($v->totalScore >=80 && $v->totalScore <85) #ffff00
                                    @elseif($v->totalScore >=75 && $v->totalScore <80) #ff9900
                                    @elseif($v->totalScore <75) #ff0000
                                    @endif " >{{$v->label}} <?php $CounttotalScore += $v->totalScore?>
                                    </td>
                                    <td></td>


                                </tr>


                                {{--getAttributeValue()--}}
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>

                                <th></th>
                                <th></th>
                                <th>جمع امتیاز</th>
                                <th>برچسب امتیاز(کل)</th>
                                <th></th>

                            </tr>

                            <tr>
                                <?php
                                if (count($viewPsm)){
                                    $avgttotalScore= $CounttotalScore/ count($viewPsm);
                                }else{
									$avgttotalScore = null;
								}
                                ?>
                                <th></th>
                                <th></th>
								@if($viewPsm)
                                <th>{{round($avgttotalScore,3)}}</th>
                                <th style="color:white;background-color:@if($avgttotalScore >=95) #00b050
                                @elseif($avgttotalScore>=90 && $avgttotalScore<95) #33cc33
                                @elseif($avgttotalScore >=85 && $avgttotalScore <90) #99ff33
                                @elseif($avgttotalScore >=80 && $avgttotalScore <85) #ffff00
                                @elseif($avgttotalScore >=75 && $avgttotalScore <80) #ff9900
                                @elseif($avgttotalScore <75) #ff0000 @endif ">@if($avgttotalScore >=95) A+
                                    @elseif($avgttotalScore>=90 && $avgttotalScore<95) A
                                    @elseif($avgttotalScore >=85 && $avgttotalScore <90) B+
                                    @elseif($avgttotalScore >=80 && $avgttotalScore <85) B
                                    @elseif($avgttotalScore >=75 && $avgttotalScore <80) C
                                    @elseif($avgttotalScore <75) U
                                    @endif </th>@endif
                                <th></th>


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
