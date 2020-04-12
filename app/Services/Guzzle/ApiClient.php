<?php 

namespace App\Services\Guzzle;

use App\Exceptions\ApiErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class ApiClient {

	public $guzzle;

    public function __construct()
    {
        $config = [
            'base_uri' => env('API_URL'),
            'headers' => [
                'api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . getAuthToken(),
                'Accept' => 'application/json'
            ],
        ];

        $this->guzzle = new Client($config);
    }

    /**
     * @param $uri
     * @param array $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($uri, array $query = [])
    {
        try {
            $r = $this->guzzle->request('GET', $uri, [
                'query' => $query,
            ]);
            return $this->toJson($r);
        } catch (ClientException $e) {
            throw new ApiErrorException($e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * @param $uri
     * @param array $params
     * @return mixed
     * @throws ApiErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($uri, $params = [])
    {
        try {
            $r = $this->guzzle->request('POST', $uri, [
                'form_params' => $params,
            ]);

            return $this->toJson($r);

        } catch (ClientException $e) {
            throw new ApiErrorException($e->getResponse()->getBody()->getContents());
        }
    }

    public function post_with_file($url, $body, $file){

        // dd($file);
        foreach ($file as $key => $value) {
            /**
             * @var UploadedFile $value
             */
            if (!is_array($value) && $value !== null) {
                if(!empty($value->getPathname())){
                    $output[] = [
                        'name' => $key,
                        'contents' => fopen($value->getPathname(), 'r'),
                        'filename' => $value->getClientOriginalName()
                    ];
                }
                // session()->push('key', $key);
                continue;
            }
        }

        // dd(!empty($body));

        if(!empty($body)){
            foreach ( $body as $key => $value ) {
                if ( ! is_array( $value ) && ! is_null($value)) {
                    $output_form[] = [
                        'name'     => $key,
                        'contents' => $value,
                    ];
                    continue;
                }
            }
        }


        if(isset($output)){
            
            if(isset($output_form)){
                $data = array_merge($output_form, $output);
            } else {
                $data = $output;
            }
        }else{
            $data = $output_form;
        }
        
        try {
            $r = $this->guzzle->request('POST', $url,
                ['multipart' =>  $data]);
            return $this->toJson($r);

        } catch (ClientException $e) {
            throw new ApiErrorException($e->getResponse()->getBody()->getContents());
        }
    }

    protected function toJson(ResponseInterface $response)
    {
        $data = $response->getBody()->getContents();

        return json_decode($data, true);
    }
}