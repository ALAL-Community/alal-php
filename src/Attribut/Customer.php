<?php 

namespace Alal\Client\Attribut;

use Alal\Client\Enums\BankName;

class CustomerAttribut {

    public string $full_name; 
    public string $email; 
    public string $phone; 
    public string $partner_reference; 
    public string $bank_id; 
    public BankName $bank_name; 


    public function __construct(string $full_name, string $email, string $phone, string $partner_reference, string $bank_id, BankName $bank_name)
    {
        $this->full_name = $full_name; 
        $this->email = $email; 
        $this->phone = $phone; 
        $this->partner_reference = $partner_reference; 
        $this->bank_id = $bank_id; 
        $this->bank_name = $bank_name; 
    }

}