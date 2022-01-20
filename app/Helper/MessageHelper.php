 
static public function sendMessage($message, $recipients): bool
    {
        $curl = curl_init();

        $username = env('NEXTSMS_USERNAME');
        $password = env('NEXTSMS_PASSWORD');
        $from = env('NEXTSMS_FROM');

        $credentials = base64_encode($username.':'.$password);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://messaging-service.co.tz/api/sms/v1/text/single',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"from": "'.$from.'", "to": "'.$recipients.'", "text": "'.$message.'"}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$credentials,
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if (!($httpcode == 200 || $httpcode == 201)){
            return false;
        }
        return true;
    }