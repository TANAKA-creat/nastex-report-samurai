@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="back-link">
                    <a href="{{ route('reports.index') }}">トップページに戻る</a>
                    <h1>
                        @foreach ($users as $user) - 詳細ページ
                            {{ $user->name }}
                        @endforeach
                    </h1>
                    <P>
                        <span>{{ $report->title }}</span>

                        <a href="{{ route('reports.edit', $report) }}">
                            「編集する」
                        </a>

                    <form method="POST" action="{{ route('reports.destroy', $report) }}" id="delete_report">
                        @method('DELETE')
                        @csrf
                        <button class="btn">「削除する」</button>
                    </form>
                    </P>

                    <p>{{ $report->body }}</p>

                    {{-- @foreach ($photos as $photo)
                        <img class="img" src="{{ asset('storage/photos/' . $photo->image) }}">
                    @endforeach --}}

                </div>
            </div>
        </div>
    </div>

    <script>
        'use strict'; {
            document.getElementById('delete_report').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('本当に削除しますか⁇')) {
                    return;
                }

                e.target.submit();
            });

        }
    </script>
@endsection
