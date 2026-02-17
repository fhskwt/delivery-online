@extends('layouts.app')

@section('content')

    <div class="lg:grid lg:grid-cols-4 gap-6">

        {{-- Категории --}}
        <aside class="lg:col-span-1 mb-4 lg:mb-0">
            <livewire:menu.categories />
        </aside>

        {{-- Товары --}}
        <section class="lg:col-span-3">
            <livewire:menu.products />
        </section>

    </div>

@endsection
