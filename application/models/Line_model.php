<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Line_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /*
     * $message ='message'
     * $res = $this->notify_message($message);
     * */

    public function notify_message($message)
    {
        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = 'YOUR-TOKEN';

        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array(
            'http'=>array(
                'method'=>'POST',
                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                    ."Authorization: Bearer ".$line_token."\r\n"
                    ."Content-Length: ".strlen($queryData)."\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($line_api, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }

    /*
     * $this->line($id, 'forum');//ส่ง line notify
     * */
    public function line($id = null, $type = null)
    {
        $message = "message=ชุมชนนักพัฒนา&imageThumbnail=".Url::to(Yii::getAlias('@web').'/images/programmerthailand_social.jpg', true)."&imageFullsize=".Url::to(Yii::getAlias('@web').'/images/programmerthailand_social.jpg', true)."";

        if($type == 'forum'){
            $model = Thread::findOne($id);
            if($model){
                $message = "message=".$model->subject.' '.Url::to('https://www.programmerthailand.com/forum/view/'.$model->id.'/'.$model->subject)."&imageThumbnail=".$this->getFirstImage($model->description)."&imageFullsize=".$this->getFirstImage($model->description)."";
            }
        }

        if($type == 'blog'){
            $model = Post::findOne($id);
            if($model){
                $message = "message=".$model->title.' '.Url::to('https://www.programmerthailand.com/blog/view/'.$model->id.'/'.$model->title)."&imageThumbnail=".$this->getFirstImage($model->content)."&imageFullsize=".$this->getFirstImage($model->content)."";
            }
        }

        if($type == 'tutorial'){
            $model = Tutorial::findOne($id);
            if($model){
                $message = "message=".$model->title.' '.Url::to(['/tutorial/post/view', 'id' => $model->id], true)."&imageThumbnail=".$this->getFirstImage($model->content)."&imageFullsize=".$this->getFirstImage($model->content)."";
            }
        }

        //$line_api = 'https://notify-api.line.me/api/notify';
        $line_token = 'Yc7Eรหัสของคุณ4qSx';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'message='.$message);
        // follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$line_token,
        ]);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);
        //var_dump($server_output);

    }

    /*
     * sendToLine('ข้อความของคุณ');
     * */
    public function sendToLine($message){

        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = 'Yc7Eรหัสของคุณ4qSx';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$line_api);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'message='.$message);
        // follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$line_token,
        ]);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);
    }
}