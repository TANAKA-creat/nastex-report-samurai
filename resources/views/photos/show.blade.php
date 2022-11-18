@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="back-link">
                    <a href="{{ route('reports.index') }}">トップページに戻る</a>
                    <h1>
                        @foreach ($users as $user)
                            {{ $user->name }}
                        @endforeach
                    </h1>
                    <P>
                        @foreach ($photos as $photo)
                            <img class="img" src="{{ asset('storage/photos/' . $photo->image) }}">
                            <p>{{ $photo->title }}</p>
                        @endforeach

                        <a href="{{ route('photos.edit', $photo) }}">
                            「編集する」
                        </a>

                    <form method="POST" action="{{ route('photos.destroy', $photo) }}" id="delete_photo">
                        @method('DELETE')
                        @csrf
                        <button class="btn">「削除する」</button>
                    </form>
                    </P>

                </div>
            </div>
        </div>
    </div>

    <script>
        'use strict'; {
            document.getElementById('delete_photo').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('本当に削除しますか⁇')) {
                    return;
                }

                e.target.submit();
            });

        }
    </script>
@endsection
