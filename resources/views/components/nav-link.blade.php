@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 transition duration-150 ease-in-out text-decoration-none text-dark'
            : 'inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 transition duration-150 ease-in-out text-decoration-none text-dark';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
