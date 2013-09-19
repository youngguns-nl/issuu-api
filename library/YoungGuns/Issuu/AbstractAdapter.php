<?php

namespace YoungGuns\Issuu;

/**
 * Description of AbstractAdapter
 *
 * @author verweel
 */
abstract class AbstractAdapter {



    const RSP_STAT_OK = 'ok';
    const RSP_STAT_FAIL = 'fail';

    /**
     *
     * @var \YoungGuns\Issuu\Client
     */
    protected $client;


    public function __construct(\YoungGuns\Issuu\Client $client)
    {
        $this->client = $client;
    }

    protected function parseResponse(array $response)
    {
        if (isset($response['rsp'])) {
            // Add empty content value
            if (1 === count($response['rsp'])) {
                array_unshift($response['rsp'], '');
            }
            list($content, $status) = array_values($response['rsp']);
            switch ($status) {
                case self::RSP_STAT_OK:
                    if ($this->isResultSet($content)) {
                        return $this->buildResultSet($content['result']);
                    }

                    return $this->buildResult($content);

                case self::RSP_STAT_FAIL:
                    $error = $content['error'];
                    return $this->buildFailureResult($error['message'], $error['code']);
            }
        }

        throw new \UnexpectedValueException('Response does not contain a valid status and content key');
    }


    protected function isResultSet($content)
    {
        return (isset($content['result']));
    }


    protected function buildFailureResult($message, $code)
    {
        return new FailureResult($message, $code);
    }

    protected function buildResultSet($content)
    {
        if (5 === count($content)) {
            list($totalCount, $startIndex, $pageSize, $hasMore, $content) = array_values($content);
            $resultSet = new ResultSet($startIndex, $pageSize, $hasMore);

            foreach($content as $item) {
                $resultSet->addResult($this->buildResult($item));
            }

            return $resultSet;
        }

         throw new \UnexpectedValueException('Response is not a valid resultset');
    }


    abstract protected function buildResult($content);
}
