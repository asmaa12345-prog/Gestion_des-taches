<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>إعادة تعيين كلمة المرور</title>
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">إعادة تعيين كلمة المرور</h1>
              </div>
              <form action="{{ route('password.update') }}" method="POST" class="user">
                @csrf
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="البريد الإلكتروني">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="كلمة المرور الجديدة">
                    @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" id="exampleRepeatPassword" placeholder="تأكيد كلمة المرور الجديدة">
                    @error('password_confirmation')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">تحديث كلمة المرور</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">هل لديك حساب؟ سجل الدخول!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
