@extends('layouts.app')

@section('title','انشاء مشروع جديد')

@section('content')

<div class="raw justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center">
            انشاء مشروع جديد
        </h3>

    <form action="/projects" method="POST" dir="rtl">
   @include('projects.form',[ 'project' => new App\Models\Project() ])
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="/projects" class="btn btn-light"> الغاء</a>
        </div>
    </form>

    </div>
</div>

@endsection