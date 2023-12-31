@extends('layouts.app')

@section('content') 



<header class="d-flex justify-content-between align-items-center my-5 " dir="rtl">
    <div>
        <a href="/projects">المشاريع / {{$project->title}}</a>
    </div>

    <div>
  <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button"> تعديل المشروع</a>
    </div>
</header>


<section class="row text-right" dir="rtl">

    <div class="col-lg-4">
        <div class="card text-right">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                    @case(1)
                    <span class="text-sucess">ملغي</span>
                    @break
                    @case(2)
                    <span class="text-danger">مكتمل</span>
                    @break
                    @default
                    <span class="text-warning">قيد الانجاز </span>
                    @endswitch
                    <h5 class="font-weight-bold card-title">
                        <h1>{{$project->title}}</h1>
                    </h5>
                    <div class="card-text mt-4">
                        {{$project->description}}
                    </div>
                    @include('projects.footer')
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('projects.update',$project->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <select name="status" class="custom-select"  onchange="this.form.submit()">
                    <option value="0" {{($project->status == 0 ? 'selected' : '' )}}>قيد الانجاز</option>
                    <option value="1" {{($project->status == 1 ? 'selected' : '' )}}>ملغي</option>
                    <option value="2" {{($project->status == 2 ? 'selected' : '' )}}>مكتمل</option>
                </select>
            </form>
        </div>
    </div>
    </div>

<div class="col-lg-8 ">
    @php
    $sortedTasks = collect($project->tasks)->sortBy('done');
    // Use sortByDesc if you want to show completed tasks first
@endphp
@foreach ($sortedTasks as $task)
    <div class="card d-flex flex-row justify-between">
        <div class="{{ $task->done ? 'checked muted' : '' }} card-body">
            {{ $task->body }}
        </div>

        <div class="mr-auto">
            <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                @csrf
                @method('PATCH')
                <input type="checkbox" name="done" {{$task->done ? 'checked':'' }} onchange="this.form.submit()" class="m-3">
            </form>
        </div>
        <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                  </svg>
            </button>
        </form>
    </div>
@endforeach
    <div class="card">
        <form action="/projects/{{$project->id}}/tasks" method="POST" class="d-flex">
            @csrf
            <input type="text" name="body" class="form-control p-2 ml-2" placeholder="اضافة مهمة جديدة">
            <button type="submit" class="btn btn-primary btn-block">اضافة</button>
        </form>
    </div>
</div>

             
</section>
@endsection