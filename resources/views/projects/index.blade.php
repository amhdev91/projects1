@extends('layouts.app')

@section('title','المشاريع')


@section('content')



<header class="d-flex justify-content-between align-items-center my-5 " dir="rtl">
    <div>
        <a href="/projects">المشاريع</a>
    </div>

    <div>
        <a href="/projects/create">مشروع جديد</a>
    </div>
</header>

<section>
    <div class="row" dir="rtl">
    @forelse ($projects as $project)

    <div class="col-4 mt-4">
        <div class="card">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                        @case(2)
                        <span class="text-info">مكتمل</span>
                            @break
                        @case(1)
                        <span class="text-denger">ملغي</span>
                            @break
                        @default
                        <span class="text-success">قيد الانجاز</span>
                           @endswitch
                          <h5 class="font-weight-bold card-title">
                            <a href="/projects/{{ $project->id }}">{{ $project->title }} </a>
                          </h5>
                    <div class="card-text mt-4">
                        {{ Str::limit($project->description,150) }}
                    </div>
                    @include('projects.footer')
                </div>
            </div>
        </div>

    </div>
</div>

    @empty
    <div class="m-auto align-content-center text-center">
        <h3 class=" text-center">لا يوجد مشاريع</h3>
        <div class="mt-5">
            <a href="/projects/create " class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button"> انشئ مشروع جدبد</a>
        </div>
    </div>
    
    @endforelse
</section>
@endsection
