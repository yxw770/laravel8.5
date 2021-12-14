<?php
/**
 * Created by PhpStorm.
 * Author:  Godfrey
 * Date:    2021-12-09
 * Time:    22:43
 * Email:   yxw770@gmail.com
 */
namespace Modules\Admin\Http\Controllers\v1;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Http\Requests\TestRequest;
use Modules\Common\Exceptions\ApiException;

class IndexController extends Controller
{
    /**
     * @throws ApiException
     */
    public function test(TestRequest $request)
    {
//        phpinfo();
//        DB::table("aaa")->get();
        throw new ApiException("23",5001);
        //添加数据到数据库发生的错误处理，也应当写入自定义异常
        return 222;
    }
}
