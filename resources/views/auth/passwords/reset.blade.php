@extends('layout')

@section('content')
<div class="container">
    <div class="row">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
        <div class="panel-heading">パスワード再発行</div>
        <div class="panel-body">
            <form method="POST" action="{{ route('password.request') }}">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス</label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $email) }}"/>
            </div>
            <div class="form-group">
                <label for="password">新しいパスワード</label>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div class="form-group">
                <label for="password-confirm">新しいパスワード（確認）</label>
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" />
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
            </div>
            </form>
        </div>
        </nav>
    </div>
    </div>
</div>
@endsection
