@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="media-object rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks])
                @endif
            </div>
        </div>    
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome To the TaskList</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</<th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    <!-- {!! link_to_route('tasks.create', '新規タスクの作成',[], ['class' => 'btn btn-primary']) !!} -->
    
@endsection