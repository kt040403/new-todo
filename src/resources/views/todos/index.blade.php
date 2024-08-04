@extend('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-canter">
        <div>
            <div class="card">
                <div class="card-holder">Todo一覧</div>

                <div class="card-body">
                    <form class="store" method="post" action="{{ route('todo.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">詳細</label>
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">期限（日付）</label>
                            <input type="date" class="form-control" id="deadline" name="deadline">
                        </div>

                        <div class="form-group">
                            <label for="category">カテゴリー（選択形式）</label>
                            <select class="form-control" id="category" name="category">
                                <option value="仕事">仕事</option>
                                <option value="プライベート">プライベート</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                    <br>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>期限</th>
                                <th>カテゴリー</th>
                                <th>フラグ</th>
                                <th>詳細</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo )
                            <tr>
                                <td>{{ $todo->title }}</td>

                                <td>{{ $todo->deadline ? date('Y/m/d', strtotime($todo->deadline)) : '' }} <br>

                                </td>
                                <td>{{ $todo->category }}</td>
                                <td>
                                    <form method="POST" action="{{ route('todo.flag', $todo->id) }}">
                                        @csrf

                                        <input type="hidden" name="flag" value="{{ $todo->flag == 0 ? 1 : 0 }}">
                                        <button type="submit" class="btn {{ $todo->flag == 0 ? 'btn-danger' : 'btn-success' }}">
                                            {{ $todo->flag == 0 ? '未完了' : '完了' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-primary">閲覧</a>
                                </td>
                                <td>
                                    <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-primary">編集</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .store div {
        margin-bottom: 20px;
    }
</style>