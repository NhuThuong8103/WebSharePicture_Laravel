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
            $client->setAccessToken('ya29.ImCzB2-ZpLvZaQFpWglYOeIqVqlmVQMT9Q_3vjTxz77AfFi8UKEYi2Bi9ASl0PoBZERGK3yp86gEld-aY4U2REF30eIQHeC0NtbV5nX45dnJeI5p6XweB3bBAwv7pvhuVKg');
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