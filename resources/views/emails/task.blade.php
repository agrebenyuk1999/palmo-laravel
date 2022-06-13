<h1>Создано новая задача {{ $task->name }}</h1>
Категории: @foreach($task->categories as $category) {{ $category->name }}  @endforeach
<p>{{ $task->description }}</p>