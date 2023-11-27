@extends('layouts.app')

@section('title','الصفحة الشخصية')


@section('content')

<div class="row " >
    <div class="col-md-6 mx-auto ">
        <div class="card p-2">
            <div class="text-center">
                <img src={{asset("storage/" .auth()->user()->image)}} alt="" height="82px" width="82px">


                <h3>{{auth()->user()->name }}</h3>
            </div>
            <div class="card-body">
                <form action="/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name"> الاسم </label>
                        <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name }}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="email"> البريد الالكتروني</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{auth()->user()->email}}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="password">تعديل كلمة المرور</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">تاكيد كلمة المرور</label>
                        <input type="password" name="password-confirmation" id="password-confirmation" class="form-control" autocomplete="off">
                    </div>

                    <div class="from-group">
                        <label for="image">الصورة الشخصية</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    
                    <div class="from-group d-flex mt-5" dir="ltr">
                        <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                        <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج </button>
                    </div>
                </form>

                <form action="/logout" id="logout" method="POST">
                    @csrf
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

