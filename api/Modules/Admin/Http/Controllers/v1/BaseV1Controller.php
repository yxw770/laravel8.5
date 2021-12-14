<?php
/**
 * Created by PhpStorm.
 * Author:  Godfrey
 * Date:    2021-12-13
 * Time:    17:15
 * Email:   yxw770@gmail.com
 */


namespace Modules\Admin\Http\Controllers\v1;


use Modules\Admin\Http\Controllers\BaseApiController;

/**
 * APi v1接口基础控制器
 * Author:  Godfrey
 * Date:    2021-12-13
 * Time:    17:16
 * Email:   yxw770@gmail.com
 * Class BaseV1Controller
 * @package Modules\Admin\Http\Controllers\v1
 */
class BaseV1Controller extends BaseApiController
{
    public function __construct()
    {
        parent::__construct();
    }
}
