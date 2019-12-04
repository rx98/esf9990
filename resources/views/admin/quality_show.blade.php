@extends('admin.layout')
@section('title','خطاهای داخلی')
@section('content')

<?php $zoons= \App\zoon::get();?>

    <div class="container" style="max-width: 200px;">
        <div class="form-group" >
                <a href="{{asset('admin/quality_show')}}" style="margin: 1px 6px 0 0" class="btn btn-info btn-xs">فقط گروه</a>
                <div class="form-group">
                        <form>
                            <input type="hidden" name="allzoon" value="1">
                            <button type="submit" style="margin:4px 8px 0 0" class="btn btn-info btn-xs">کل مرکز</button>
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
            <form method="get" action="{{asset('/admin/quality_show')}}">
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


                <div class="col col-xs-12" style="margin-top: 5px">
                    <label for="Communicated"> وضعیت ابلاغ </label>
                    <select name="Communicated" id="Communicated" class="form-control select2" style="width: 100%;margin: 0 -13px 0 0">
                        <option value="1">همه</option>
                        <option value="">خیر</option>
                    </select>
                </div>

                <button type="submit" style="margin-top: 5px" class="btn btn-primary btn-md">نمایش اطلاعات</button>
            </form>

        </div>
    </div>




        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">خطاهای داخلی</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-hover col-xs-12 col-md-12">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>تاریخ تماس</th>
                                <th>تاریخ شنود</th>
                                <th>شماره مشترک</th>
                                <th>شماره کارشناس</th>
                                <th>موضوع تماس</th>
                                <th>I1</th>
                                <th>I2</th>
                                <th>I3</th>
                                <th>I5</th>
                                <th>I6</th>
                                <th>I7</th>
                                <th>I8</th>
                                <th>I9</th>
                                <th>I10</th>
                                <th>I11</th>
                                <th>I12</th>
                                <th>I13</th>
                                <th style="width:90"> توضیحات </th>
                                <th>نوع شنود</th>
                                <th>وضعیت ابلاغ</th>
                                <th>عملیات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $sumI1=0; $sumI2=0; $sumI3=0; $sumI5=0; $sumI6=0; $sumI7=0; $sumI8=0; $sumI9=0; $sumI10=0; $sumI11=0; $sumI12=0; $sumI13=0;$countC = 0; $countNonC= 0;
                                $row=1;$countDoor=0;$countKhamoosh=0;$countMovazi=0;$countOnline=0;

                                ?>
                            @foreach($qaShow as $qa)

                                <tr>
                                    <td>{{$row}}</td><?php $row++ ?>
                                    <td>{{$qa->date}}</td>
                                    <td>{{$qa->datelisten}}</td>
                                    <td>{{$qa->number}}</td>
                                    <td>{{$qa->agent}}</td>
                                    <td>{{$qa->subject}}</td>
                                    <td style="background-color: @if($qa->item1 == 'No')hotpink @endif">{{$qa->item1}}</td><?php if ($qa->item1 == 'No') $sumI1++;  ?>
                                    <td style="background-color: @if($qa->item2 == 'No')hotpink @endif">{{$qa->item2}}</td><?php if ($qa->item2 == 'No') $sumI2++;  ?>
                                    <td style="background-color: @if($qa->item3 == 'No')hotpink @endif">{{$qa->item3}}</td><?php if ($qa->item3 == 'No') $sumI3++;  ?>
                                    <td style="background-color: @if($qa->item5 == 'No')hotpink @endif">{{$qa->item5}}</td><?php if ($qa->item5 == 'No') $sumI5++;  ?>
                                    <td style="background-color: @if($qa->item6 == 'No')hotpink @endif">{{$qa->item6}}</td><?php if ($qa->item6 == 'No') $sumI6++;  ?>
                                    <td style="background-color: @if($qa->item7 == 'No')hotpink @endif">{{$qa->item7}}</td><?php if ($qa->item7 == 'No') $sumI7++;  ?>
                                    <td style="background-color: @if($qa->item8 == 'No')hotpink @endif">{{$qa->item8}}</td><?php if ($qa->item8 == 'No') $sumI8++;  ?>
                                    <td style="background-color: @if($qa->item9 == 'No')hotpink @endif">{{$qa->item9}}</td><?php if ($qa->item9 == 'No') $sumI9++;  ?>
                                    <td style="background-color: @if($qa->item10 == 'No')hotpink @endif">{{$qa->item10}}</td><?php if ($qa->item10 == 'No') $sumI10++;  ?>
                                    <td style="background-color: @if($qa->item11 == 'No')hotpink @endif">{{$qa->item11}}</td><?php if ($qa->item11 == 'No') $sumI11++;  ?>
                                    <td style="background-color: @if($qa->item12 == 'No')hotpink @endif">{{$qa->item12}}</td><?php if ($qa->item12 == 'No') $sumI12++;  ?>
                                    <td style="background-color: @if($qa->item13 == 'No')hotpink @endif">{{$qa->item13}}</td><?php if ($qa->item13 == 'No') $sumI13++;  ?>
                                    <td @if($qa->highlight) style="background-color: yellow; font-weight: bold" @endif>{{$qa->comment}}</td>
                                    <?php if($qa->status ==1) $status= 'خاموش' ; elseif($qa->status ==2) $status= 'موازی'; elseif($qa->status ==3)$status= 'روی خط'; elseif ($qa->status ==null)$status= 'دور';

                                    if ($qa->status ==null) $countDoor ++;elseif ($qa->status ==1) $countKhamoosh++;elseif($qa->status ==2)$countMovazi++; elseif($qa->status ==3) $countOnline++;
                                    ?>
                                    <td>{{$status}}</td>
                                    <td><a href="{{asset('admin/quality_Communicatedـedit?id=')}}{{$qa->id}}" class="btn btn-xs">@if($qa->Communicated)بله @else خیر @endif</a></td>

                                <?php if ($qa->item1== 'No'|| $qa->item2== 'No' || $qa->item7== 'No' || $qa->item8== 'No' || $qa->item11 == 'No'){ $countNonC ++;}
                                          if ($qa->item3== 'No' || $qa->item5== 'No' || $qa->item6== 'No' || $qa->item9== 'No' || $qa->item10== 'No' || $qa->item12== 'No' || $qa->item13 == 'No') {$countC++;}

                                    ?>
                                    <td><a href="{{asset('admin/quality_edit?id=')}}{{$qa->id}}" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a></td>
                                    @if($referesh == null)<td><a onclick="return confirm('برای پاک کردن خاطرجمع هستید؟')" href="{{asset('admin/quality_dell?id=')}}{{$qa->id}}" class="btn btn-danger btn-xs glyphicon glyphicon-trash"></a></td>@endif
                                </tr>


                                {{--getAttributeValue()--}}
                            @endforeach

                            </tbody>
                            {{--{{ $qaShow->links() }}--}}


                        </table></br>
                        <?php $sumNonCritical= $sumI1+$sumI2+$sumI7+$sumI8+$sumI11; $sumCritical= $sumI3+$sumI5+$sumI6+$sumI9+$sumI10+$sumI12+$sumI13;
                        if (count($qaShow)){
                        $avgNonCritical= (count($qaShow) - $countNonC) / count($qaShow) * 100;
                        $avgCritical= (count($qaShow) - $countC) / count($qaShow) * 100;
                        }
                        ?>

                <div style="direction:rtl;text-align:right;" class="col-md-12">
                <span style="direction:rtl;text-align:right;" class="col-md-3">

                </span>

                <span style="direction:rtl;text-align:right;" class="col-md-3">
                    <h5>تعداد تماس‌های شنود شده دور: <span style="font-weight: bolder">{{$countDoor}}</span></h5>
                    <h5>تعداد تماس‌های شنود شده خاموش: <span style="font-weight: bolder">{{$countKhamoosh}}</span></h5>
                    <h5>تعداد تماس‌های شنود شده موازی: <span style="font-weight: bolder">{{$countMovazi}}</span></h5>
                    <h5>تعداد تماس‌های شنود شده روی خط: <span style="font-weight: bolder">{{$countOnline}}</span></h5>

                </span>

                    <span class="col-md-3"><h5>تعداد تماس‌های شنود شده: <span style="font-weight: bolder">{{count($qaShow)}}</span></h5>
                        <h5>تعداد تماس‌های دارای خطای بحرانی: <span style="font-weight: bolder">{{$countC}}</span></h5>
                        <h5>تعداد تماس‌های دارای خطای غیربحرانی : <span style="font-weight: bolder">{{$countNonC}}</span></h5></span>
                    <span class="col-md-3"><h5>جمع خطاهای بحرانی: <span style="font-weight: bolder">{{$sumCritical}}</span></h5>
                        <h5>میانگین خطاهای بحرانی: <span style="font-weight: bolder">@if(count($qaShow)){{'%'}}{{round($avgCritical, 0)}} @endif </span>
                            @if(count($qaShow))<span style="color:white;font-size: larger;background-color:@if($avgCritical >=95) #00ae52
                            @elseif($avgCritical >=90 && $avgCritical <95) #94ce52
                            @elseif($avgCritical >=85 && $avgCritical <90) #19395a
                            @elseif($avgCritical >=80 && $avgCritical <85) #94b2d6
                            @elseif($avgCritical >=75 && $avgCritical <80) #215963
                            @elseif($avgCritical >=70 && $avgCritical <75) #94cade
                            @elseif($avgCritical >=65 && $avgCritical <70) #d69694
                            @elseif($avgCritical <75) #ff0000 @endif ">@if($avgCritical >=95) A+
                                @elseif($avgCritical >=90 && $avgCritical <95) A
                                @elseif($avgCritical >=85 && $avgCritical <90) B+
                                @elseif($avgCritical >=80 && $avgCritical <85) B
                                @elseif($avgCritical >=75 && $avgCritical <80) C+
                                @elseif($avgCritical >=70 && $avgCritical <75) C
                                @elseif($avgCritical >=65 && $avgCritical <70) U+
                                @elseif($avgCritical <65) U @endif</span>@endif
                        </h5>

                    <h5>جمع خطاهای غیربحرانی: <span style="font-weight: bolder">{{$sumNonCritical}}</span></h5> <span></span>
                    <h5>میانگین خطاهای غیربحرانی: <span style="font-weight: bolder">@if(count($qaShow)){{'%'}}{{round($avgNonCritical, 0)}} @endif</span>
                        @if(count($qaShow))<span style="color:white;font-size: larger;background-color:@if($avgNonCritical >=95) #00ae52
                        @elseif($avgNonCritical >=90 && $avgNonCritical <95) #94ce52
                        @elseif($avgNonCritical >=85 && $avgNonCritical <90) #19395a
                        @elseif($avgNonCritical >=80 && $avgNonCritical <85) #94b2d6
                        @elseif($avgNonCritical >=75 && $avgNonCritical <80) #215963
                        @elseif($avgNonCritical >=70 && $avgNonCritical <75) #94cade
                        @elseif($avgNonCritical >=65 && $avgNonCritical <70) #d69694
                        @elseif($avgNonCritical <75) #ff0000 @endif ">@if($avgNonCritical >=95) A+
                            @elseif($avgNonCritical >=90 && $avgNonCritical <95) A
                            @elseif($avgNonCritical >=85 && $avgNonCritical <90) B+
                            @elseif($avgNonCritical >=80 && $avgNonCritical <85) B
                            @elseif($avgNonCritical >=75 && $avgNonCritical <80) C+
                            @elseif($avgNonCritical >=70 && $avgNonCritical <75) C
                            @elseif($avgNonCritical >=65 && $avgNonCritical <70) U+
                            @elseif($avgNonCritical <65) U @endif</span>@endif
                    </h5></span>
                    <hr/>
                    <span class="col-md-1">
                        <h5> جمع آیتم ۱۳: <span style="font-weight: bolder">{{$sumI13}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۱۲: <span style="font-weight: bolder">{{$sumI12}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۱۱: <span style="font-weight: bolder">{{$sumI11}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۱۰: <span style="font-weight: bolder">{{$sumI10}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۹: <span style="font-weight: bolder">{{$sumI9}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۸: <span style="font-weight: bolder">{{$sumI8}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۷: <span style="font-weight: bolder">{{$sumI7}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۶: <span style="font-weight: bolder">{{$sumI6}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۵: <span style="font-weight: bolder">{{$sumI5}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۳: <span style="font-weight: bolder">{{$sumI3}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۲: <span style="font-weight: bolder">{{$sumI2}}</span></h5>
                    </span>

                    <span class="col-md-1">
                        <h5> جمع آیتم ۱: <span style="font-weight: bolder">{{$sumI1}}</span></h5>
                    </span>
                </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            <!-- /.col -->
        <!-- /.row -->
        </div>
        </div>
        </div>
    <!-- /.content -->

@endsection
