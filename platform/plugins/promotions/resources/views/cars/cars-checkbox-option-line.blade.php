@php
/**
 * @var string $value
 */
$value = isset($value) ? (array)$value : [];
@endphp
@if($cars)
    <ul>
        @foreach($cars as $car)
            @if($car->id != $currentId)
                <li value="{{ $car->id ?? '' }}"
                        {{ $car->id == $value ? 'selected' : '' }}>
                    {!! Form::customCheckbox([
                        [
                            $name, $car->id, $car->name, in_array($car->id, $value),
                        ]
                    ]) !!}
                    @include('plugins/promotions::cars.cars-checkbox-option-line', [
                        'cars' => $car->childrents,
                        'value' => $value,
                        'currentId' => $currentId,
                        'name' => $name
                    ])
                </li>
            @endif
        @endforeach
    </ul>
@endif
