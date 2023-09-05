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
            <form action="/contacts/search" class="form" method="GET">

                <div class="form__group">
                    {{-- お名前 --}}
                    <label class="form__group-title" for="fullname">お名前</label>
                    <div class="form__group-content">
                        <div class="form__input-fullname">
                            <div class="form__input-fullname--item">
                                <input type="text" id="fullname" name="fullname" class="form__input--text"
                                    value="{{ !empty($request->fullname) ? $request->fullname : '' }}">
                            </div>
                        </div>
                    </div>

                    {{-- 性別 --}}
                    <div class="form__group-title form__group-title--sex">性別</div>
                    <div class="form__group-content">
                        <div class="form__input-sex">
                            <div class="form__input-sex--item">
                                <input type="radio" id="radio__all" class="form__input--radio" name="gender"
                                    value="0" checked>
                                <label for="radio__all" class="form__input--radio-label">全て</label>
                                <input type="radio" id="radio__men" class="form__input--radio" name="gender"
                                    value="1" {{ !empty($request->gender) && $request->gender == 1 ? 'checked' : '' }}>
                                <label for="radio__men" class="form__input--radio-label">男性</label>
                                <input type="radio" id="radio__women" class="form__input--radio" name="gender"
                                    value="2" {{ !empty($request->gender) && $request->gender == 2 ? 'checked' : '' }}>
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
                                <input type="date" id="created" name="created_start" class="form__input--text"
                                    value="{{ !empty($request->created_start) ? $request->created_start : '' }}">
                            </div>
                            <div class="form__input-created--mark">
                                ~
                            </div>
                            <div class="form__input-created--item">
                                <input type="date" name="created_end" class="form__input--text"
                                    value="{{ !empty($request->created_end) ? $request->created_end : '' }}">
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
                                <input type="email" id="email" name="email" class="form__input--text"
                                    value="{{ !empty($request->email) ? $request->email : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form__button">
                    <button class="form__button-submit">検索</button>
                </div>

                <div class="search-reset">
                    <a href="/" class="search-reset__link">リセット</a>
                </div>
            </form>
        </div>

        <div class="contact-table">

            <div class="paginate">
                <div class="paginate__text">
                    {{ '全' . $contacts->total() . '件中' . ' ' . $contacts->firstItem() . '~' . $contacts->lastItem() . '件' }}
                </div>

                <div class="paginate__links">
                    <a href="{{ $contacts->previousPageUrl() }}" class="paginate__link">
                        <div class="paginate__link-item">＜</div>
                    </a>

                    @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                        <a href="{{ $contacts->url($i) }}" class="paginate__link">
                            @if ($contacts->currentPage() == $i)
                                <div class="paginate__link-item paginate__link-item--select">{{ $i }}</div>
                            @else
                                <div class="paginate__link-item">{{ $i }}</div>
                            @endif
                        </a>
                    @endfor

                    <a href="{{ $contacts->nextPageUrl() }}" class="paginate__link">
                        <div class="paginate__link-item">＞</div>
                    </a>

                </div>
            </div>

            <table class="contact-table__inner">
                <tr class="contact-table__header">
                    <th class="contact-table__header" width="10%">ID</th>
                    <th class="contact-table__header" width="10%">お名前</th>
                    <th class="contact-table__header" width="10%">性別</th>
                    <th class="contact-table__header" width="20%">メールアドレス</th>
                    <th class="contact-table__header" width="40%">ご意見</th>
                    <th class="contact-table__header" width="10%"></th>
                </tr>

                @foreach ($contacts as $contact)
                    <tr class="contact-table__row">
                        <td class="contact-table__text">{{ $contact->id }}</td>
                        <td class="contact-table__text">{{ $contact->fullname }}</td>
                        <td class="contact-table__text">
                            @if ($contact->gender == 1)
                                男性
                            @elseif($contact->gender == 2)
                                女性
                            @endif
                        </td>
                        <td class="contact-table__text">{{ $contact->email }}
                        </td>
                        <td class="contact-table__text contact-table__text--opinion">
                            {{ mb_strlen($contact->opinion) > 25 ? mb_substr($contact->opinion, 0, 25) . '...' : $contact->opinion }}
                            <span class="contact-table__text--opinion-detail">
                                {{ $contact->opinion }}
                            </span>
                        </td>
                        <td class="contact-table__text">
                            <form action="/contacts/delete" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                <button class="delete-button">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection
