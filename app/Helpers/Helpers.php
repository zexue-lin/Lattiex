<?php

/*
 公共函数
*/

if (!function_exists('build_ranstr')) {
    /**
     * 获得随机字符串
     * @param Number $len 需要的长度
     * @param Bool $special 是否需要特殊符号
     * @return  String  返回随机字符串
     */
    function build_ranstr($len = 8, $special = false)
    {
        $chars = array(
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
            "3", "4", "5", "6", "7", "8", "9"
        );

        if ($special) {
            $chars = array_merge($chars, array(
                "!", "@", "#", "$", "?", "|", "{", "/", ":", ";",
                "%", "^", "&", "*", "(", ")", "-", "_", "[", "]",
                "}", "<", ">", "~", "+", "=", ",", "."
            ));
        }

        $charsLen = count($chars) - 1;
        shuffle($chars);                            //打乱数组顺序
        $str = '';
        for ($i = 0; $i < $len; $i++) {
            $str .= $chars[mt_rand(0, $charsLen)];    //随机取出一位
        }
        return $str;
    }
}

if (!function_exists('check_input')) {
    /**
     * Desc : 安全过滤函数
     * User : Lattiex
     * Date : 2024-02-29 13:45
     * @param String $str 输入的字符串
     * @return array|string|string[]
     */

    function check_input($str)
    {
        $str = str_replace("\r\n", "", $str);
        $str = str_replace("\n", "", $str);
        $str = str_replace("\r", "", $str);
        $str = str_replace("'", "&#39", $str);
        $str = str_replace("\"", " ", $str);
        $str = str_replace("'\'", " ", $str);
        $str = str_replace("\'", " ", $str);
        $str = str_replace("<", "＜", $str);
        $str = str_replace(">", "＞", $str);
        // $str = str_replace("php", "", $str);
        //$str = str_replace("?","？",$str);
        $str = str_replace("eval", "", $str);
        // $str = str_replace("%","％",$str);
        // $str = str_replace("$", "", $str);
        $str = str_replace("script", " ", $str);
        // $str = str_replace("="," ",$str);
        $str = str_replace("and", " ", $str);
        $str = str_replace("select", " ", $str);
        $str = str_replace("delete", " ", $str);
        $str = str_replace("update", " ", $str);
        $str = str_replace("|", " ", $str);
        $str = str_replace("&", " ", $str);
        $str = str_replace(";", " ", $str);
        // $str = str_replace("@"," ",$str);
        $str = str_replace('"', " ", $str);
        $str = str_replace("()", " ", $str);
        // $str = str_replace("+"," ",$str);
        $str = str_replace("CR", " ", $str);
        $str = str_replace("LF", " ", $str);
        $str = str_replace(",", " ", $str);
        return $str;
    }
}

