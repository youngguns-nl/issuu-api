<?php

namespace YoungGuns\Issuu;

use Exception;

/**
 * Description of Document
 *
 * @author verweel
 */
class Document extends AbstractAdapter
{

    

    public function urlUpload($options)
    {
        if (is_array($options)) {
            $options = new Document\UrlUploadOptions($options);
        }

        if (!$options instanceof Document\UrlUploadOptions) {
            throw new Exception(sprintf(
                'Options must be an array or instance of UrlUploadOptions, got %s',
                is_object($options) ? get_class($options) : gettype($options)
            ));
        }

        return $this->parseResponse($this->client->post($options));
    }


    public function listDocuments($options = array())
    {
        if (is_array($options)) {
            $options = new Document\ListOptions($options);
        }

        if (!$options instanceof Document\ListOptions) {
            throw new Exception(sprintf(
                'Options must be an array or instance of ListOptions, got %s',
                is_object($options) ? get_class($options) : gettype($options)
            ));
        }

         return $this->parseResponse($this->client->post($options));
    }


    public function delete($options = array())
    {
        if (is_array($options)) {
            $options = new Document\DeleteOptions($options);
        }

        if (!$options instanceof Document\DeleteOptions) {
            throw new Exception(sprintf(
                'Options must be an array or instance of DeleteOptions, got %s',
                is_object($options) ? get_class($options) : gettype($options)
            ));
        }

        return $this->parseResponse($this->client->post($options));
    }

    protected function buildResult($content) {
        if (isset($content['document'])) {
            $document = $content['document'];
            $result = new Document\Result();
            foreach ($document as $key => $value) {
                $result->$key = $value;
            }
            return $result;
        }
        
    }

    
}
