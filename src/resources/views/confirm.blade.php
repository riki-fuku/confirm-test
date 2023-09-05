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
                <dd class="confirm-list__text">{{ $contact['first_name'] . ' ' . $contact['last_name'] }}</dd>

                <dt class="confirm-list__title">性別</dt>
                <dd class="confirm-list__text">
                    @if ($contact['gender'] == 1)
                        男性
                    @elseif($contact['gender'] == 2)
                        女性
                    @endif
                </dd>

                <dt class="confirm-list__title">メールアドレス</dt>
                <dd class="confirm-list__text">{{ $contact['email'] }}</dd>

                <dt class="confirm-list__title">郵便番号</dt>
                <dd class="confirm-list__text">{{ $contact['postcode'] }}</dd>

                <dt class="confirm-list__title">住所</dt>
                <dd class="confirm-list__text">{{ $contact['address'] }}</dd>

                <dt class="confirm-list__title">建物名</dt>
                <dd class="confirm-list__text">{{ $contact['building_name'] }}</dd>

                <dt class="confirm-list__title">ご意見</dt>
                <dd class="confirm-list__text">{{ $contact['opinion'] }}</dd>
            </dl>
        </div>

        <form action="/contacts" class="form" method="POST">
            @csrf

            <input type="hidden" name="fullname" value="{{ $contact['first_name'] . ' ' . $contact['last_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}">
            <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}">

            <div class="form__button">
                <button class="form__button-submit">送信</button>
            </div>

            <div class="page-back">
                <a href="/contacts/register" class="page-back__link">修正する</a>
            </div>
        </form>
    </div>
@endsection
