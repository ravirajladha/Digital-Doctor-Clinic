<!-- resources/views/components/Button.blade.php -->

@props(['type', 'url'])

@php
    $class = ($type == 'edit') ? 'btn btn-sm bg-success-light' : 'btn btn-sm bg-primary-light';
    $label = ($type == 'edit') ? 'Edit' : 'View';
    $icon = ($type == 'edit') ? 'pencil' : 'eye';
@endphp

<a class="btn {{ $class }}" href="{{ $url }}"><i class="fe fe-{{$icon}}"></i> {{ $label }}</a>
