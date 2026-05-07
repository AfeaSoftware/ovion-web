@if (! empty($items))
    <ul class="space-y-1 text-sm">
        @foreach ($items as $item)
            <li>
                <a href="#{{ $item['id'] }}" class="hover:underline block py-1">{{ $item['text'] }}</a>
                @if (! empty($item['children']))
                    <ul class="pl-4 space-y-1">
                        @foreach ($item['children'] as $child)
                            <li>
                                <a href="#{{ $child['id'] }}" class="hover:underline block py-1 text-gray-600">{{ $child['text'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@endif
