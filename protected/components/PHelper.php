<?php
/**
 * @package Analytics
 * @date 20.08.13 11:11
 */ 
class PHelper{

    /**
     * Convert string to array
     *
     * @access public
     * @static
     * @param $string
     * @return array
     */
    public static function string2array($string)
    {
        return preg_split('/\s*,\s*/', trim($string), -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Explode array elements
     *
     * @access public
     * @static
     * @param $array
     * @param string $exp
     * @return string
     */
    public static function array2string($array, $exp = ', ')
    {
        return implode($exp, $array);
    }

    /**
     * Convert string to url
     *
     * @access public
     * @static
     * @param $string
     * @return string
     */
    public static function string2url($string)
    {
        $slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $string);
        $slug = mb_strtolower($slug);
        $slug = trim($slug, '-');
        return $slug;
    }

    /**
     * Sanitize string
     *
     * @access public
     * @static
     * @param $string
     * @return string
     */
    public static function sanitize($string)
    {
        $string = strip_tags($string);
        $string = addslashes($string);
        $string = htmlspecialchars($string);
        $string = trim($string);
        return $string;
    }

    /**
     * Get array of year weeks
     *
     * @access public
     * @static
     * @return array
     */
    public static function getWeekRange()
    {
        $year = date('Y');
        $weeksCount = self::getWeeksCount($year);
        $week = Yii::t('app', 'Week');
        $firstYearDay = getdate(strtotime($year.'-01-01'));
        if($firstYearDay['wday'] != 1)
        {
            $diff = ($firstYearDay['wday'] > 0) ? $firstYearDay['wday'] - 1 : 6;
            $start = getdate(strtotime('-'.$diff.' days', $firstYearDay[0]));
        }
        else
        {
            $start = getdate($firstYearDay[0]);
        }
        $range = array();
        $end = array();
        for($i = 1; $i <= $weeksCount; $i ++)
        {
            if($i != 1)
            {
                $start = getdate(strtotime('+1 day', $end[0]));
            }
            $end = getdate(strtotime('+6 days', $start[0]));
            $start['mon'] = ($start['mon'] < 10) ? '0'.$start['mon'] : $start['mon'];
            $start['mday'] = ($start['mday'] < 10) ? '0'.$start['mday'] : $start['mday'];
            $end['mon'] = ($end['mon'] < 10) ? '0'.$end['mon'] : $end['mon'];
            $end['mday'] = ($end['mday'] < 10) ? '0'.$end['mday'] : $end['mday'];
            $range[$start[0]] = $week.' '.$i.' '.$year.' ('.$start['mon'].'/'.$start['mday'].' - '.$end['mon'].'/'.$end['mday'].')';
        }
        return $range;
    }

    /**
     * Get count of week in year
     *
     * @access public
     * @static
     * @param $year
     * @return int
     */
    public static function getWeeksCount($year){
        //this years has 53 weeks, not listed years has - 52 weeks
        $longYears = array(
            '2004', '2009', '2015', '2020', '2026', '2032', '2037', '2043', '2048'
        );
        return (in_array($year, $longYears)) ? 53 : 52;
    }
}
