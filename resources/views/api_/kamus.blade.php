@extends('template.menu')
@section('konten')
  <div class="card-header text-white bg-primary">
    <h1>Dictionary Search</h1>
  </div>

  <div class="card-body">
    <form method="GET" action="{{ route('kamus.api') }}" class="form-inline">
    <div class="form-group">
        <label for="word">Enter a word :</label>
        <input class="form-control" type="text" id="word" name="word"  value="{{ old('word', $word ?? '') }}">
        <button type="submit" class="btn btn-primary mx-3">Search</button>
    </div>
</form>

<hr>
@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif


@if($data)
    @foreach ($data as $entry)
        <p><strong>Word:</strong> {{ $entry['word'] }}</p>
        <p><strong>Phonetic:</strong> {{ $entry['phonetic'] ?? 'N/A' }}</p>

        <h3>Phonetics:</h3>
        <ul>
            @foreach ($entry['phonetics'] as $phonetic)
                <li>
                    <strong>Text:</strong> {{ $phonetic['text'] ?? 'N/A' }}
                    @if (!empty($phonetic['audio']))
                        | <audio controls>
                            <source src="{{ $phonetic['audio'] }}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                    @endif
                </li>
            @endforeach
        </ul>

        <h3>Meanings:</h3>
        @foreach ($entry['meanings'] as $meaning)
            <p><strong>Part of Speech:</strong> {{ $meaning['partOfSpeech'] }}</p>
            <ul>
                @foreach ($meaning['definitions'] as $definition)
                    <li>
                        <strong>Definition:</strong> {{ $definition['definition'] }}
                        @if (isset($definition['example']))
                            <br><em>Example:</em> "{{ $definition['example'] }}"
                        @endif
                    </li>
                @endforeach
            </ul>

            @if (!empty($meaning['synonyms']))
                <p><strong>Synonyms:</strong> {{ implode(', ', $meaning['synonyms']) }}</p>
            @endif

            @if (!empty($meaning['antonyms']))
                <p><strong>Antonyms:</strong> {{ implode(', ', $meaning['antonyms']) }}</p>
            @endif
        @endforeach

        <hr>
    @endforeach
    @endif
  </div>


@endsection