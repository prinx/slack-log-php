<?php

/*
 * This file is part of the Slack log package.
 *
 * (c) Prince Dorcis <princedorcis@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Prinx;

use Symfony\Component\HttpClient\HttpClient;
use Throwable;
use function Prinx\Dotenv\env;

/**
 * Simple log to slack.
 *
 * @author Prince Dorcis <princedorcis@gmail.com>
 */
class SlackLog
{
    /**
     * HTTP Client.
     *
     * @var \Symfony\Component\HttpClient\HttpClient
     */
    protected static $httpClient;

    /**
     * Log to Slack.
     *
     * @param string|array $message
     * @param string       $level
     *
     * @return void
     */
    public static function log($message, $level = 'info', $env = 'SLACK_LOG')
    {
        if (!($url = env($env.'_WEBHOOK', null)) || env($env.'_ENABLED', false) === false) {
            return;
        }

        try {
            $message = is_string($message) ? $message : json_encode($message);

            static::getLogger()->request('POST', $url, [
                'json' => [
                    'text' => '['.strtoupper($level).'] ['.date('D, d m Y, H:i:s')."]\n".$message,
                ],
            ]);
        } catch (Throwable $th) {
        }
    }

    public static function getLogger()
    {
        return static::$httpClient ?: static::$httpClient = HttpClient::create();
    }

    public static function emergency($message)
    {
        self::log($message, 'emergency');
    }

    public static function alert($message)
    {
        self::log($message, 'alert');
    }

    public static function critical($message)
    {
        self::log($message, 'critical');
    }

    public static function error($message)
    {
        self::log($message, 'error');
    }

    public static function warning($message)
    {
        self::log($message, 'warning');
    }

    public static function notice($message)
    {
        self::log($message, 'notice');
    }

    public static function info($message)
    {
        self::log($message, 'info');
    }

    public static function debug($message)
    {
        self::log($message, 'debug');
    }
}
