<?php

namespace App\Helpers;

use Illuminate\Contracts\Support\MessageBag;
use Laracasts\Flash\flash;
use Session;

final class SessionHelper
{
    const GLOBAL_ERROR_MSG = 'Unable to process. Please contact system Administrator';
    const GLOBAL_SUCCESS_MSG = 'Process Successfully';

    public static function setMessage(
        $msg = self::GLOBAL_ERROR_MSG,
        $style = 'success',
        $important = false
    ) {
        return $important ?
            flash(self::prettifyMessage($msg), $style)->important() :
            flash(self::prettifyMessage($msg), $style);
    }

    public static function prettifyMessage($msg)
    {
        $result = '';
        if (gettype($msg) == 'string') {
            return self::prettifyMessage([$msg]);
        }
        if (gettype($msg) == 'object' && $msg instanceof MessageBag) {
            $messages = $msg->getMessages();
            foreach ($messages as $key => $message) {
                $result .= self::prettifyMessage($message);
            }

            return $result;
        }
        if (gettype($msg) == 'array') {
            $result = '<ul>';
            foreach ($msg as $value) {
                $result .= '<li>' . $value . '</li>';
            }
            $result .= '</ul>';

            return $result;
        }
    }

}