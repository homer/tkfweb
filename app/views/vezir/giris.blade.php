@include('parts.header-sub', array('title'=>'Yonetim Paneli Giris'))

<div class="container">
  <h1>Sisteme Giris</h1>
  {{ Form::open(array('url' => 'vezir/yeni-kulup')) }}

    {{ Form::label('c_name','Kulup Adi') }}
    {{ Form::text('c_name') }}
    <br/>
    {{ Form::submit('Kaydet') }}

  {{ Form::close() }}
</div>

@include('parts.footer-sub')