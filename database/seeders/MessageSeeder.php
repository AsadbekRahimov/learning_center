<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
           [
               'key' => 'for_payment_info',
               'value' => 'Talaba uchun oyni oxirida to\'lanadigan sms xabar matni',
               'message' => 'O\'qish uchun to\'lov muddati keldi, tolovni tezroq amalga oshirishingizni soraymiz. Saxovat ta\'lim',

           ],
           [
               'key' => 'not_attand',
               'value' => 'Talaba darsga kelmagan vaqtda boradigan sms',
               'message' => 'Farzandingiz: @name  bugungi darsga kelmadi!  Xurmat bilan Saxovat ta\'lim',
           ]
        ];

        foreach ($messages as $message)
        {
            Message::query()->create([
                'key' => $message['key'],
                'value' => $message['value'],
                'message' => $message['message'],
            ]);
        }
    }
}
