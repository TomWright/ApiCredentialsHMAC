<?php


namespace TomWright\Api\Credentials\HMAC;


class Credentials
{

    /**
     * @var string
     */
    protected $publicKey;

    /**
     * @var string
     */
    protected $privateKey;


    /**
     * Credentials constructor.
     * @param string $publicKey
     * @param string $privateKey
     */
    public function __construct($publicKey, $privateKey)
    {
        $this->setPublicKey($publicKey);
        $this->setPrivateKey($privateKey);
    }


    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }


    /**
     * @param string $publicKey
     * @return $this
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
        return $this;
    }


    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }


    /**
     * @param string $privateKey
     * @return $this
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
        return $this;
    }


    /**
     * @param $request
     * @param string $algorithm
     * @return string
     */
    public function generateHMAC($request, $algorithm = 'sha256')
    {
        return hash_hmac($algorithm, $request, $this->getPrivateKey());
    }

}
