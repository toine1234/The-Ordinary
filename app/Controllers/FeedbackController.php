<?php 
namespace App\Controllers;
use App\Models\Feedback;
use Cloudinary\Api\Upload\UploadApi;

class FeedbackController{

    public function addFeedback(){
        
        $imageUrls = [];

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] === 0) {
                $result = (new UploadApi())->upload($tmp_name, [
                    'folder' => 'product_gallery'
                ]);

                $imageUrls[] = $result['secure_url'];
            }
        }

        $imageUrlsStr = implode(';', $imageUrls);
        session_start();
        $data = [
            "id"=> $_POST['id'],
            "idUser" => $_SESSION['idUser'],
            'rating'=> $_POST['rating'],
            'comments'=> $_POST['comments'],
            'skintype'=> $_POST['skin-type'],
            'skintone'=> $_POST['skin-tone'],
            'images' => $imageUrlsStr
        ];

        try{
            Feedback::add($data);
            header('Location: /The-Ordinary/product?id='.$_POST['id']);
        }

        catch(\Exception $e){
            echo $e->getMessage();
        }
    }


}