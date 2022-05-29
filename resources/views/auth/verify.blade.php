@extends('layouts.app')

@section('content')
<div class="container" style="min-height:100vh">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтверждение Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('На ваш электронный адрес была отправлена новая проверочная ссылка..') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, пожалуйста, проверьте свою электронную почту на наличие проверочной ссылки.') }}
                    {{ __('Если вы не получили письмо по электронной почте') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Нажмите здесь, чтобы запросить еще раз') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
