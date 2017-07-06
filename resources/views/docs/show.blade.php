@extends('layouts.master')

@section('content')
    <section class="section documentation">
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                    <aside class="menu">
                        @foreach($menus as $menu)
                            {{ $menu }}
                        @endforeach
                    </aside>
                </div>
                <div class="column is-9 content">
                    <div class="pull-right">
                        <docs-menu
                                current-version="{{ $version }}"
                                current-language="{{ $language }}"
                                current-page="{{ $page }}"
                                :languages="{{ json_encode(App\Entities\Language::titles()) }}"
                                :versions="{{ App\Services\Version::all() }}"
                        ></docs-menu>
                    </div>
                    <main>
                        {!! $contents !!}
                    </main>
                </div>
            </div>
        </div>
    </section>
@endsection
