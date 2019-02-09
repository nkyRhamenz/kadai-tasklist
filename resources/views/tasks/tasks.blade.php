<ul class="media-list">
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <img class="media-object rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            <div class="media-body ml-3">
                <table border="1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ユーザー</th>
                            <th>ステータス</<th>
                            <th>タスク内容</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! link_to_route('users.show', $task->user->name, ['id' => $task->user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span></td>
                            <td>{!! nl2br(e($task->status)) !!}</td>
                            <td>{!! nl2br(e($task->content)) !!}</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    @if(Auth::id() == $task->user_id)
                        {!! Form::open(['route'=>['tasks.destroy',$task->id],'method' => 'delete']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>

{{ $tasks->render('pagination::bootstrap-4') }}