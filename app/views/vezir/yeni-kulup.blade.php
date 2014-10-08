@include('parts.header-sub', array('title'=>'Ana Sayfa'))

<div class="container">
  <h1>Kulup Kayit</h1>
  {{ Form::open(array('url' => 'vezir/yeni-kulup')) }}

    {{ Form::label('c_name','Kulup Adi') }}
    {{ Form::text('c_name') }}
    <br/>
    {{ Form::submit('Kaydet') }}

  {{ Form::close() }}
</div>

@include('parts.footer-sub')