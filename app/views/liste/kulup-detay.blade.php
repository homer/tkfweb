@include('parts.header-sub', array('title'=>'Sporcular Listesi'))

<h3>Kulup Detayi</h3>

<ul>
    <li>
        <h4>{{ $club->club_name }}</h4>
        <h5>Kulup no: {{ $club->id }}</h5>
    </li>
</ul>

@include('parts.footer-sub')