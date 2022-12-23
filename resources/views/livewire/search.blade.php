<div>
    <x-display.col>
        @error('keyword')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form wire:submit.prevent="search">
            <label for="keyword">Search People/Organisation For</label>
            <input wire:model.defer="keyword" value="{{ $keyword }}" class="mt-3 mb-3 pt-5 pb-5 text-lg form-control"
                placeholder="painting/plaster/tution/electrician">
        </form>
    </x-display.col>
    @if ($show_search_result)
        <x-display.col col=12 title="Found Works for '{{ $keyword }}'">
            @forelse($results as $work)
                <ul>
                    <li class="list-group-item"> {{ $work->title }}
                        <a href="{{ route('work.list-workers', $work) }}">View</a>
                    </li>

                </ul>
            @empty


                No People Or Organisation Found
            @endforelse
        </x-display.col>
    @endif
</div>
