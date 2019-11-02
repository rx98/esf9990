@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ثبت نام') }}</div>
                @include('error')

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام و نام‌خانوادگی') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('(نام کاربری) email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('جنسیت') }}</label>

                            <div class="col-md-6">
                                <select id="sex" type="checkbox" class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" name="sex" value="{{ old('sex') }}" required>
                                    <option selected value="1">مرد</option>
                                    <option value="">زن</option>
                                </select>
                                @if ($errors->has('sex'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('تحصیلات') }}</label>

                            <div class="col-md-6">
                                <select id="grade" type="checkbox" class="form-control{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" value="{{ old('grade') }}" required>
                                    <option value="دیپلم">دیپلم</option>
                                    <option value="فوق‌دیپلم">فوق‌دیپلم</option>
                                    <option selected value="لیسانس">لیسانس</option>
                                    <option value="فوق‌لیسانس">فوق‌لیسانس</option>
                                    <option value="دکتری">دکتری</option>
                                </select>
                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                @endif
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="zoon" class="col-md-4 col-form-label text-md-right">{{ __('منطقه') }}</label>
                            <div class="col-md-6">
                                <select id="zoon" type="checkbox" class="form-control{{ $errors->has('zoon') ? ' is-invalid' : '' }}" name="zoon" required>
                                    <option value="MCI">MCI</option>
                                    <option selected value="تهران">تهران</option>
                                    <option value="اصفهان">اصفهان</option>
                                    <option value="تبریز">تبریز</option>
                                    <option value="مشهد">مشهد</option>
                                    <option value="اهواز">اهواز</option>
                                    <option value="شیراز">شیراز</option>
                                    <option value="اراک">اراک</option>
                                </select>
                                @if ($errors->has('zoon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zoon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agent" class="col-md-4 col-form-label text-md-right">{{ __('کد کارشناس') }}</label>

                            <div class="col-md-6">
                                <input id="agent" type="number" class="form-control{{ $errors->has('agent') ? ' is-invalid' : '' }}" name="agent" value="{{ old('agent') }}" required>

                                @if ($errors->has('agent'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('agent') }}</strong>
                                    </span>
                                @endif
                                </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمزعبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تایید رمز') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ثبت‌نام') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
