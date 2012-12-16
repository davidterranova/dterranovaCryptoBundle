# dterranova/crypto-bundle

This bundle provide file encryption with AES-256 Cipher
The quantity of memory used is the same one it does not matter the size of the file

## Workflow

### Encryption
The original file is readen by the `chunk_file_size` and the encryption is done on this amount of data
A folder is created in the `temp_folder` with the name of the original encrypted file
Each encrypted part are written in this folder

### Decryption
By passing the original file name to the `decryptFile` method, the cryptoBundle use the corresponding folder with encrypted parts of the file to rebuild the original file

## Installation

- Add to your composer file

``` json
{
    "require": {
        ...
        "dterranova/crypto-bundle": "dev-master"
    }
    ...
}
```

- Update your vendors
`php composer.phar update`

- Add to your AppKernel

``` php
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new dterranova\Bundle\CryptoBundle\dterranovaCryptoBundle(),
            // ...
        );
    }
```

- Add to your `app/config/config.yml`

``` yml
# app/config/config.yml
dterranova_crypto:
    temp_folder: "%kernel.root_dir%/../web/YOUR_TEMP_FOLDER"
    chunk_file_size: 2 # The size (in Mb) of chunked files, more it is big more it will consume memory 
```

## Usage

- Encrypt a file
``` php
$cryto = $this->get("dterranova_crypto.crypto_adapter");
$crypto->encryptFile(ABSOLUTE_FILE_PATH, KEY);
```

- Decrypt a file
``` php
$cryto = $this->get("dterranova_crypto.crypto_adapter");
$crypto->decryptFile(ABSOLUTE_FILE_PATH, KEY);  // The same absolute file path
```
