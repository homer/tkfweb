@include('parts.header-sub', array('title'=>'Sporcular Listesi'))

<h3>Sporcular Listesi</h3>

<ul>
    @foreach($sportsmen as $man)
    <li>
        <h4>{{ $man->first_name }} {{ $man->last_name }}</h4>
        <h5>{{ $man->club_name }}</h5>
        <h6><a href="/liste/sporcular/{{ $man->id }}">Detaylarini goster</a></h6>
    </li>
    @endforeach
</ul>

@include('parts.footer-sub')