<?php
namespace App\Controllers;

class Paypal{

    public function paypal_verify(){
        // Trả JSON
        header('Content-Type: application/json');

        // Disable lỗi (tránh hiển thị HTML khi lỗi PHP)
        ini_set('display_errors', 0);
        error_reporting(0);

        $clientId = "Aah1aCIFNDru_qqlCmL3Fl42XUfKPyBxkV6xiBy8KLDCIUNqaKfP5A1gr3EBfmZHlVC_29KKj-XXcx0U";
        $secret = "EA3iPEbNoqyWGWGTCLehHjqMIaSloxpuomjw_vcOxM_05fF6tsVjpLplNKilxzLNZPcy5yMC_6VFm-WK";
        $body = json_decode(file_get_contents('php://input'), true);
        if (!isset($body['orderID'])) {
            echo json_encode(['status' => 'fail', 'error' => 'Missing orderID']);
            exit;
        }
        $orderId = $body['orderID'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v2/checkout/orders/$orderId");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$secret");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo json_encode(['status' => 'fail', 'error' => curl_error($ch)]);
            curl_close($ch);
            exit;
        }
        curl_close($ch);

        $data = json_decode($response, true);
        file_put_contents('paypal_response.log', $response);

        if ($data['status'] === 'COMPLETED') {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'fail']);
        }
    }
}