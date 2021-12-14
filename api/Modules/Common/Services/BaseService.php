<?php
/**
 * Created by PhpStorm.
 * Author:  Godfrey
 * Date:    2021-12-14
 * Time:    10:03
 * Email:   yxw770@gmail.com
 */

namespace Modules\Common\Services;

use Modules\Common\Exceptions\ApiException;
use Modules\Common\Exceptions\MessageData;

/**
 * 基础服务类库
 * Author:  Godfrey
 * Date:    2021-12-14
 * Time:    10:03
 * Email:   yxw770@gmail.com
 * Class BaseService
 */
class BaseService
{
    /**
     * 基础构造方法
     * BaseService constructor.
     */
    public function __construct()
    {
    }

    /**
     * @name 公共模型查询条件
     * @param object $model 模型对象
     * @param array $params 查询参数
     * @param string $key 键值模糊查找
     * @return Object
     * @author Godfrey<yxw770@gmail.com>
     * @description
     * @date 2021-12-14 10:20
     * @method  GET
     */
    function queryCondition(object $model, array $params, string $key = "username"): object
    {
        if (!empty($params['create_at'])) {
            $model = $model->whereBetween('create_at', $params['create_at']);
        }
        if (!empty($params['update_at'])) {
            $model = $model->whereBetween('update_at', $params['update_at']);
        }
        if (!empty($params[$key])) {
            $model = $model->where($key, 'like', '%' . $params[$key] . '%');
        }
        if (isset($params['status']) && $params['status'] != '') {
            $model = $model->where('status', $params['status']);
        }

        return $model;
    }

    /**
     * @name  公共模型插入数据
     * @param object $model 模型对象
     * @param array $data 插入数据
     * @param string $successMessage 成功返回信息
     * @param string $errorMessage 错误返回信息
     * @return \json|string
     * @throws ApiException
     * @author Godfrey<yxw770@gmail.com>
     * @description
     * @date 2021-12-14 11:10
     */
    public function commonCreate(object $model, array $data = [], string $successMessage = MessageData::ADD_API_SUCCESS, string $errorMessage = MessageData::ADD_API_ERROR)
    {
        $data['create_at'] = time();
        if ($model->insert($data)) {
            return JSuccess($successMessage);
        }
        RetError($errorMessage);
    }

    /**
     * @name  公共模型更新数据
     * @param object $model 模型对象
     * @param array $condition 条件
     * @param array $data 插入数据
     * @param string $successMessage 成功返回信息
     * @param string $errorMessage 错误返回信息
     * @return \json|string
     * @throws ApiException
     * @author Godfrey<yxw770@gmail.com>
     * @description
     * @date 2021-12-14 11:14
     */
    public function commonUpdate(object $model, array $condition, array $data = [], string $successMessage = MessageData::UPDATE_API_SUCCESS, string $errorMessage = MessageData::UPDATE_API_ERROR)
    {
        $data['update_at'] = time();
        if ($model->where($condition)->update($data)) {
            return JSuccess($successMessage);
        }
        RetError($errorMessage);
    }

    /**
     * @name  公共模型硬删除数据
     * @param object $model 模型对象
     * @param array $condition 条件数组
     * @param string $successMessage 成功返回信息
     * @param string $errorMessage 错误返回信息
     * @return \json|string
     * @throws ApiException
     * @author Godfrey<yxw770@gmail.com>
     * @description
     * @date 2021-12-14 11:23
     */
    public function commonDestroy(object $model, array $condition, string $successMessage = MessageData::DELETE_API_SUCCESS, string $errorMessage = MessageData::DELETE_API_ERROR)
    {
        if ($model->where($condition)->delete()) {
            return JSuccess($successMessage);
        }
        RetError($errorMessage);
    }

    /**
     * @name  公共模型软删除数据
     * @param object $model 模型对象
     * @param array $condition 条件数组
     * @param string $successMessage 成功返回信息
     * @param string $errorMessage 错误返回信息
     * @return \json|string
     * @throws ApiException
     * @author Godfrey<yxw770@gmail.com>
     * @description
     * @date 2021-12-14 11:25
     */
    public function commonSoftDelete(object $model, array $condition, string $successMessage = MessageData::DELETE_API_SUCCESS, string $errorMessage = MessageData::DELETE_API_ERROR)
    {
        if ($model->where($condition)->update(['is_del' => 1, 'delete_at' => time()])) {
            return JSuccess($successMessage);
        }
        RetError($errorMessage);
    }

    /**
     * @name    软删除恢复数据
     * @param object $model 模型对象
     * @param array $condition 条件
     * @param string $successMessage 成功返回信息
     * @param string $errorMessage 错误返回新
     * @return mixed
     * @throws ApiException
     * @author Godfrey<yxw770@gmail.com>
     * @description
     * @date 2021-12-14 11:27
     */
    public function commonRecSoftDelete(object $model, array $condition, string $successMessage = MessageData::DELETE_RECYCLE_API_SUCCESS, string $errorMessage = MessageData::DELETE_RECYCLE_API_ERROR)
    {
        if ($model->where($condition)->update(['is_del' => 0])) {
            return JSuccess($successMessage);
        }
        RetError($errorMessage);
    }
}
