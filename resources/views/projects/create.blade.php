@extends('layouts.app')

@section('title','انشاء مشروع جديد')


@section('content')

<div class="raw justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center">
            انشاء مشروع جديد
        </h3>

    <form action="/projects" method="POST" dir="rtl">
    @csrf
    <div class="form-group">
        <label for="title">عنوان المشروع</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان المشروع" value="{{ old('title') }}">

        @error('title')
        <small class="text-danger">{{ $message }}</small>

        @enderror
    </div>
        <div class="from-group">
            <label for="description">وصف المشروع</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="وصف المشروع">{{ old('description') }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>

            @enderror

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="/projects" class="btn btn-light"> الغاء</a>
        </div>
    </form>

    </div>
</div>

@endsection