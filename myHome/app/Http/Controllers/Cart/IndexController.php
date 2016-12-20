<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18 0018
 * Time: 下午 8:41
 */

namespace App\Http\Controllers\Cart;


use App\Bls\Cart\CartRecordBls;
use App\Bls\Cart\Model\CartRecordModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $data = (new CartRecordBls())->getListByPage($request->all());

        return \View::make('Cart.record', compact('data'));
    }

    public function create()
    {
        return \View::make('Cart.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        (new CartRecordBls())->store($input);

        return redirect()->route('cart.record')->withFlashMessage('添加成功')->withFlashType('success');
    }

    public function update(Request $request , $id)
    {
        $model = CartRecordModel::findOrFail($id);
        $model->fill($request->all());
        return $model->save();
    }

    public function edit($id)
    {
        $model = (new CartRecordBls())->findById($id);
        return \View::make('Cart.edit', compact('model'));
    }
}