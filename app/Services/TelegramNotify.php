<?php


namespace App\Services;


use Illuminate\Support\Str;

class TelegramNotify
{
    public static function sendMessage($text, $caption, $branch)
    {
        $url = "https://api.telegram.org/bot5481222336:AAH8AyF-giOJ3cQEgk6fa5bj259IEDOQHfA/sendMessage?chat_id=-1001701186048";

        $post_fields = [
            'chat_id' => '-1001701186048',
            'text' => $text . "\r\n" . '#' . Str::slug($branch, '_') . "\r\n" . '#' . $caption,
            'parse_mode' => "HTML",
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        $output = curl_exec($ch);
        return $output;
    }
}
