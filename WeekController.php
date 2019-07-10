<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request as request;
use Illuminate\Support\Facades\DB;
use App\Week;

class WeekController extends Controller{

    public function list(){
        $search = Request('search');
        $page = Request('page',1);
        $count = DB::table('books')->count();
        $limit = 3;
        $ye = ceil($count/$limit);
        $list['last'] = $page <=1 ?1:$page-1;
        $list['next'] = $page >=$ye ? $ye : $page+1;
        $list['ye'] = $ye;
        $offset = ($page-1) * $limit;
        $data = DB::table('books')->where('title', 'like', '%' . $search . '%')->offset($offset)->limit($limit)->get()->toArray();
        return view('list',['data'=>$data,'list'=>$list]);
    }

    public function add(){
        return view('add');
    }

    public function add_do(request $request){
        $data = $request->all(['title','content','author','count']);
        $res = DB::table('books')->insert($data);
        if($res){
            return redirect('list');
        }
    }

    public function del(){
        $data = Request();
        $id = $data['id'];
        $data = DB::table('books')->where('id', '=', $id)->delete();
        if ($data) {
            return redirect('list');
        } else {
            echo "删除失败";
        }
    }

     public function show(request $request){
        $id = $request->post('id');
        $data = DB::select("select * from books where id='$id'");
        return view('show',['id'=>$id,'data'=>$data]);
    }

}