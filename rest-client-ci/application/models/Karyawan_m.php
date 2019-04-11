<?php
use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class karyawan_m extends CI_Model
{
    private $_client;

    function __construct()
    {
        parent::__construct();
        $this->_client = new Client(
            [
                'base_uri' => 'https://wwwmytravellingblogspotcom.000webhostapp.com/rest-server/'
            ]
        );
    }

    public function ambilkaryawan()
    {
        $respon = $this->_client->request('GET', 'karyawan', []);

        $result = json_decode($respon->getBody()->getContents(), true);

        return $result['data'];
    }

    public function tambahkaryawan($data)
    {
        $respon = $this->_client->request('POST', 'karyawan', [
            'form_params' => $data
        ]);

        $result = json_decode($respon->getBody()->getContents(), true);

        return $result;
    }

    public function editkaryawan($data)
    {
        $respon = $this->_client->request('PUT', 'karyawan', [
            'form_params' => $data
        ]);

        $result = json_decode($respon->getBody()->getContents(), true);

        return $result;
    }
    public function hapuskaryawan($data)
    {
        $respon = $this->_client->request('DELETE', 'karyawan', [
            'form_params' => $data
        ]);

        $result = json_decode($respon->getBody()->getContents(), true);

        return $result;
    }

}
