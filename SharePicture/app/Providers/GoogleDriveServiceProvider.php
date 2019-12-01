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
            $client->setAccessToken('ya29.ImCzB846HoV8uzUqf62y5rCt4Bj91b_d17JQUwle7bTLzwLl3IVRHUodO61J31Cne49cfPuScyqyK46K4DR6iArsrAnvxZ-BLRaGMFixfjpduquwNe5DG-65m0duQLkZQKU');
            //$client->setAccessToken('ya29.Il-zB-NMs_-sJaUdUzXLsGcRkbtFr3DxKtI_BhFmwbx1oHUxNghweg_zUC7Rbp-mOhfdpgiXuqDYq7RoQIJLyf1NIpAOpk7LlIuTMomFL9sVY1uILaHZCO-23P26745BHg');
            $service = new \Google_Service_Drive($client);
            $options = [];
            if(isset($config['teamDriveId'])) {
                $options['teamDriveId'] = $config['teamDriveId'];
            }
            //$adapter = new GoogleDriveAdapter($service, $config['folderId'], $options);
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