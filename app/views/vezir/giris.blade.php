@include('parts.header-sub', array('title'=>'Yonetim Paneli Giris'))

<div class="container">
  <h1>Sisteme Giris</h1>
  {{ Form::open((array('url'=>'vezir/giris'))) }}

  {{ Form::label('username','Username') }}
  {{ Form::text('username') }}

  {{ Form::label('password','Password') }}
  {{ Form::text('password') }}

  {{ Form::submit('Login') }}

  {{ Form::close() }}
</div>

@include('parts.footer-sub')