<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    // 借助 Auth 中间件来为这两个动作添加过滤请求。
    public function __construct()
    {
        $this->middleware('auth');
    }

    //创建一个微博发布表单 POST
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);
        session()->flash('success', '发布成功！');
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);//做删除授权的检测，不通过会抛出 403 异常。
        $status->delete();
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }

}
