<?php

namespace frontend\components\helpers\useragentparser;

class UserAgent
{

    public $bname = 'Unknown';
    public $platform = 'Unknown';
    public $version= '';


    public static function definedAgent($useragent)
    {
        return isset($useragent) ? $useragent : $_SERVER['HTTP_USER_AGENT'];
    }

    public static function getPlatform($useragent)
    {
        $ua = self::definedAgent($useragent);
        if (preg_match('/linux/i', $ua)) {
            $platform = 'Linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $ua)) {
            $platform = 'MacOS';
        }
        elseif (preg_match('/windows|win32/i', $ua)) {
            $platform = 'Windows';
        }

        if (preg_match('/Windows NT ([0-9.]+)/', $ua, $matches)) {
            $version = $matches[1];
        } elseif (preg_match('/Mac OS X ([0-9_]+)/', $ua, $matches)) {
            $version = str_replace('_', '.', $matches[1]);
        } elseif (preg_match('/Android ([0-9.]+)/', $ua, $matches)) {
            $version = "Android " . $matches[1];
        }
        
        return [
            'name' => $platform,
            'version' => number_format($version, 0, ',', '')
        ];
    }

    public static function getBrowser($useragent)
    {
        $ua = self::definedAgent($useragent);
        if(preg_match('/MSIE/i', $ua) && !preg_match('/Opera/i', $ua)) 
        { 
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        } 
        elseif(preg_match('/Firefox/i', $ua)) 
        { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        } 
        elseif(preg_match('/Chrome/i', $ua)) 
        { 
            $bname = 'Google Chrome'; 
            $ub = "Chrome"; 
        } 
        elseif(preg_match('/Safari/i', $ua)) 
        { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        } 
        elseif(preg_match('/Opera/i', $ua)) 
        { 
            $bname = 'Opera'; 
            $ub = "Opera"; 
        } 
        elseif(preg_match('/Netscape/i', $ua)) 
        { 
            $bname = 'Netscape'; 
            $ub = "Netscape"; 
        }

        return [
            'bname' => $bname, 
            'ub'=> $ub
        ];
    }

    public static function getVersion($useragent)
    {
        $ua = self::definedAgent($useragent);
        $browserVersion = "Unknown";
        if (preg_match('/MSIE (\\d+\\.\\d+);/', $ua, $matches)) {
            $browserVersion = $matches[1];
        } elseif (preg_match('/Firefox\\/(\\d+\\.\\d+)/', $ua, $matches)) {
            $browserVersion = $matches[1];
        } elseif (preg_match('/Chrome\\/(\\d+\\.\\d+)/', $ua, $matches)) {
            $browserVersion = $matches[1];
        } elseif (preg_match('/Safari\\/(\\d+\\.\\d+)/', $ua, $matches)) {
            $browserVersion = $matches[1];
        } elseif (preg_match('/Opera\\/(\\d+\\.\\d+)/', $ua, $matches)) {
            $browserVersion = $matches[1];
        }
        $result = is_numeric($browserVersion) ? 
            number_format($browserVersion, 0, ',', '') : 
            $browserVersion;

        return $result;
    }

    public static function parser($useragent)
    {
        $ua = self::definedAgent($useragent);
        $platform = self::getPlatform($ua);
        $browser = self::getBrowser($ua);
        $version = self::getVersion($ua);

        return [
            'userAgent' => $ua,
            'browser'   => $browser,
            'version'   => $version,
            'platform'  => $platform
        ];
    }

    public static function view($useragent)
    {
        $ua = self::definedAgent($useragent);
        $res = self::parser($ua);
        $platform = $res['platform'];
        $browser = $res['browser']['bname'];
        $version = $res['version'];
        return $platform['name'].' '.$platform['version'].', '.$browser.' '.$version;
    }

}