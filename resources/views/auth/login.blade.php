<!-- MADE BY ROMADHAN EDY PRASETYO - CYBERSOFT RPL SMKN 10 JAKARTA -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Realisasi Anggaran BNPB</title>
  <link rel="icon" href="{{ ('img/icon.png') }}">
  <link href="{{ ('materialize/icons/icons.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ ('materialize/css/materialize.min.css') }}">
  <link rel="stylesheet" href="{{ ('css/custom.css') }}">
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
</head>
<body bgcolor="#ddd">
  <div class="section">
    <div class="form-auth">
      <div class="card auth">
        <div class="card-icon">
          <div class="big-icon">
            <i class="material-icons prefix">person_outline</i>
          </div>
        </div>
        <div class="tag"></div>
        <div class="card-header auth">
          <p class="heading">LOGIN</p>
        </div>
        <div class="card-content">
          <div class="row">
              <form id="formValidate" class="col s12" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">mail</i>
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" class="validate" name="password" required>
                    <label for="password">Password</label>
                  </div>
                </div>
                <button type="submit" class="col s12 btn auth waves-effect waves-light light-blue accent-4"><b>LOG IN</b></button><br><br>
                <div class="q-auth">
                  <p>Belum memiliki akun? <a href="{{ url('register') }}">Daftar Sekarang</a></p>
                </div>
              </form>
          </div>
          @if ($errors->has('email') || $errors->has('password'))
            <script>
              swal("Login Eror", "Email Password Salah", "error");
            </script>
          @endif
        </div>
      </div>
    </div>
  </div>
  <script src="{{ ('js/jquery.js') }}"></script>
  <script src="{{ ('js/required.js') }}"></script>
  <script src="{{ ('materialize/js/materialize.min.js') }}"></script>
</body>
</html>
<!-- MADE BY ROMADHAN EDY PRASETYO - CYBERSOFT RPL SMKN 10 JAKARTA -->