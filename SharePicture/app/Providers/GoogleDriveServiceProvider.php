<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use GoogleDriveAdapter;
class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend('google', function($app, $config) {
            $client = new \Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $client->addScope("https://www.googleapis.com/auth/drive");

            $client->setApprovalPrompt('auto');
            $client->setAccessType('offline');         // generates refresh token

            // this line gets the new token if the cookie token was not present
            // otherwise, the same cookie token
            $token = $client->getAccessToken();
            //dd($token);
            // if token is present in cookie
            if($token){
                // use the same token
                $client->setAccessToken($token);
            }
            //$_COOKIE['ACCESSTOKEN']=$token; // chua dung drn-----------------

            if($client->isAccessTokenExpired()){  // if token expired
                $refreshToken = json_decode($token)->refresh_token;

                // refresh the token
                $client->refreshToken($refreshToken);
            }

            $service = new \Google_Service_Drive($client);
            $options = [];
            if(isset($config['teamDriveId'])) {
                $options['teamDriveId'] = $config['teamDriveId'];
            }
            $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, $config['folderId']);
            return new \League\Flysystem\Filesystem($adapter);
        });
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}