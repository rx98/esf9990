@extends('admin.layout')
@section('title','ارسال فایل اکسل به دیتابیس')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Agent Group Summary Report</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{asset('/admin/import')}}" role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="Agent_Group_Summary_Report"> </label>
                    <input type="file" name="file" id="Agent_Group_Summary_Report">


                    <p class="help-block">۱- حدف عنوان فایل در بالای صفحه</p>
                    <p class="help-block">۲- حدف سطر TOTAL در پایین صفحه </p>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" id="Agent_Group_Summary_ReportB" class="btn btn-primary">ارسال</button>
            </div>

        </form>


        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Agent Group Proformance Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{asset('/admin/import2')}}" role="form" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="Agent_Group_Proformance_Report"> </label>
                        <input type="file" name="file2" id="Agent_Group_Proformance_Report">


                        {{--<p class="help-block">متن راهنما</p>--}}
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>


    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Agent Performance Report</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{asset('/admin/import3')}}" role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="Agent_Performance_Report"> </label>
                    <input type="file" name="file3" id="Agent_Performance_Report">


                    {{--<p class="help-block">متن راهنما</p>--}}
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
        </form>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">PSM</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{asset('/admin/import4')}}" role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="PSM"> </label>
                    <input type="file" name="file4" id="PSM">


                    <p class="help-block">فقط data</p>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
        </form>
    </div>

    <hr>
    <hr>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quality</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{asset('/admin/import5')}}" role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="Quality"> </label>
                    <input type="file" name="file5" id="Quality">


                    <p class="help-block">فقط sheet1</p>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
        </form>
    </div>

@endsection

