@csrf
<div class="form-group">
    <label for="title">عنوان المشروع</label>
    <input type="text" class="form-control" id="title" name="title"  value="{{$project->title ?? ''}}">

    @error('title')
    <small class="text-danger">{{ $message }}</small>

    @enderror
</div>
    <div class="from-group">
        <label for="description">وصف المشروع</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="وصف المشروع">{{$project->description }}</textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small>

        @enderror

    </div>