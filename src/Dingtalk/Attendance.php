<?php
// +------------------------------------------------+
// |http://www.cjango.com                           |
// +------------------------------------------------+
// | 修复BUG不是一朝一夕的事情，等我喝醉了再说吧！  |
// +------------------------------------------------+
// | Author: 小陈叔叔 <Jason.Chen>                  |
// +------------------------------------------------+
namespace cjango\Dingtalk;

use cjango\Dingtalk;

/**
 * 考勤打卡
 */
class Attendance extends Dingtalk
{

    /**
     * 获取考勤打卡数据
     * @param  dateTime $from   考勤开始时间
     * @param  dateTime $to     考勤结束时间 跨度不能超过7天
     * @param  string   $userId 用户userid
     * @return array|boolean
     */
    public static function get($from, $to, $userId = null)
    {
        $params = [
            'workDateFrom' => $from,
            'workDateTo'   => $to,
        ];
        if (!is_null($userId)) {
            $params['userId'] = $userId;
        }

        $result = Utils::post('attendance/list', $params);

        if (false !== $result) {
            return $result['recordresult'];
        } else {
            return false;
        }
    }
}
