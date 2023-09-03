@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>内容確認</h2>
        </div>

        <div class="cpmform-list">
            <dl class="confirm-list__inner">
                <dt class="confirm-list__title">お名前</dt>
                <dd class="confirm-list__text">田中 太郎</dd>

                <dt class="confirm-list__title">性別</dt>
                <dd class="confirm-list__text">田中 太郎</dd>

                <dt class="confirm-list__title">メールアドレス</dt>
                <dd class="confirm-list__text">田中 太郎</dd>

                <dt class="confirm-list__title">郵便番号</dt>
                <dd class="confirm-list__text">田中 太郎</dd>

                <dt class="confirm-list__title">住所</dt>
                <dd class="confirm-list__text">田中 太郎</dd>

                <dt class="confirm-list__title">建物名</dt>
                <dd class="confirm-list__text">田中 太郎</dd>

                <dt class="confirm-list__title">ご意見</dt>
                <dd class="confirm-list__text">田中</dd>
            </dl>
        </div>

        <form action="/thanks" class="form">

            <div class="form__button">
                <button class="form__button-submit">送信</button>
            </div>

            <div class="page-back">
                <a href="/contact" class="page-back__link">修正する</a>
            </div>
        </form>
    </div>
@endsection
