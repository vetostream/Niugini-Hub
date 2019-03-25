@extends('layouts.base')

@section('content')
<div class="section">
  <div class="container">
      <div class="col-sm-12">
        <div class="section-title">
          <h3 class="title">{{ __('Login') }}</h3>
        </div>
      </div>

      <div class="col-sm-12">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
            <div class="col-md-6">
              <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
              @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('username') }}</strong>
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

          <div class="form-group row text-right">
            <div class="col-md-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>

          <div class="form-group row text-right">
            <div class="col-md-10">
              <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
              </button>
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}" style="padding-right: 0px;">
                  {{ __('Forgot Your Password?') }}
                </a>
              @endif
            </div>
            <div class="col-md-2"></div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
@endsection


@section('modals')
<div class="modal fade bd-example-modal-sm" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="checkoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <!-- Note: Flexbox used to align contents in modal header -->
            <div class="modal-header" style="padding: 1rem; display: flex; align-items: flex-start; justify-content: space-between; ">
                <h4 class="modal-title" id="checkoutLabel" style="font-weight: 500; font-size: 1.5rem;" >Registration success!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem auto; padding: 1rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


        <div class="modal-body">
            <p>
                Registration success! Please Login now!
            </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@if( Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupmodal').modal();
        });
    </script>
@endif
@endsection
