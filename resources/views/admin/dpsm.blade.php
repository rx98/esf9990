@extends('admin.layout')
@section('title','Daily PSM')
@section('content')

    <div style="margin-top: 30px; clear: both;"></div>
    <div class="container" style="max-width: 200px;">
        <div class="form-group" >
            <form method="get" action="{{asset('/admin/dpsm')}}">
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
                <button type="submit" style="margin-top: 5px" class="btn btn-primary btn-xs">نمایش اطلاعات</button>
            </form>
        </div>
    </div>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daily PSM</h3>
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
                            @foreach($viewdSum as $vSum)
                                <tr>
                                    <?php //dd($viewdPer, $viewdSum); ?>

                                    <td>{{$vSum->DATE}}</td>
                                    <td></td>


                                </tr>


                            @endforeach


                            </tbody>
                            <tfoot>


                            </tfoot>
                        </table>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>تاریخ</th>
                                <th>شماره کاربری</th>
                                <th>تعداد تماس</th>
                                <th>امتیاز تعداد تماس</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($viewdPer as $vPer)

                                <tr>
                                    <td>{{$vPer->Date}}</td>
                                    <td>{{$vPer->AgentID}}</td>
                                    <td>{{$vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond}}</td>
                                    <?php if ($vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond <50){
                                        $ansScore= 0.35*($vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond /150)*($vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond/50);
                                    }elseif ($vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond > 50 && $vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond <150){
                                        $ansScore= 0.35*($vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond /150);
                                    }elseif ($vPer->CountofAnswredCallsWithTalkTimeGrThanTenSecond >= 150){
                                        $ansScore= 0.35;
                                    }
                                    ?>
                                    <td>{{round($ansScore, 3)}}</td>





                                </tr>
                            @endforeach




                            </tbody>
                            <tfoot>


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