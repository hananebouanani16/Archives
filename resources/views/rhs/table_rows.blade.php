@foreach($documents as $document)
    @if($document->type === 'Evenement Familar')
        <tr>
            <td>{{ $document->title }}</td>
            <td>{{ $document->creation_date }}</td>
            <td>
                <!-- Create a clickable link to the PDF document -->
                <a href="{{ asset($document->file_path) }}" target="_blank">Voir le document</a>
            </td>
        </tr>
    @endif
@endforeach
