<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Chategory;
use App\Tools\ToolsAdmin;
class ChategoryController extends Controller
{
    //
    public function list()
    {
      return view('admin.chategory.list');
    }
    public function getListData($fid=0)
    {
      $return=[
        'code'=>2000,
        'msg'=>'成功'
      ];
      $list=Chategory::getCategoryByfid($fid);
      // dd($list);
      $return['data']=$list;
      return json_encode($return);
    }
    public function add()
    {
         $list=Chategory::getCategoryList();
        $assign['list']=ToolsAdmin::buildTreeString($list,0,0,'f_id');

    	return view('admin.chategory.add',$assign);
    }
    public function doAdd(Request $request){
        $params = $request->all();
        // dd($params);die;
        if(!isset($params['cate_name']) || empty($params['cate_name'])){
            return redirect()->back()->with('msg','商品分类名称不能为空');
        }
        unset($params['_token']);
        $res = Chategory::doAdd($params);
        if(!$res){
            return redirect()->back()->with('msg','商品分类名称添加失败');
        }
        return redirect('/admin/chategory/list');
    }
    public function del($id){
        $return=[
        'code'=>2000,
        'msg'=>'成功'
        ];
        $res=Chategory::del($id);
        if(!$res){
             $return=[
                    'code'=>4000,
                    'msg'=>'删除失败'
             ];
        }
        return json_encode($return);
    }
    public function edit($id){
        $assign['info']=Chategory::getCateInfo($id);//获取分类信息
        $list=Chategory::getCategoryList();

        $assign['list']=ToolsAdmin::buildTreeString($list,0,0,'f_id');
        return view('admin.chategory.edit',$assign);
    }
    public function doEdit(Request $request){
        $params = $request->all();
        // dd($params);die;
        if(!isset($params['cate_name']) || empty($params['cate_name'])){
            return redirect()->back()->with('msg','商品分类名称不能为空');
        }
        unset($params['_token']);
        $res = Chategory::doUpdate($params,$params['id']);
        if(!$res){
            return redirect()->back()->with('msg','商品分类名称修改失败');
        }
         return redirect('/admin/chategory/list');
    }
}
