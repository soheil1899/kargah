@extends('layouts.client.master')

@section('clientcontent')



    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <strong>
                    اطلاعات مربوط به پرداخت
                </strong>
            </div>
            @if($payment)
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <div class="row m-0">
                        عملیات پرداخت شما با موفقیت انجام شده است.
                        </div>
                        <div class="row mx-0 mt-4">
                            کارگاه
                            &nbsp;
                            <strong>
                            <a href="/workshop/{{$reserve['w_workshop_id']}}">
                            {{$reserve['workshop']}}
                            </a>
                            </strong>
                            &nbsp;
                            با شماره پیگیری
                            &nbsp;
                            <strong>
                            {{$reserve['authority']}}
                            </strong>
                            &nbsp;
                            برای شما رزرو شده است.
                        </div>
                    </div>
                    <a href="/" class="btn btn-dark text-white px-5 ml-2">برگشت</a>
                    <a href="/account" class="btn btn-success text-white px-5">حساب کاربری</a>
                </div>
            @else
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        عملیات پرداخت شما با موفقیت انجام نشده است.
                    </div>
                    <a href="/" class="btn btn-dark text-white px-5">برگشت</a>
                </div>
            @endif
        </div>
    </div>






@endsection
