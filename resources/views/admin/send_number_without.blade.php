<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ارسال شماره</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />

<!-- Styles

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body>
<br>
<br>
<div style="font-size:18px" class="container">
    <div class=" row justify-content-center">
        <div style="direction: rtl; width:100%" class="col-md-9">
            <div class="card">
                <div style="text-align:center" class="card-header-tabs">{{'ارسال نمونه شماره به سوپروایزر'}}</div>
                </br>


                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form method="POST" action="{{asset('admin/sendno')}}" onsubmit="return checkForm(this);">
                        @csrf

                        {{-- <input id="user_id" type="hidden" value="1" name="user_id"> --}}

                        <div class="form-group row">
                            <label for="agent" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-9">
                                <input style="width:250px; height:35px" id="agent" type="text" class="form-control" name="agent" placeholder="کد کارشناس" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-9">
                                <input style="width:250px; height:35px" id="number" type="number" class="form-control" placeholder="شماره مشترک" name="number" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-9">
                                <textarea rows="7" cols="20" id="comment" type="text" class="form-control" placeholder="شرح مشکل" name="comment" required autofocus></textarea>

                            </div>
                        </div>
                        <br>


                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-4">


                                <button name="myButton" type="submit" class="btn btn-success btn-lg">
                                    {{ __('ارسال') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    <script type="text/javascript">

                          function checkForm(form)
                          {
                            //
                            // validate form fields
                            //

                            form.myButton.disabled = true;
                            return true;
                          }

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
<script src="{{asset('js/admin.js')}}"></script>


</html>
