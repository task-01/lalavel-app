@extends('layouts.app')

@section('content')
<h1>編集内容確認</h1>
<ul class="list-group">
    <li class="list-group-item">{{$learningrecord->day}}</li>
    <li class="list-group-item">{{$learningrecord->hours}}時間</li>
    <li class="list-group-item">{{$learningrecord->text}}</li>
</ul>
<a href="{{ route('learningrecords.edit', [$learningrecord->id]) }}">学習記録編集へ戻る</a>
<a href="{{ route('learningrecords.index') }}">学習記録一覧へ</a>
@endsection
