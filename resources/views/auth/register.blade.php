@extends('layouts.base')

@section('content')
<div class="section">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-sm-12">
        <div class="section-title">
          <h3 class="title">{{ __('Register') }}</h3>
        </div>
      </div>

      <div class="col-sm-12">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
            <div class="col-md-6">
              <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required>
              @if ($errors->has('age'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('age') }}</strong>
                </span>
              @endif
            </div>
          </div>
          

          <div class="form-group row">
            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
            <div class="col-md-6">
              <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>
              @if ($errors->has('dob'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('dob') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
            <div class="col-md-6">
              <input type="radio" name="gender" value="male" @if(old('gender')) checked @endif> Male<br>
              <input type="radio" name="gender" value="female"  @if(old('gender')) checked @endif> Female<br>
              @if ($errors->has('dob'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('gender') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
            <div class="col-md-6">
              <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>
              @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
              @endif
            </div>
          </div>


          <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
            <div class="col-md-6">
              <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
              @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
            <div class="col-md-6">
              <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required>
              @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>

          <div class="form-group row text-right">
            <div class="col-md-10">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
            </div>
            <div class="col-md-2"></div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
@endsection
