<?php
namespace dterranova\Bundle\CryptoBundle\Crypto;

interface CipherInterface {

	public function encrypt($data, $key);
	public function decrypt($data, $key);


}