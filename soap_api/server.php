<?php
class ContactAddressService {
    private $contacts = [
        1 => ['id' => 1, 'name' => 'Budi Santoso', 'phone' => '08123456789'],
        2 => ['id' => 2, 'name' => 'Ani Rahmawati', 'phone' => '08987654321']
    ];
    
    private $addresses = [
        1 => ['id' => 1, 'street' => 'Jl. Merdeka', 'city' => 'Jakarta'],
        2 => ['id' => 2, 'street' => 'Jl. Sudirman', 'city' => 'Bandung']
    ];

    public function GetContact($id) {
        return isset($this->contacts[$id]) ? (object) $this->contacts[$id] : null;
    }

    public function GetAddress($id) {
        return isset($this->addresses[$id]) ? (object) $this->addresses[$id] : null;
    }
}

// Inisialisasi SOAP Server
$options = [
    'uri' => "http://localhost/soap_api/",
    'soap_version' => SOAP_1_2
];

$server = new SoapServer(null, $options); // Menggunakan null jika tanpa WSDL
$server->setClass("ContactAddressService");
$server->handle();
?>
