<?php

namespace common\helpers;
use DateTime;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
/**
 * Class Time
 * @package base\helpers
 */
class Time
{
    /**
     * @return false|string
     */
    public static function now()
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * @param $days
     * @return false|string
     */
    public static function futureDay($days)
    {
        return date('Y-m-d H:i:s', strtotime( "+$days days"));
    }

    public static function lastDay($days): string
    {
        return date('Y-m-d H:i:s', strtotime( "-$days days"));
    }


    /**
     * @return false|string
     */
    public static function nowShort()
    {
        return date("Y-m-d");
    }

    /**
     * @param $date
     * @param string $date2
     * @return \DateInterval|false
     * @throws \Exception
     */
    public static function diff($date, $date2 = 'now')
    {
        $datetime1 = new DateTime(date('Y-m-d H:i:s',strtotime($date)));
        $datetime2 = new DateTime($date2=='now'?$date2:date('Y-m-d H:i:s',strtotime($date2)));
        return $datetime2->diff($datetime1);
    }

    /**
     * @param $date
     * @param $date2
     * @return int
     * @throws \Exception
     */
    public static function diffYears($date, $date2 = 'now')
    {
        return  self::diff($date, $date2)->y;
    }

    /**
     * @param $date
     * @param $date2
     * @return int
     * @throws \Exception
     */
    public static function diffMonths($date, $date2 = 'now')
    {
        return  self::diff($date, $date2)->m;
    }

    /**
     * @param $date
     * @param $date2
     * @return int
     * @throws \Exception
     */
    public static function diffDays($date, $date2 = 'now')
    {
        return  self::diff($date, $date2)->d;
    }

    /**
     * @param $date
     * @param $date2
     * @return int
     * @throws \Exception
     */
    public static function diffHours($date, $date2 = 'now')
    {
        return  self::diff($date, $date2)->h;
    }

    /**
     * @param $date
     * @param $date2
     * @return int
     * @throws \Exception
     */
    public static function diffMinutes($date, $date2 = 'now')
    {
        return  self::diff($date, $date2)->i;
    }

    /**
     * @return mixed
     */
    public static function getCurrentWeekDay()
    {
        return ArrayHelper::getValue(self::days(),date('N'));
    }


    /**
     * @return array
     */
    public static function days()
    {
        return [
            1 => t("Понедельник"),
            t("Вторник"),
            t("Среда"),
            t("Четверг"),
            t("Пятница"),
            t("Суббота"),
            0 => t("Воскресенье")
        ];
    }

    /** 2-yil, 2-oy, 2-kun formatida qaytaradi.
     * @param $timestamp
     * @param int $level
     * @return string
     * @throws \Exception
     */
    public static function since($timestamp, $level = 3)
    {
        $lang = self::getDatetimeLang();
        $date = new DateTime();
        $date->setTimestamp($timestamp);
        $date = $date->diff(new DateTime());
        // build array
        $since = Json::decode($date->format('{"year":%y,"month":%m,"day":%d,"hour":%h,"minute":%i,"second":%s}'), true);
        // remove empty date values
        $since = array_filter($since);
        // output only the first x date values
        $since = array_slice($since, 0, $level);
        // build string
        $last_key = key(array_slice($since, -1, 1, true));
        $string = '';
        foreach ($since as $key => $val) {
            // separator
            if ($string) {
                $string .= $key != $last_key ? ', ' : ' , ';
            }
            $string .= $val . ' - ' . $lang[$key];
        }
        return $string;
    }

    /**
     * @return array
     */
    public static function getDatetimeLang()
    {
        return [
            'second' => t('секунд'),
            'minute' => t('минут'),
            'hour' => t('час'),
            'day' => t('день'),
            'month' => t('месяц'),
            'year' => t('год'),
        ];
    }

    /**
     * @param $day
     * @return string
     */
    public static function getDayText($day)
    {
        return t("{n,plural, one{# день} few{# дня} many{# дней} other{# дня}}", ["n" => $day]);
    }

    /**
     * @param $minute
     * @return string
     */
    public static function getMinuteText($minute)
    {
        return t("{n,plural, one{# минута} few{# минуты} many{# минут} other{# минуты}}", ["n" => $minute]);
    }

    /**
     * @param $hour
     * @return string
     */
    public static function getHourText($hour)
    {
        return t("{n,plural, one{# час} few{# часа} many{# часов} other{# часа}}", ["n" => $hour]);
    }

    /**
     * @param $month
     * @return string
     */
    public static function getMonthText($month)
    {
        return t("{n,plural, one{# месяц} few{# месяца} many{# месяцев} other{# месяца}}", ["n" => $month]);
    }

    /**
     * @param $year
     * @return string
     */
    public static function getYearText($year)
    {
        return t("{n,plural, one{# год} few{# года} many{# лет} other{# года}}", ["n" => $year]);
    }

    /**
     * @param $m
     * @return mixed
     */
    public static function getSingleMonth($m){
        return ArrayHelper::getValue(self::getMonth(),$m);
    }

    /**
     * @param $m
     * @return mixed
     */
    public static function getSingleShortMonth($m){
        return ArrayHelper::getValue(self::getShortMoth(),$m);
    }


    /**
     * @return array
     */
    public static function getMonth()
    {
        return  [
            1=>t("Январь"),
            2=>t("Февраль"),
            3=>t("Март"),
            4=>t("Апрель"),
            5=>t("Май"),
            6=>t("Июнь"),
            7=>t("Июль"),
            8=>t("Август"),
            9=>t("Сентябрь"),
            10=>t("Октябрь"),
            11=>t("Ноябрь"),
            12=>t("Декабрь")
        ];
    }

    /**
     * @return array
     */
    public static function getShortMoth()
    {
        return [
            1=>t("Янв"),
            t("Фев"),
            t("Мар"),
            t("Апр"),
            t("Май"),
            t("Июн"),
            t("Июл"),
            t("Авг"),
            t("Сен"),
            t("Окт"),
            t("Ноя"),
            t("Дек")
        ];
    }

}


























