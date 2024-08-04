@extends('layouts.app')

@section('content')

<div class="todo">
    <div class="title">
        <p>タイトル</p>
        <p class="todo__title">{{ $todo->title }}</p>
    </div>

    <div class="content">
        <p>コンテンツ</p>
        <p class="todo__content">{{ $todo->content }}</p>
    </div>

    <div class="todo__actions">
        <a href="{{ route('todo.edit', ['id' => $todo->id]) }}" class="todo__edit-btn">編集</a>

        <form class="todo__delete-form" method="post" action="{{ route('todo.destroy', ['todo' => $todo->id]) }}">
            @csrf
            @method('DELETE')
            <button class="todo__delete-btn" onclick="return confirm('削除してもよろしいですか？')" type="submit"></button>
        </form>
    </div>
</div>
@endsection
