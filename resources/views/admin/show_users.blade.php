@extends('admin.layout')
@section('title','نمایش کاربرها')
@section('content')
   
	@include('error')
        <div class="box-body table-responsive">
                <form method="get" action="{{asset('/admin/show_users')}}">
                    <div style="margin-top: 10px">
                        <label for="number">نام و نام خانوادگی</label>
                        <input value="{{$_GET['name'] ?? ''}}" type="text" id="name" name="name" placeholder="جستجو">

                        <span>
                                <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-search"></i></button>
                            </span>

                        <a href="{{asset('/admin/show_users')}}" type="submit" class="btn btn-default btn-xs"><i class="fa fa-close"></i></a>

                    </div>
                </form>

                    <table id="gent" class="table table-bordered table-striped box-footer clearfix ">
                        <thead>
                        <tr>
                            <th style="direction:rtl;text-align:right;">تصویر</th>
                            <th style="direction:rtl;text-align:right;">نام و نام خانوادگی</th>
                            <th style="direction:rtl;text-align:right;">نام کاربری</th>
                            <th style="direction:rtl;text-align:right;">کد کاربری</th>
                            <th style="direction:rtl;text-align:right;">جنسیت</th>
                            <th style="direction:rtl;text-align:right;">تحصیلات</th>
                            <th style="direction:rtl;text-align:right;">نام مرکز</th>
                            <th style="direction:rtl;text-align:right;">گروه</th>
                            <th style="direction:rtl;text-align:right;">عملیات</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($show_user as $sU)
                            <tr>
                                <td><img STYLE="width: 15%; height: auto" src="{{asset($sU->image)}}"></td>
                                <td>{{$sU->name}}</td>
                                <td>{{$sU->email}}</td>
                                <td>{{$sU->agent}}</td>
                                <td> @if($sU->sex == 1)مرد @else زن @endif </td>
                                <td>{{$sU->grade}}</td>
                                <td>{{$sU->zoon}}</td>
                                <td style="color:@if($sU->group) blue @else magenta @endif">{{$sU->group ?? $sU->position}}</td>
                                <td>

                                    <a @if(Auth::user()->privilege == 1 || Auth::user()->group === $sU->group || Auth::user()->group === $sU->position || Auth::user()->privilege == 5) href="{{asset('admin/edit_users?id=')}}{{$sU->id}}" class="btn btn-warning btn-xs glyphicon glyphicon-edit" @endif></a>
                                    <a @if(Auth::user()->privilege == 1 || Auth::user()->group === $sU->group || Auth::user()->group === $sU->position || Auth::user()->privilege == 5) onclick="return confirm('برای پاک کردن خاطرجمع هستید؟')" href="{{asset('admin/dell_users?id=')}}{{$sU->id}}" class="btn btn-danger btn-xs glyphicon glyphicon-trash" @endif></a>

                                </td>

                            </tr>

                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>

                        </tr>
                        </tfoot>

                    </table>
{{$show_user->appends($_GET)->links()}}
        </div>





@endsection
