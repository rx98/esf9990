@extends('admin.layout')
@section('title','نمایش کارشناس‌ها')
@section('content')
        <div class="box-body table-responsive">

                    <table id="gent" class="table table-bordered table-striped box-footer clearfix ">
                        <thead>
                        <tr>
                            <th style="direction:rtl;text-align:right;">شماره کاربری</th>
                            <th style="direction:rtl;text-align:right;">نام و نام خانوادگی</th>
                            <th style="direction:rtl;text-align:right;"><a href="{{asset('admin/show_agents?chagent=all')}}" class="btn btn-success btn-xs glyphicon glyphicon-check"></a> همه <a href="{{asset('admin/show_agents?chagent=emp')}}" class="btn btn-danger btn-xs glyphicon glyphicon-remove"></a>
                                {{-- <a  href="{{asset('admin/show_agents')}}">گروه</a>|
                                <a  href="{{asset('admin/show_agents?grp=1')}}">همه</a> --}}

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($agent as $ag)
                            <tr>
                                <td>{{$ag->agent}}</td>
                                <td>{{$ag->name}}</td>
                                <td>

                                    <a style="margin-left: 2px" href="{{asset('admin/show_agents?chagent=')}}{{$ag->agent}}" class="@if($ag->status== true) btn btn-success btn-xs glyphicon glyphicon-check @else btn btn-danger btn-xs glyphicon glyphicon-remove @endif"></a>
                                    <a href="{{asset('admin/edit_agents?agent=')}}{{$ag->agent}}" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
                                    <a onclick="return confirm('برای پاک کردن خاطرجمع هستید؟')" href="{{asset('admin/dell_agents?agent=')}}{{$ag->agent}}" class="btn btn-danger btn-xs glyphicon glyphicon-trash"></a>


                                </td>

                            </tr>

                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>

                        </tr>
                        </tfoot>

                    </table>

        </div>





@endsection
