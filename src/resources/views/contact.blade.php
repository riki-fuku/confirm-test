@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>お問い合わせ</h2>
        </div>

        <form action="/confirm" class="form">

            {{-- お名前 --}}
            <div class="form__group">
                <label class="form__group-title" for="name">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </label>

                <div class="form__group-content">
                    <div class="form__input-name">
                        <div class="form__input-name--item">
                            <input type="text" id="name" name="first_name" class="form__input--text" value="{{ old('first_name') }}">
                            <div class="form_input--example">例）山田</div>
                        </div>
                        <div class="form__input-name--item">
                            <input type="text" name="last_name" class="form__input--text" value="{{ old('last_name') }}">
                            <div class="form_input--example">例）太郎</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 性別 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>

                <div class="form__group-content">
                    <div class="form__input-sex">
                        <div class="form__input-sex--item">
                            <input type="radio" id="radio__men" class="form__input--radio" name="sex" value="1" checked>
                            <label for="radio__men" class="form__input--radio-label">男性</label>
                            <input type="radio" id="radio__women" class="form__input--radio" name="sex" value="2">
                            <label for="radio__women" class="form__input--radio-label">女性</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- メールアドレス --}}
            <div class="form__group">
                <label class="form__group-title" for="email">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </label>

                <div class="form__group-content">
                    <div class="form__input-email">
                        <div class="form__input-email--item">
                            <input type="email" id="email" name="email" class="form__input--text" value="{{ old('email') }}">
                            <div class="form_input--example">例）test@example.com</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 郵便番号 --}}
            <div class="form__group">
                <label class="form__group-title" for="postcode">
                    <span class="form__label--item">郵便番号</span>
                    <span class="form__label--required">※</span>
                </label>

                <div class="form__group-content">
                    <div class="form__input-postcode">
                        <div class="form__input-postcode--mark">〒</div>
                        <div class="form__input-postcode--item">
                            <input type="text" id="postcode" name="postcode" class="form__input--text" value="{{ old('postcode') }}">
                            <div class="form_input--example">例）123-4567</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 住所 --}}
            <div class="form__group">
                <label class="form__group-title" for="address">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </label>

                <div class="form__group-content">
                    <div class="form__input-address">
                        <div class="form__input-address--item">
                            <input type="text" id="address" name="address" class="form__input--text" value="{{ old('address') }}">
                            <div class="form_input--example">例）東京都渋谷区千駄ケ谷1-2-3</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 建物名 --}}
            <div class="form__group">
                <label class="form__group-title" for="building_name">
                    <span class="form__label--item">建物名</span>
                </label>

                <div class="form__group-content">
                    <div class="form__input-building-name">
                        <div class="form__input-building-name--item">
                            <input type="text" id="building_name" name="building_name" class="form__input--text" value="{{ old('building_name') }}">
                            <div class="form_input--example">例）千駄ヶ谷マンション101</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ご意見 --}}
            <div class="form__group">
                <label class="form__group-title" for="opinion">
                    <span class="form__label--item">ご意見</span>
                    <span class="form__label--required">※</span>
                </label>

                <div class="form__group-content">
                    <div class="form__input-opinion">
                        <div class="form__input-opinion--item">
                            <textarea name="opinion" id="opinion" class="form__textarea">{{ old('opinion') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__button">
                <button class="form__button-submit">確認</button>
            </div>

        </form>
    </div>
@endsection
