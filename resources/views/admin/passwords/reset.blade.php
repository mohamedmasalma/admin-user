
@extends('login_template')

@section('change_pass')
        <form  class="m-login__form m-form" method="POST" action="{{ route('admin.password.request') }}" aria-label="">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                              <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required type="email" placeholder="email" >
                                </div>
                              
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required type="password" placeholder="Password" >
                                </div>
                                  <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password_confirmation" required>
                                </div>

                                 <div class="m-login__form-action">
                                    <button  type="submit"  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Reset</button>&nbsp;&nbsp;
                                     <a href="{{ route('admin.login') }}" id="" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">Cancel</a>
                                </div>


                 </form>    
   @endsection 