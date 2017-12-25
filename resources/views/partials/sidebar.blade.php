<br>
@foreach($archives as $archive)
    <ul>
        <li>
            <a href="../articles/?month={{$archive->month}}&year={{$archive->year}}">
                {{$archive->month}}
            </a>
        </li>
    </ul>
@endforeach