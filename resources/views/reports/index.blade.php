@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                @foreach ($users as $user)
                    <h1>
                        {{ $user->name }} - トップページ
                    </h1>

                    <div class="col-2">
                        <a href="{{ route('reports.create', $user) }}">
                            「日報を書く」
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                @forelse($reports as $report)
                    <a href="{{ route('reports.show', $report) }}">
                        {{ $report->title }}
                    </a>
                @empty
                    <p>記録がありません</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
