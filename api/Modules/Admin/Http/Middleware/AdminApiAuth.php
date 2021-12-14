<?php
/**
 * Created by PhpStorm.
 * Author:  Godfrey
 * Date:    2021-12-09
 * Time:    17:56
 * Email:   yxw770@gmail.com
 */
namespace Modules\Admin\Http\Middleware;


use Closure;
class AdminApiAuth
{
    public function handle($request,Closure $next)
    {

        return $next($request);
    }
}
