@include('parts.header-sub', array('title'=>'Ana Sayfa'))

<div class="container">

    @if( isset($s_name) )
    <h3>{{ $s_name }} icin kayit islemi basariyla gerceklestirildi.</h3>
    @endif

  <h1>Sporcu Kayit</h1>
  {{ Form::open(array('url' => 'vezir/yeni-sporcu')) }}

    {{ Form::label('f_name','Sporcunun Adi') }}
    {{ Form::text('f_name') }}
    <br/>
    {{ Form::label('l_name','Soyadi') }}
    {{ Form::text('l_name') }}
    <br/>
    {{ Form::label('club','Kulubu') }}
    {{ Form::select('club',$clubs) }}
    <br/>
    {{ Form::submit('Kaydet') }}

  {{ Form::close() }}
</div>

@include('parts.footer-sub')