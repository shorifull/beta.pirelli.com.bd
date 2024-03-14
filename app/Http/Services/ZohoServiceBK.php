<?php

namespace App\Http\Services;

use App\Models\ApiToken;
use DateTime;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ZohoServiceBK
{
    const AUTH_URL = 'https://accounts.zoho.com/oauth/v2/token';
    const CONTACTS_UPDATE_URL = 'https://www.zohoapis.com/crm/v2/Contacts/upsert';
    const CONTACTS_INSERT_URL = 'https://www.zohoapis.com/crm/v2/Contacts';

    private $client_id;
    private $client_secret;
    private $refresh_token;
    private $access_token;

    public function __construct($params)
    {
        $this->client_id = $params['client_id'];
        $this->client_secret = $params['client_secret'];
        $this->refresh_token = $params['refresh_token'];
    }

    public function insertContact($contact)
    {
        $this->checkAuthorized();
        return $this->makeAddContactRequest($contact);
    }

    public function uploadFile($recordId, $file)
    {
        $url = self::CONTACTS_INSERT_URL . '/' . $recordId . '/Attachments';

        $this->checkAuthorized();
        $response = $this->makeUploadRequest($file, $url);

        return json_decode($response)->data[0]->status ;
    }

    private function getAccessToken()
    {
        $response = $this->makeAuthRequest();
        $token = $response['access_token'];
        $this->saveAccessToken($token);

        return $token;
    }

    private function checkAuthorized()
    {
        if($this->access_token = $this->getActiveTokenFromDB()) {
            return true;
        }

        if($this->access_token = $this->getAccessToken()) {
            return true;
        }

        throw new Exception('API error');
    }

    private function getActiveTokenFromDB()
    {
        $apiToken = ApiToken::where(['client_id' => $this->client_id])->orderBy('created_at', 'desc')->first();

        if(!$apiToken) {
            return null;
        }

        if(!$apiToken->isExpired()) {
            return $apiToken->access_token;
        }
    }

    private function saveAccessToken($token)
    {
        $apiToken = new ApiToken();
        $apiToken->refresh_token = $this->refresh_token;
        $apiToken->client_id = $this->client_id;
        $apiToken->access_token = $token;
        $apiToken->save();
    }

    private function makeAuthRequest()
    {
        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL=>"https://accounts.zoho.com/oauth/v2/token?refresh_token=".$this->refresh_token."&client_id=".$this->client_id."&client_secret=".$this->client_secret."&grant_type=refresh_token",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST"
            ));

            $response = curl_exec($curl);
            $response = json_decode($response, true);

            $err = curl_error($curl);
            curl_close($curl);
        } catch(Exception $e) {

            throw new Exception($e->getMessage());
            // throw new Exception('API connection issue');
        }

        return $response;
    }

    private function makeAddContactRequest($data)
    {
        $postData = '{
            "data":[' . json_encode($data) . ' ]
        }';

        // Prepare new cURL resource
        $crl = curl_init(self::CONTACTS_INSERT_URL);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($crl, CURLINFO_HEADER_OUT, true);
        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $postData);

        // Set HTTP Header for POST request
        curl_setopt($crl, CURLOPT_HTTPHEADER, array(
            'Authorization: Zoho-oauthtoken ' . $this->access_token
        ));

        // Submit the POST request
        $result = curl_exec($crl);

        // handle curl error
        if ($result === false) {
            throw new Exception('Curl error: ' . curl_error($crl));
            print_r('Curl error: ' . curl_error($crl));
        }

        // Close cURL session handle
        curl_close($crl);

        return $result;
    }

    private function makeUploadRequest($file, $url)
    {
        $date = new DateTime();
        $currentTime= $date->getTimestamp();

        $filename = $file->getClientOriginalName();
        $real_path = $file->getRealPath();

//       dd($file);
        $fileData = file_get_contents($file->public_path());

        //Declare a variable for enctype for sending the file to creator
        $KLineEnd = "\r\n";
        $kDoubleHypen = "--";
        $kContentDisp = "Content-Disposition: form-data; name=\"file\";filename=\"";

        //Encoding the fileds and makes body map variable
        $param = utf8_encode($KLineEnd);
        $encode_var = $kDoubleHypen . (string)$currentTime . $KLineEnd ;
        $param = $param . utf8_encode($encode_var);
        $temp = $kContentDisp . $filename . "\"" . $KLineEnd . $KLineEnd ;
        $param = $param . utf8_encode($temp);
        $param = $param . $fileData . utf8_encode($KLineEnd);
        $temp_var = $kDoubleHypen . (string)$currentTime . $kDoubleHypen . $KLineEnd . $KLineEnd;
        $param = $param . utf8_encode($temp_var);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Zoho-oauthtoken ' . $this->access_token,
        'ENCTYPE: multipart/form-data',
        'Content-Type:multipart/form-data;boundary='.(string)$currentTime));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_POST, 1);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
