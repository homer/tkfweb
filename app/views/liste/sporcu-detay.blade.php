@include('parts.header-sub', array('title'=>'Sporcular Listesi'))

<h3>Sporcu Detayi</h3>

<ul>
    <li>
        <h4>Adi ve Soyadi: {{ $man->first_name }} {{ $man->last_name }}</h4>
        <h5>Kulubu: {{ $man->club_name }}</h5>
        <h5>Lisans no: {{ $man->id }}</h5>
    </li>
</ul>

@include('parts.footer-sub')