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
<div class="pt-5">
    <div class="card container record-create-area pt-2 pb-5" style="width: 18rem;">
        <div class="card-body">
            <div class="learning-record-form">
                <div class="form-area">
                    <form action="/learningrecords" method="POST">
                        @csrf
                        <div class="input-form">
                            <label for="day" class="form-label">学習日</label>
                            <input type="date" name="day" id="day" class="form-control" />
                        </div>
                        <div class="input-form mt-3">
                            <div class="hours-number">
                                <label for="hours" class="form-label">学習時間</label>
                                <input type="number" name="hours" class="form-control hours-number" id="hours" />
                                <p>時間</p>
                            </div>
                        </div>
                        <div class="textarea-form textarea-content mt-3">
                            <label for="text" class="form-label">学習内容</label>
                            <textarea name="text"
                                placeholder="こんな内容を記録しましょう！&#13;&#13;・学習日数&#13;・学習内容&#13;・理解したポイントや参考になった情報&#13;・感想&#13;・明日の学習計画"
                                id="text"
                                class="form-control h-100"
                                >{!! $content_text !!}
                            </textarea>
                        </div>
                        <input type="hidden" name="user_id">
                        <div class="input-form">
                            <button type="submit" class="btn btn-primary w-100" value="Submit">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
