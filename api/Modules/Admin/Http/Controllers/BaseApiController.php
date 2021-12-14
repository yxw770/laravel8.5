<?php
/**
 * Created by PhpStorm.
 * Author:  Godfrey
 * Date:    2021-12-13
 * Time:    17:13
 * Email:   yxw770@gmail.com
 */


namespace Modules\Admin\Http\Controllers;


use Modules\Common\Controllers\BaseController;

/**
 * Api接口基础控制器
 * Author:  Godfrey
 * Date:    2021-12-13
 * Time:    17:14
 * Email:   yxw770@gmail.com
 * Class BaseApiController
 * @package Modules\Admin\Http\Controllers
 */
class BaseApiController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
}
