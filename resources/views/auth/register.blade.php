   @extends('login_template')
   @section('register')
     <div class="m-login">
                            <div class="m-login__head">
                                <h3 class="m-login__title">Sign Up</h3>
                                <div class="m-login__desc">Enter your details to create your account:</div>
                            </div>
                            <form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"type="text" placeholder="First Name" required >
                                </div>
                                 <div class="form-group m-form__group">
                                    <input class="form-control m-input" name="l_name"type="text" placeholder="Last Name" required >
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"type="text" placeholder="Email"  autocomplete="off" required>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" placeholder="Password" required>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="password_confirmation"  required>
                                </div>
                                <div class="row form-group m-form__group m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            <input type="checkbox" name="agree" required>I Agree the
                                            <a href="#" class="m-link m-link--focus">terms and conditions</a>.
                                            <span></span>
                                        </label>
                                        <span class="m-form__help"></span>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Sign Up</button>&nbsp;&nbsp;
                                     <a href="{{ route('login') }}" id="" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">Cancel</a>
                                </div>
                            </form>
                        </div>
   @endsection 