@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="management-system__content">
        <div class="management-system__heading">
            <h2>管理システム</h2>
        </div>

        <div class="search">
            <form action="/search" class="form">

                {{-- お名前 --}}
                <div class="form__group">
                    {{-- お名前 --}}
                    <label class="form__group-title" for="name">お名前</label>
                    <div class="form__group-content">
                        <div class="form__input-name">
                            <div class="form__input-name--item">
                                <input type="text" id="name" name="name" class="form__input--text" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>

                    {{-- 性別 --}}
                    <div class="form__group-title form__group-title--sex">性別</div>
                    <div class="form__group-content">
                        <div class="form__input-sex">
                            <div class="form__input-sex--item">
                                <input type="radio" id="radio__all" class="form__input--radio" name="sex" value="0" checked>
                                <label for="radio__all" class="form__input--radio-label">全て</label>
                                <input type="radio" id="radio__men" class="form__input--radio" name="sex" value="1">
                                <label for="radio__men" class="form__input--radio-label">男性</label>
                                <input type="radio" id="radio__women" class="form__input--radio" name="sex" value="2">
                                <label for="radio__women" class="form__input--radio-label">女性</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 登録日 --}}
                <div class="form__group">
                    <label class="form__group-title" for="created">登録日</label>
                    <div class="form__group-content">
                        <div class="form__input-created">
                            <div class="form__input-created--item">
                                <input type="date" id="created" name="created_start" class="form__input--text" value="{{ old('created_start') }}">
                            </div>
                            <div class="form__input-created--mark">
                            ~
                            </div>
                            <div class="form__input-created--item">
                                <input type="date" name="created_end" class="form__input--text" value="{{ old('created_end') }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- メールアドレス --}}
                <div class="form__group">
                    <label class="form__group-title" for="email">メールアドレス</label>

                    <div class="form__group-content">
                        <div class="form__input-email">
                            <div class="form__input-email--item">
                                <input type="email" id="email" name="email" class="form__input--text" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form__button">
                    <button class="form__button-submit">検索</button>
                </div>

                <div class="search-reset">
                    <a href="/contact" class="search-reset__link">リセット</a>
                </div>
            </form>
        </div>

        <div class="contact-table">
            <table class="contact-table__inner">
                <tr class="contact-table__header">
                    <th class="contact-table__header" width="10%">ID</th>
                    <th class="contact-table__header" width="10%">お名前</th>
                    <th class="contact-table__header" width="10%">性別</th>
                    <th class="contact-table__header" width="20%">メールアドレス</th>
                    <th class="contact-table__header" width="40%">ご意見</th>
                    <th class="contact-table__header" width="10%"></th>
                </tr>
                <tr class="contact-table__row">
                    <td class="contact-table__text">1</td>
                    <td class="contact-table__text">山田太郎</td>
                    <td class="contact-table__text">男性</td>
                    <td class="contact-table__text">email@example.com</td>
                    <td class="contact-table__text">いつもお世話になっております。っっっっっっｓ</td>
                    <td class="contact-table__text">
                        <button class="delete-button">削除</button>
                    </td>
                </tr>
            </table>
        </div>

    </div>
@endsection
