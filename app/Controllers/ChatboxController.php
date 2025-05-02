<?php
namespace App\Controllers;
use App\Models\Product;

class ChatboxController{

    public static function AI (){
        header('Content-Type: application/json');
        

        // Nhận câu hỏi người dùng
        $data = json_decode(file_get_contents("php://input"), true);
        $user_message = trim($data["message"] ?? "");

        if ($user_message === "") {
        echo json_encode(["reply" => "Bạn chưa nhập nội dung."]);
        exit;
        }

        // ====== TÌM SẢN PHẨM LIÊN QUAN ======
        // $keywords = ['Serum','Oil','Dry Skin','Oily Skin'];
        // $matchedProducts = [];

        // foreach ($keywords as $keyword) {
        //     if (stripos($user_message, $keyword) !== false) {
        //         $result =  Product::SearchProduct($keyword);
                
        //         $matchedProducts[] = $result;
                
                
        //     }
        // }

        $matchedProducts = Product::getAllProducts();

        // ====== TẠO PROMPT GỬI ĐẾN AI ======
        $productText = "";

        foreach ($matchedProducts as $p) {
            
                $productText .= "-".$p['Ten_SP'].":".$p['Mo_Ta']."Price:".$p['Gia']."\n";
            
        }

        // echo "<pre>";
        // echo print_r($productText, true);
        // echo "</pre>";
        

        $systemPrompt = "Bạn là tư vấn viên mỹ phẩm cho cửa hàng. Dưới đây là danh sách sản phẩm phù hợp:\n" . $productText;
        // if ($productText === "") {
        // $systemPrompt .= "\n(Hiện không có sản phẩm nào khớp từ khóa, nhưng bạn vẫn có thể tư vấn chung)";
        // }

        // ====== GỌI OPENAI API ======
        $api_key =trim("AIzaSyAMhDo1_cMR_qsgwuO_0m8-lEBpLqnTDkw");

        session_start();

        if (!isset($_SESSION['chat_history'])) {
            $_SESSION['chat_history'] = [];
        }

        // Nếu bạn có system prompt
        if (empty($_SESSION['chat_history'])) {
            $_SESSION['chat_history'][] = [
                "role" => "user",
                "parts" => [["text" => $systemPrompt]]
            ];
        }

        // Thêm tin nhắn người dùng
        $_SESSION['chat_history'][] = [
            "role" => "user",
            "parts" => [["text" => $user_message]]
        ];

        $data = [
            'contents' => $_SESSION['chat_history']
        ];

        file_put_contents("debug_payload.json", json_encode($data, JSON_PRETTY_PRINT));

        

        $ch = curl_init("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $api_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            $result = json_decode($response, true);
            $reply = $result['candidates'][0]['content']['parts'][0]['text'] ?? "Không có phản hồi từ Gemini.";
            $_SESSION['chat_history'][] = ["role" => "model", "parts" => [["text" => $reply]]];
        } else {
            $reply = "Lỗi khi gọi Gemini API: $httpCode\n$response";
        }

        // ====== PHẢN HỒI ======
        echo json_encode(["reply" => $reply]);
    }
}