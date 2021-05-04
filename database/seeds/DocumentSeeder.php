<?php

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'product_oid' => 2247,
            'language' => 'zh-tw',
            'context' => [
                'name' => '【JTR-USJ測試商品】【非相關測試人員請勿下單】【官方授權】日本環球影城™ 電子門票',
                'introduction' => '日本環球影城™一日電子門票，入場掃描電子憑證上QRcode即可入園，省去現場排隊買票時間，讓你更有時間暢玩哈利波特魔法世界、小小兵樂園、飛天翼龍等經典設施，盡情體驗電影中的奇幻世界。',
                'description' => '－ 行程特色 －\n\n・日本大阪環球影城™官方授權門票，中文介面讓您輕鬆訂購\n・訂購後 2 小時內拿到電子門票！現場掃QRcode即可入園遊玩\n・有效期限內可任選一天入園，不需指定日期，保有行程絕佳彈性\n\n\n\n－ 使用說明 －\n\n．使用對象：限非日本國籍購買\n．兌換期限：有效期限內，可任選一日入園\n．有效期限：即日起至2019年01月09日止\n．營業時間：9:00am-9:00pm \n．地址：554-0031 Osaka Prefecture, Osaka, Konohana Ward, Sakurajima, 2-1-33\n．如何抵達：大阪市區搭乘JR環狀線，於西九條站換乘JR櫻島線，在UniversalCity站下車，徒步三分鐘即達\n\n\n\n－ 票券介紹 －\n\n日本環球影城® （Universal Studios Japan® ）是一座以好萊塢電影為主題的大型樂園，更是去大阪旅遊不能錯過的世界級主題樂園。園區內代表性的遊樂設施有哈利波特禁忌之旅、小小兵・瘋狂乘車遊、飛天翼龍、好萊塢美夢・乘車遊等，快來親身感受這世界級的娛樂體驗吧！\n\n\n\n－ 方案介紹 －\n\n．成人票：12歲至64歲\n．孩童票：4歲至11歲\n＊0-3歲幼兒免費入園，KKday無販售65歲以上敬老票。\n\n\n\n－ 重要資訊 － \n\n．此票券一旦付款成功，將無法退換或更改\n．此票券有效期限內，可任選一日入園，將不需指定入園時間\n．此票券只提供給非日本、韓國國籍的旅客購買\n\n\n\n－ 兌換方式 －\n \n1. 訂單成立後，在訂購人email信箱內收到電子門票。\n2. 收到電子門票後建議列印出來，當天入園時掃描 QR code 直接入場。',
                'reminders' => [
                    '日本超熱門景點，建議遊玩當天盡早前往，避免部分設施等候時間過長',
                    '根據日本環球影城管理規定，除環球影城年票以外，其他種類的門票不得重複入場',
                    '日本環球影城營業時間，會隨季節變換略有調整'
                ],
                'locations' => [
                    '554-0031 Osaka Prefecture, Osaka, Konohana Ward, Sakurajima, 2-1-33'
                ],
                'price_detail' => [
                    '日本環球影城™ 電子入園門票'
                ],
                'packages' => [
                    78112 => ' 日本環球影城™ 電子入園門票 （1/09前） ',
                    78113 => ' 日本環球影城™ 電子入園門票 - 票價A（1/10起） '
                ]
            ],
            'status' => 0,
            'created_by' => 'sean.hsu@kkday.com',
            'updated_by' => 'sean.hsu@kkday.com'
        ]);

        Document::create([
            'product_oid' => 2247,
            'language' => 'en',
            'context' => [
                'name' => '【TMON TEST】Universal Studios Japan Ticket',
                'introduction' => 'Skip the lines and scan your QR code to enter the thrilling world of Universal Studios Japan! Take on an adventure in the Wizarding World of Harry Potter or plunge into the Despicable Me Minion Mayhem ride with your USJ ticket!',
                'description' => '— Highlights —\n\n• Skip the line and scan your QR code to enter Universal Studios Japan\n• Enter Gru’s laboratory at the Despicable Me Minion Mayhem ride \n• Taste butterbeer at Hog’s Head Pub in the Wizarding World of Harry Potter\n• Ride the Flying Dinosaur in Jurassic Park, the world’s longest “flying” roller coaster\n• Immerse yourself in the high-tech 4K3D ride, “The Amazing Adventures of Spiderman”\n\n\n\n— What You Can Expect — \n\nStep inside the cinematic world of Universal Studios Japan with guaranteed access by simply showing your QR Code. Meet your favorite characters here in USJ in nine different themed areas that include Water World, The Wizarding World of Harry Potter, Minion Park, and Amityville.\n\nRide through the skies with Harry Potter in the Flight of the Hippogriff. Buy your own wand at Ollivanders and cast spells throughout the park! \n\nYou can also fly through the sky with the world’s most beloved beagle in The Flying Snoopy or go on a boat ride with Elmo in Elmo’s Bubble Bubble. \n\nTo end the night, catch the Universal Spectacle Night Parade. With 105 acres of pure entertainment, Universal Studios Japan is perfect for kids and adults alike!\n\n\n\n- Important Info - \n\n・Voucher is only valid for selected dates and time slots\n・Adult ticket fee: 12 - 64 years old\n・Child ticket fee: 4 - 11 years old\n・Tickets are valid until January 9, 2019 \n・Service Hours: 9:00am - 9:00pm \n・Address: 554-0031 Osaka Prefecture, Osaka, Konohana Ward, Sakurajima\n・How To Get There: Take the JR Loop Line from Osaka City. Stop at Nishikujo Station and transfer to the JR Sakurajima Line. Get off at Universal City Station. From there, it will be a 3 minute walk to Universal Studios Japan\n・Voucher is only valid for non-Japan passport holders\n\n\n\n- Additional Info- \n\n・Free admission for children ages 3 and under\n・KKday does not offer tickets for senior citizens\n・No changes or cancellations can be made once your booking is confirmed\n\n\n\n- How to Redeem Your Voucher - \n\n・Print and show your voucher at designated location\n・Scan the QR code to enter the park',
                'reminders' => [
                    'It is recommended to arrive at Universal Studios early to avoid queuing in line ',
                    'Any pass other than the official Universal Studios Japan pass is not valid for entry',
                    'Service hours of the park may vary depending on the season'
                ],
                'locations' => [
                    '554-0031 Osaka Prefecture, Osaka, Konohana Ward, Sakurajima, 2-1-33'
                ],
                'price_detail' => [
                    'Universal Studios Japan Ticket'
                ],
                'packages' => [
                    78112 => ' 日本環球影城™ 電子入園門票 （1/09前） ',
                    78113 => ' 日本環球影城™ 電子入園門票 - 票價A（1/10起） '
                ]
            ],
            'status' => 0,
            'created_by' => 'sean.hsu@kkday.com',
            'updated_by' => 'sean.hsu@kkday.com'
        ]);
    }
}
