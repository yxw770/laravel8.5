<?php
/**
 * Created by PhpStorm.
 * Author:  Godfrey
 * Date:    2021-12-14
 * Time:    09:48
 * Email:   yxw770@gmail.com
 */

namespace Modules\Common\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * 模型基类
 * Author:  Godfrey
 * Date:    2021-12-14
 * Time:    09:49
 * Email:   yxw770@gmail.com
 * Class BaseModel
 * @package Modules\Common\Models
 */
class BaseModel extends EloquentModel
{
    /****
     * @Name   默认主键
     * @Author Godfrey<yxw770@gmail.com>
     * @Description
     * @Date 2021-12-14 09:49
     **/
    protected $primaryKey = 'id';
    /****
     * @Name id是否自增
     * @Author Godfrey<yxw770@gmail.com>
     * @Description
     * @Date 2021-12-14 09:50
     * @Return Bool
     **/
    public $incrementing = false;
    /***
     * @Name 主键类型
     * @Author Godfrey<yxw770@gmail.com>
     * @Description
     * @Date 2021-12-14 09:50
     * @Return String
     **/
    protected $keyType = 'int';
    /**
     * @Name    是否自动递增时间戳
     * @Author Godfrey<yxw770@gmail.com>
     * @Description
     * @Date 2021-12-14 09:51
     * @Return bool
     **/
    public $timestamps = false;
    /**
     * @Name 该字段可被批量赋值
     * @Author Godfrey<yxw770@gmail.com>
     * @Description
     * @Date 2021-12-14 09:51
     * @Return array
     **/
    protected $fillable = [];
    /**
     * @Name 该字段不可被批量赋值
     * @Author Godfrey<yxw770@gmail.com>
     * @Description
     * @Date 2021-12-14 09:51
     * @Return array
     **/
    protected $guarded = [];

    /**
     * @Name 时间格式传唤
     * @Author Godfrey<yxw770@gmail.com>
     * @Description
     * @Date 2021-12-14 09:52
     **/
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
