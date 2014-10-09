@include('parts.header-sub', array('title'=>'Yeni Kullanici'))

<div class="container">
  <h1>Yeni Kullanici Ekle</h1>
  {{ Form::open(array('url' => 'vezir/yeni-kullanici')) }}

  {{ Form::label('email','Email Address') }}
  {{ Form::text('email') }}

  {{ Form::label('username','Username') }}
  {{ Form::text('username') }}

  {{ Form::label('password','Password') }}
  {{ Form::text('password') }}

  {{ Form::submit('Sign Up') }}

  {{ Form::close() }}
</div>

@include('parts.footer-sub')