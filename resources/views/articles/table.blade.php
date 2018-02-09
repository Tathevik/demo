<thead>
<tr>
    <th class="sort" id="id" sort="{{$sort}}">ID</th>
    <th class="sort" id="title" sort="{{$sort}}">Title</th>
    <th class="sort" id="body" sort="{{$sort}}">Body</th>
</tr>
</thead>

<tbody>
    @foreach($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td><a href="{{ url('/articles/' . $article->id) }}" >{{ $article->title }}</a></td>
            <td>{{ $article->body }}</td>
        </tr>
    @endforeach
</tbody>
