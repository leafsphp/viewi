<?php

namespace Leaf\Viewi;

class RawResponse extends \Leaf\Http\Response
{
    /**
     * 
     * @var mixed
     */
    private $data = null;

    /**
     * 
     * @var bool Stop sending the response (no echo)
     */
    private bool $doNotSend = false;

    /**
     * Output json encoded data with an HTTP code/message
     * 
     * @param mixed $data The data to output
     * @param int $code The response status code
     * @param bool $showCode Show response code in body?
     */
    public function json($data, int $code = 200, bool $showCode = false)
    {
        $this->data = $data;
        parent::json($data, $code, $showCode);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function makeInternal()
    {
        $this->doNotSend = true;
    }

    /**
     * Send the Http headers and content
     * 
     * @return $this
     */
    public function send()
    {
        if (!$this->doNotSend) parent::send();
    }

    public function getRawData()
    {
        return $this->data;
    }
}
