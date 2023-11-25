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
                <form action="{{ route('mypage_update') }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ユーザー名') }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
