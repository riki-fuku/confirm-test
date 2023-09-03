@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks__content">
        <div class="thanks__heading">
            <p>ご意見いただきありがとうございました。</p>
        </div>

        <button class="thanks__button">トップページへ</button>
    </div>
@endsection
