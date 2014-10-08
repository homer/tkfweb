@include('parts.header-sub', array('title'=>'Kulupler Listesi'))

<h3>Kulupler Listesi</h3>

<ul>
    @foreach($clubs as $club)
    <li>{{ $club->club_name }} - <a href="/liste/kulupler/{{ $club->id }}">detay</a></li>
    @endforeach
</ul>

@include('parts.footer-sub')