<table>
    <thead>
        <tr>
            @foreach ($header as $ukuran)
                <th><strong>{{ $ukuran }}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $ukuran)
            <tr>
                <td>{{ $ukuran->KodeUkuran }}</td>
                <td>{{ $ukuran->KeteranganUkuran }}</td>
            </tr>
        @endforeach
    </tbody>
</table>