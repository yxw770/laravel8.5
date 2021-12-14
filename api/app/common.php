<?php
/**
 * 公共函数库
 *
 * Created by PhpStorm.
 * Author:  Godfrey
 * Date:    2021-12-10
 * Time:    10:53
 * Email:   yxw770@gmail.com
 */

use Modules\Common\Exceptions\ApiException;
use Modules\Common\Exceptions\CodeData;
use Modules\Common\Exceptions\MessageData;
use Modules\Common\Exceptions\StatusData;


/**
 * 返回接口数据
 *
 * @param int $code 状态码
 * @param string $msg 返回信息
 * @param array $data 数据
 * @param string $url 回访地址
 *
 * @return string json数据
 */
function J($code, $msg = '', $data = [], $url = null,$status=200)
{
    $return = [
        'code' => $code,
        'msg' => $msg,
        'data' => $data,
        'url' => $url,
        'timestamp' => time(),
    ];

    return response()
        ->json($return,$status)
        ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
}

/**
 * @name 返回成功
 * @param string $msg   返回信息
 * @param array $data   返回数据
 * @param int $code     返回状态码
 * @return json
 * @author Godfrey<yxw770@gmail.com>
 * @description
 * @date 2021-12-14 11:02
 */
function JSuccess(string $msg =MessageData::Ok,array $data = array(),int $code = StatusData::Ok){

    return J($code,$msg,$data,null,CodeData::OK);
}

/**
 * @name    返回失败
 * @param string $msg   返回信息
 * @param array $data   返回数据
 * @param int $code     返回状态码
 * @return json
 * @author Godfrey<yxw770@gmail.com>
 * @description
 * @date 2021-12-14 11:03
 * @method  GET
 */
function JFail(string $msg = MessageData::API_Fail,array $data = array(),int $code = StatusData::Fail){

    return J($code,$msg,$data,null,CodeData::OK);
}

/**
 * @name  请求错误抛出异常
 * @param string $msg   错误信息
 * @param array $data   数据
 * @param int $code     状态码
 * @throws ApiException
 * @author Godfrey<yxw770@gmail.com>
 * @description
 * @date 2021-12-14 11:09
 */
function RetError(string $msg = MessageData::API_ERROR_EXCEPTION,array $data = array(),int $code = StatusData::BAD_REQUEST){

    throw new ApiException([
        'status' => $code,
        'message'=> $msg,
        'data'=>$data
    ]);
}

/**
 * @name 获取当前域名
 * @return String
 * @author Godfrey<yxw770@gmail.com>
 * @description
 * @date 2021-12-14 11:29
 */
function getHttp():String
{
    $http = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    return $http.$_SERVER['HTTP_HOST'];
}

/**
 * @name 获取用户真实 ip
 * @return array|mixed|string
 * @author Godfrey<yxw770@gmail.com>
 * @description
 * @date 2021-12-14 11:33
 */
function getClientIp()
{
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    }
    if (getenv('HTTP_X_REAL_IP')) {
        $ip = getenv('HTTP_X_REAL_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
        $ips = explode(',', $ip);
        $ip = $ips[0];
    } elseif (getenv('REMOTE_ADDR')) {
        $ip = getenv('REMOTE_ADDR');
    } else {
        $ip = '0.0.0.0';
    }
    if(!$ip){
        return '';
    }
    return $ip;
}
