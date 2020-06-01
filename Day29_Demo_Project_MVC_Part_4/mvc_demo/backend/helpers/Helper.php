<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 5/2/2020
 * Time: 10:14 AM
 */
class Helper
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE_TEXT = 'Active';
    const STATUS_DISABLED_TEXT = 'Disabled';

    /**
     * Get status text
     * @param int $status
     * @return string
     */
    public static function getStatusText($status = 0) {
        $status_text = '';
        switch ($status) {
            case self::STATUS_ACTIVE:
                $status_text = self::STATUS_ACTIVE_TEXT;
                break;
            case self::STATUS_DISABLED:
                $status_text = self::STATUS_DISABLED_TEXT;
                break;
        }
        return $status_text;
    }

}