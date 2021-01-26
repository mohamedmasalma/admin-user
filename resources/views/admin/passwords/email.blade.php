@extends('login_template')

@section('forget')
               <div class="m-login">
                            <div class="m-login__head">
                                <h3 class="m-login__title">Forgotten Password ?</h3>
                                <div class="m-login__desc">Enter your email to reset your password:</div>
                            </div>
                            <form class="m-login__form m-form" method="POST" action="{{ route('admin.password.email') }}">
                                @csrf
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                                </div>
                                <div class="m-login__form-action">
                                    <button type="submit" id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">Request</button>&nbsp;&nbsp;
                                   <a href="{{ route('login') }}" id="" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">Cancel</a>
                                </div>
                            </form>
                        </div>
   @endsection 