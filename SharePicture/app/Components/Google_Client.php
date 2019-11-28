<?php
use Google_Client as BaseGoogleClient;
use App\Components\GoogleClient;

/**
 * Class GoogleClient
 * @package App\Components
 */
class Google_Client
{
    /**
     * @var BaseGoogleClient
     */
    protected $client;

    /**
     * GoogleClient constructor.
     * @param BaseGoogleClient $client
     */
    public function __construct(GoogleClient $client) {
        $this->client = $client->getClient();
    }

    /**
     * @return BaseGoogleClient
     * @throws \Exception
     */
    public function getClient()
    {
        //kiểm tra credentials và token có tồn tại hay không
        if (!file_exists(config('google-api.client_path'))) {
            throw new \Exception(
                'You have not create client for application.'
                .' Please create on "console.google.com" and save to your storage "storage/google/credentials.json"!'
            );
        }
        $this->client->setAuthConfig(config('google-api.client_path'));
        $this->client->setAccessType('offline');

        $credentialsPath = config('google-api.token_path');
        if (!file_exists($credentialsPath)) {
            throw new \Exception('Do not receive access token. Please run command "php artisan google:get-token" to get token!');
        }

        $accessToken = json_decode(file_get_contents($credentialsPath), true);
        $this->client->setAccessToken($accessToken);
        
        // nếu token hết hạn sẽ tiến hành refresh lại token để sử dụng
        if($this->client->isAccessTokenExpired()) {
            $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            file_put_contents($credentialsPath, json_encode($this->client->getAccessToken()));
        }

        return $this->client;
    }
}