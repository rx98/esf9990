<div style="margin-top: 30px; clear: both;"></div>
    <div class="container" style="max-width: 200px;">
        <div class="form-group" >

                    @if(Auth::user()->privilege ==5)
                    <div class="form-group">انتخاب مرکز
                        <form>
                            <select name="zoons" class="form-control select2" data-placeholder="انتخاب مرکز" style="width: 100%;">
                                    <option value="">انتخاب کنید</option>
                                    <option value="تهران">تهران</option>
                                    <option value="اصفهان">اصفهان</option>
                                    <option value="تبریز">تبریز</option>
                                    <option value="مشهد">مشهد</option>
                                    <option value="اهواز">اهواز</option>
                                    <option value="شیراز">شیراز</option>
                                    <option value="اراک">اراک</option>
                            </select>
                            <button type="submit" style="margin-top: 5px" class="btn btn-info btn-xs">انتخاب مرکز</button>

                        </form>
                </div> @endif
            <form method="get" action="{{asset('/admin/view')}}">
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
                            <option value="">انتخاب کنید</option>
                            @foreach ($users as $agts)
                                <option value="{{$agts->agent}}">{{$agts->name.'-'.$agts->agent}}</option>
                            @endforeach
                        </select>
                </div>


                <button type="submit" style="margin-top: 5px" class="btn btn-primary btn-xs">نمایش اطلاعات</button>
            </form>
            <div class="form-group">
                    <form>
                        <input type="hidden" name="allzoon" value="1">
                        <button type="submit" style="margin:-460px 80px 0 0" class="btn btn-info btn-xs">کل مرکز</button>
                    </form>
                </div>
        </div>
    </div>
