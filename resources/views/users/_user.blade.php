<div class="list-group-item">
  <!-- <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32> -->
  <img class="mr-3" src="https://cdn.learnku.com/uploads/sites/KDiyAbV0hj1ytHpRTOlVpucbLebonxeX.png" alt="{{ $user->name }}" width=32>
  <a href="{{ route('users.show', $user) }}">
    {{ $user->name }}
  </a>

  <!-- can Blade 命令，允许我们在 Blade 模板中做授权判断。    在用户列表页加上只有管理员才能看到的删除用户按钮 -->
  @can('destroy', $user)
    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-right">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
    </form>
  @endcan

</div>
