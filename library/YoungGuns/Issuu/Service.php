<?php
namespace YoungGuns\Issuu;

/**
 * Description of IssuuService
 *
 * @author verweel
 */
class Service
{

    protected $documentAdapter;

    /**
     *
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     *
     * @return Adapter\Document
     */
    public function document()
    {
        if (null === $this->documentAdapter) {
            $this->documentAdapter = new Document($this->client);
        }
        return $this->documentAdapter;
    }
}
