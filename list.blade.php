<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<center>
    <form action="list" method="get" class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">书籍名称</label>
            <input type="text" name="search" class="form-control" placeholder="请输入小说名称">
        </div>
        <button type="submit" class="btn btn-large btn-primary">点击搜索</button>
    </form>

    <table class="table table-striped">
        <tr>
            <td>小说名称</td>
            <td>小说内容</td>
            <td>小说作者</td>
            <td>小说字数</td>
            <td>操作</td>
        </tr>
        @foreach($data as $key=>$val)
        <tr>
            <td><a href="show?id={{$val->id}}">{{$val->title}}</a></td>
            <td>{{$val->content}}</td>
            <td>{{$val->author}}</td>
            <td>{{$val->count}}</td>
            <td><a href="del?id={{$val->id}}">删除</a></td>
        </tr>
            @endforeach
        <tr >
            <td colspan="4">
                <a href="./page?page=1">首页</a>
                <a href="./page?page={{$list['last']}}">上一页</a>
                <a href="./page?page={{$list['next']}}">下一页</a>
                <a href="./page?page={{$list['ye']}}">尾页</a>
                <form action="add" method="post">
                   <input type="submit" value="插入数据" class="btn btn-primary">
                </form>
            </td>
        </tr>
    </table>
     
</center>
</body>
</html>