@extends('admin.layout')
@section('title','PSM')
@section('content')

@include('admin.selectD&User')
<a href="{{asset('admin/psm')}}" style="margin: -530px 600px 0 0" class="btn btn-info btn-xs">فقط گروه</a>

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
