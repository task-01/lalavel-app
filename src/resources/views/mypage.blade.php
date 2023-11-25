@extends('layouts.app')

@section('content')
<div class="pt-5">
    <div class="card container user-information-area mt-5 pt-2 pb-2" style="width: 18rem;">
        <div class="card-body row">
            <div class="row">
                <div class="col-md-6">
                    <h2>アカウント情報確認</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('mypage_edit') }}" class="btn btn-outline-danger w-50">編集</a>
                    <p class="important-point">※こちらではユーザー名・メールアドレスのみ変更できます。</p>
                </div>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                    <th scope="row">ユーザー名</th>
                    <td>ようこそ{{ Auth::user()->name }}さん！</td>
                    </tr>
                    <tr>
                    <th scope="row">メールアドレス</th>
                    <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                    <th scope="row">作成学習記録数</th>
                    <td colspan="2">{{ Auth::user()->learningrecords->count() }}個作成</td>
                    </tr>
                    <tr>
                    <th scope="row">合計学習時間</th>
                    <td colspan="2">{{ $total_hours  }}時間</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('learningrecords.create') }}" class="btn btn-outline-dark mt-4 mr-2">学習記録作成</a>
            <a href="{{ route('learningrecords.index') }}" class="btn btn-outline-dark mt-4 mr-2">学習記録一覧へ</a>
        </div>
    </div>
</div>
@endsection
