@extends('layouts.client.master')

@section('clientcontent')

    <div class="row m-0 justify-content-center py-4">
        <div class="card col-12 col-lg-7">
            <div class="card-body">
                <h5 class="card-title border-right-blue pr-3"><strong>
                        ورود به حساب کاربری
                    </strong></h5>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row m-0 px-5 mt-5">

                        <div class="form-group col-3 mb-1">
                            <label>* موبایل :</label>
                        </div>
                        <div class="form-group col-9 mb-1">
                            <input id="mobile" type="number" name="mobile"
                                   class="form-control form-control-sm position-absolute @error('mobile') is-invalid @enderror"
                                   required autocomplete="mobile" autofocus>
                        </div>

                        <div class="form-group col-3 mb-1">
                            <label>* رمز عبور :</label>
                        </div>
                        <div class="form-group col-9 mb-1">
                            <input id="password" type="password"
                                   class="form-control form-control-sm position-absolute @error('password') is-invalid @enderror"
                                   name="password"
                                   required autocomplete="current-password">
                        </div>


                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary float-left pointer">ورود به حساب کاربری</button>
                        <a href="{{route('register.wu')}}" class="pointer textblue"><strong class="textblue">
                                ثبت نام کاربر جدید
                            </strong></a>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
