<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/8
 * Time: 10:00
 */

namespace App\Http\Controllers\Download\Validations;

use App\Http\Requests\Request;

class DownloadFormValidation extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hostName' => 'required',
            'hostPort' => 'integer',
            'userName' => 'required',
            'dbName' => 'required',
            'tbName' => 'required',
            'fileType' => 'required',
            'limit' => 'integer|min:0'
        ];
    }

    public function messages()
    {
        return [
            'hostName.required' => '访问主机名为必填',
            'userName.required' => '用户名认证为必填',
            'dbName.required' => '导出数据库为必选',
            'tbName.required' => '导出列表为必选',
            'fileType.required' => '导出文件类型为必选',
            'limit.integer' => '条数限制为整数',
            'hostPort.integer' => '端口为整数',
            'limit.min' => '条数限制最小为1,0表示不限制',
        ];
    }
}