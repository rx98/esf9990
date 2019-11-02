@extends('admin.layout')
@section('title','کیفی تهران')
@section('content')

    <div style="margin-top: 30px; clear: both;"></div>
    <div class="container" style="max-width: 200px;">
        <div class="form-group" >
            <form method="get" action="{{asset('/admin/quality_teh')}}">
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
                        <h3 class="box-title">کیفی تهران</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>شماره کاربری</th>
                                <th>شماره مشترک</th>
                                <th>زمان</th>
                                <th>خطای بحرانی</th>
                                <th>خطای غیربحرانی</th>
                                <th>آیتم ۱</th>
                                <th>آیتم ۲</th>
                                <th>آیتم ۳</th>
                                <th>آیتم ۵</th>
                                <th>آیتم ۶</th>
                                <th>آیتم ۷</th>
                                <th>آیتم ۸</th>
                                <th>آیتم ۹</th>
                                <th>آیتم ۱۰</th>
                                <th>آیتم ۱۱</th>
                                <th>آیتم ۱۲</th>
                                <th>آیتم ۱۳</th>
                                <th>Bag</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $countCritical = 0; $countNonCritical= 0;?>
                            @foreach($viewQaTeh as $vteh)

                                <tr>
                                    <td>{{$vteh->AgentId}}</td>
                                    <td>{{$vteh->IDnumber}}</td>
                                    <td>{{$vteh->Time}}</td>
                                    <td>{{$vteh->Critical*100}}</td> <?php $countCritical += $vteh->Critical*100 ?>
                                    <td>{{$vteh->NonCritical*100}}</td> <?php $countNonCritical += $vteh->NonCritical*100 ?>
                                    <td style="background-color:@if($vteh->Item1 =='No') hotpink @endif">{{$vteh->Item1}}</td>
                                    <td style="background-color:@if($vteh->Item2 =='No') hotpink @endif">{{$vteh->Item2}}</td>
                                    <td style="background-color:@if($vteh->Item3 =='No') hotpink @endif">{{$vteh->Item3}}</td>
                                    <td style="background-color:@if($vteh->Item5 =='No') hotpink @endif">{{$vteh->Item5}}</td>
                                    <td style="background-color:@if($vteh->Item6 =='No') hotpink @endif">{{$vteh->Item6}}</td>
                                    <td style="background-color:@if($vteh->Item7 =='No') hotpink @endif">{{$vteh->Item7}}</td>
                                    <td style="background-color:@if($vteh->Item8 =='No') hotpink @endif">{{$vteh->Item8}}</td>
                                    <td style="background-color:@if($vteh->Item9 =='No') hotpink @endif">{{$vteh->Item9}}</td>
                                    <td style="background-color:@if($vteh->Item10 =='No') hotpink @endif">{{$vteh->Item10}}</td>
                                    <td style="background-color:@if($vteh->Item11 =='No') hotpink @endif">{{$vteh->Item11}}</td>
                                    <td style="background-color:@if($vteh->Item12 =='No') hotpink @endif">{{$vteh->Item12}}</td>
                                    <td style="background-color:@if($vteh->Item13 =='No') hotpink @endif">{{$vteh->Item13}}</td>
                                    <td>{{$vteh->Bag}}</td>
                                    <td></td>
                                    <td></td>

                                </tr>


                                {{--getAttributeValue()--}}
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>میانگین خطاهای بحرانی</th>
                                <th>میانگین خطاهای غیربحرانی</th>


                            </tr>
                            <?php
                                    $avgcountCritical= null; $avgcountNonCritical= null;
                                    if (count($viewQaTeh)){

                                        $avgcountCritical= round($countCritical/count($viewQaTeh),3);
                                        $avgcountNonCritical= round($countNonCritical/count($viewQaTeh),3);
                                    }


                            ?>

                            <tr>

                                <th></th>
                                <th></th>
                                <th></th>
                                <th>@if(count($viewQaTeh)){{$avgcountCritical}} @endif</th>
                                <th>@if(count($viewQaTeh)){{$avgcountNonCritical}} @endif</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>

                            <tr>

                                <th></th>
                                <th></th>
                                <th></th>


                                <th style="color:white;background-color:@if($avgcountCritical >=95) #00ae52
                                @elseif($avgcountCritical >=90 && $avgcountCritical <95) #94ce52
                                @elseif($avgcountCritical >=85 && $avgcountCritical <90) #19395a
                                @elseif($avgcountCritical >=80 && $avgcountCritical <85) #94b2d6
                                @elseif($avgcountCritical >=75 && $avgcountCritical <80) #215963
                                @elseif($avgcountCritical >=70 && $avgcountCritical <75) #94cade
                                @elseif($avgcountCritical >=65 && $avgcountCritical <70) #d69694
                                @elseif($avgcountCritical <75) #ff0000 @endif ">@if($avgcountCritical >=95) A+
                                    @elseif($avgcountCritical >=90 && $avgcountCritical <95) A
                                    @elseif($avgcountCritical >=85 && $avgcountCritical <90) B+
                                    @elseif($avgcountCritical >=80 && $avgcountCritical <85) B
                                    @elseif($avgcountCritical >=75 && $avgcountCritical <80) C+
                                    @elseif($avgcountCritical >=70 && $avgcountCritical <75) C
                                    @elseif($avgcountCritical >=65 && $avgcountCritical <70) U+
                                    @elseif($avgcountCritical <65) U @endif </th>

                                <th style="color:white;background-color:@if($avgcountNonCritical >=95) #00ae52
                                @elseif($avgcountNonCritical >=90 && $avgcountNonCritical <95) #94ce52
                                @elseif($avgcountNonCritical >=85 && $avgcountNonCritical <90) #19395a
                                @elseif($avgcountNonCritical >=80 && $avgcountNonCritical <85) #94b2d6
                                @elseif($avgcountNonCritical >=75 && $avgcountNonCritical <80) #215963
                                @elseif($avgcountNonCritical >=70 && $avgcountNonCritical <75) #94cade
                                @elseif($avgcountNonCritical >=65 && $avgcountNonCritical <70) #d69694
                                @elseif($avgcountNonCritical <75) #ff0000 @endif ">@if($avgcountNonCritical >=95) A+
                                    @elseif($avgcountNonCritical >=90 && $avgcountNonCritical <95) A
                                    @elseif($avgcountNonCritical >=85 && $avgcountNonCritical <90) B+
                                    @elseif($avgcountNonCritical >=80 && $avgcountNonCritical <85) B
                                    @elseif($avgcountNonCritical >=75 && $avgcountNonCritical <80) C+
                                    @elseif($avgcountNonCritical >=70 && $avgcountNonCritical <75) C
                                    @elseif($avgcountNonCritical >=65 && $avgcountNonCritical <70) U+
                                    @elseif($avgcountNonCritical <65) U @endif </th>






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