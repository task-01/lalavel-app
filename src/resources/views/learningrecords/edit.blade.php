@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container pt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3">
                <form action="{{ route('learningrecords.update', [$learningrecord->id]) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="day-area" class="form-label">学習日</label>
                        <input type="date" class="form-control" id="day-area" name="day" value="{{ $learningrecord->day }}" />
                    </div>
                    <div class="mb-3">
                        <label for="hours-area" class="form-label">学習時間</label>
                        <input type="number" class="form-control" id="hours-area" name="hours" value="{{ $learningrecord->hours }}" />
                    </div>
                    <div class="mb-3">
                        <label for="text-area" class="form-label">学習内容</label>
                        <textarea class="form-control" id="text-area" name="text" rows="3">{{ $learningrecord->text }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
