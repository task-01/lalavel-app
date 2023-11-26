@extends('layouts.app')

@section('content')
<div class="pt-5">
    <div class="card container user-information-area mt-5 pt-2 pb-2" style="width: 18rem;">
        <div class="card-body row">
            <div class="row">
                <div class="col-md-6">
                    <h1>編集内容確認</h1>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">{{$learningrecord->day}}</li>
                    <li class="list-group-item">{{$learningrecord->hours}}時間</li>
                    <li class="list-group-item">{{$learningrecord->text}}</li>
                </ul>
                <a href="{{ route('learningrecords.edit', [$learningrecord->id]) }}" class="btn btn-outline-dark mt-4 mr-2">学習記録編集へ戻る</a>
                <a href="{{ route('learningrecords.index') }}" class="btn btn-outline-dark mt-4 mr-2">学習記録一覧へ</a>
            </div>
        </div>
    </div>
</div>
@endsection
