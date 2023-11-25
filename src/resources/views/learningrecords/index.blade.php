@extends('layouts.app')

@section('content')
<div class="pt-5">
    <div class="card container record-index-area pt-2 pb-5" style="width: 18rem;">
        <div class="card-body">
            <form action="{{ route('learningrecords.index') }}" method="GET">
                <div class="mb-3">
                    <label for="exampleInputSearch" class="form-label fs-3">検索フォーム</label>
                    <input type="text" class="form-control" id="exampleInputSearch" name="searchkey" value="{{ $searchkey ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">検索</button>
            </form>
            <div class="d-flex mt-3">
                <div class="tab active all-user" data-value='1' >
                    <p>全体</p>
                </div>
                <div class="tab onse-user" data-value='2' >
                    <p>自分のみ</p>
                </div>
            </div>
            <div class="content show">
                @forelse($learningrecords as $learningrecord)
                <div class="card mt-3 mb-3 learningrecord-area">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">{{$learningrecord->user->name}}</h5>
                            <div class="d-flex gap-3">
                                @if($learningrecord->user->id === auth()->id())
                                    <a href="{{ route('learningrecords.edit', [$learningrecord->id]) }}" class="btn btn-outline-dark">編集</a>
                                    <form action="{{ route('learningrecords.destroy', [$learningrecord->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex">
                            <p class="card-subtitle mb-2 text-body-secondary pe-3">
                                学習記録日：{{$learningrecord->day}}
                            </p>
                            <p class="card-subtitle mb-2 text-body-secondary">
                                学習時間：{{$learningrecord->hours}}時間
                            </p>
                        </div>
                        <div>
                            <p class="card-text">{{$learningrecord->text}}</p>
                        </div>
                    </div>
                </div>
                @empty
                    <td>学習記録がありません</td>
                @endforelse
                <div class="paginate">
                    @if ($learningrecords->count() > 0)
                        {{ $learningrecords->links() }}
                    @endif
                </div>
            </div>
            <div class="content" id="onse-user">
                @forelse($onlearningrecords as $onlearningrecord)
                    @if($onlearningrecord->user->id === auth()->id())
                        <div class="card mt-3 mb-3 learningrecord-area">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">{{$onlearningrecord->user->name}}</h5>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('learningrecords.edit', [$onlearningrecord->id]) }}" class="btn btn-outline-dark">編集</a>
                                        <form action="{{ route('learningrecords.destroy', [$onlearningrecord->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                    <p class="sub-learning-content">
                                        <i class="bi bi-calendar"></i>&nbsp;&nbsp;{{$onlearningrecord->day}}
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="bi bi-clock-history"></i>&nbsp;&nbsp;{{$onlearningrecord->hours}}時間
                                    </p>
                                </div>
                                <div>
                                    <p>{{$onlearningrecord->text}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <td>学習記録がありません</td>
                @endforelse
                <div class="paginate">
                    @if ($onlearningrecords->count() > 0)
                        {{ $onlearningrecords->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/tab.js') }}"></script>
@endsection
