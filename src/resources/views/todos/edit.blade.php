@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content -center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-holder">Todo編集</div>

                <div class="card-body">
                    <form class="edit" method="post" action="{{ route('todo.update', $todo-$id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }} required">
                        </div>

                        <div class="form-group">
                            <label for="content">内容</label>
                            <textarea class="form-control" id="content" name="content">{{ $todo->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="deadline">期限(日付)</label>
                            <input type="date" name="deadline" id="deadline" value="{{ $todo->deadline }}" format="yyyy/MM/dd">
                        </div>

                        <div class="form-group">
                            <label for="category">カテゴリ(選択形式)</label>
                            <select class="form-control" id="category" name="category">
                                <option value="仕事" {{ $todo->category =='仕事' ? 'selected' : '' }}>仕事</option>
                                <option value="プライベート" {{ $todo->category =='プライベート' ? 'selected' : '' }}>プライベート</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

