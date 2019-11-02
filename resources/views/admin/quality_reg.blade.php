@extends('admin.layout')
@section('title','ثبت خطای داخلی')
@section('content')
    <div class="col-md-6">



    </div>

    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">فرم ثبت خطای داخلی</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            $date= \Facades\Verta::today()->format('Y/m/d');
            $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
            $latin_num = range(0, 9);
            $date= str_replace($latin_num, $persian_num, $date);

            ?>
            <form role="form" method="post" action="{{asset('admin/quality_reg')}}">
                {{csrf_field()}}
                <div class="box-body">
                    <span class="col col-xs-4" style="margin-top: -20px">
                        <label for="agent"></label>
                        <input type="number" class="form-control" name="agent" value="{{old('agent')}}" id="agent" placeholder="کد کارشناس" required autofocus>

                        <input type="text" class="form-control" name="number" id="number" placeholder="شماره مشترک" required autofocus>
                    </span>

                    <span class="col col-xs-4"> تاریخ شنود
                       <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#exampleInput4">
                    <span class="fa fa-calculator"></span>
                </div>
                <input type="text" name="datelisten" class="form-control" value="{{$date}}" id="exampleInput4" placeholder="تاریخ شنود" data-mddatetimepicker="true" data-placement="right" data-englishnumber="true" required autofocus />
                    </span>

                    <span class="col col-xs-4"> تاریخ تماس
                        <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#exampleInput3">
                    <span class="fa fa-calculator"></span>
                </div>
                <input type="text" name="date" class="form-control" id="exampleInput3" value="{{old('date')}}" placeholder=" تاریخ تماس" data-mddatetimepicker="true" data-placement="right" data-englishnumber="true" required autofocus />

                    </span>

                    <div class="col col-xs-12"style="margin: 15px 0px 5px 0px">
                        <label>نوع شنود: </label>
                        <label>
                            <input type="radio" name="status" checked value="">
                            دور
                        </label>
                        <label>
                            <input type="radio" name="status" value="1">
                            خاموش
                        </label>
                        <label>
                            <input type="radio" name="status" value="2">
                            موازی
                        </label>
                        <label>
                            <input type="radio" name="status" value="3">
                            روی خط
                        </label>
                    </div>


                    <div class="col col-xs-12"style="margin-bottom: 30px">
                        <label for="subject"></label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع تماس" required autofocus>
                    </div>



                    <span class="col col-xs-2">
                        <label for="item1"> آیتم۱ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item1" id="item1" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item2"> آیتم۲ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item2" id="item2" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item3"> آیتم۳ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item3" id="item3" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item5"> آیتم۵ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item5" id="item5" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item6"> آیتم۶ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item6" id="item6" class="form-control select2" style="width: 100%;">
                            <option value="Yes">Yes</option>
                            <option selected="selected" value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item7"> آیتم۷ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item7" id="item7" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item8"> آیتم۸ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item8" id="item8" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item9"> آیتم۹ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item9" id="item9" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item10"> آیتم۱۰ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item10" id="item10" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item11"> آیتم۱۱ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item11" id="item11" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item12"> آیتم۱۲ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item12" id="item12" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>

                    <span class="col col-xs-2">
                        <label for="item13"> آیتم۱۳ </label>
                        <select onchange= "if(this.value ==='No') {this.style.color='red'} else {this.style.color='black'}" name="item13" id="item13" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Yes">Yes</option>
                            <option value="N/A">N/A</option>
                            <option value="No" style="color: red;">No</option>
                        </select>
                    </span>
                    </br>

                    <span class="col col-xs-12">
                        <label for="highlight"> توضیحات برجسته باشد</label>

                        <input id="highlight" type="checkbox" name="highlight" value="1">
                        <textarea rows="6"  name="comment" id="comment" class="form-control select2" style="width: 100%;">کامل</textarea>

                    </span>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
                </form>




@endsection
