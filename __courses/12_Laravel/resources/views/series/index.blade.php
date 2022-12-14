<x-layout title='Series' :message-success="$messageSuccess">

    @auth
        <a href="{{route('series.create')}}" class="btn btn-dark mb-2">Add new series</a>
    @endauth
    <ul class="my-card-container">

        @foreach($series as $serie)
        <li class="my-card" 
            @if (file_exists('storage/' .$serie->cover_path) == false || $serie->cover_path == null)
                style="background-image: url('{{ asset('storage/no_image_available.jpeg') }}');"
            @else
                style="background-image: url('{{ asset('storage/' . $serie->cover_path) }}');"
            @endif
            >

            @auth
                <div class="d-flex gap-1" style="position: absolute; top: 102%">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                        <span>Edit</span>
                    </a>

                    <form action="{{ route('series.destroy', $serie) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="name" value="{{ $serie->name }}">
                        <button class="btn btn-danger btn-sm" type="submit" name="button">
                            <span>Delete</span>
                        </button>
                    </form>
                </div>
            @endauth

            @auth <a href="{{ route('seasons.index', ['series' => $serie, 'name' => $serie->name]) }}"> @endauth 
                <span class="my-link"></span>
            @auth </a> @endauth
        </li>
        @endforeach
    </ul>
    <nav style="display: block; position: absolute;">
        <ul style="display: flex; width: 100%;">
            @if ($series->hasPages())
                @foreach ($series->items() as $item)
                    {{ $series->getOptions(); }}
                @endforeach
            @endif
        </ul>
    </nav>

</x-layout>
