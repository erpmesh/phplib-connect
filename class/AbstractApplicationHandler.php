<?php

namespace erpMesh\phplib;


abstract class AbstractApplicationHandler
{
    protected $feed_endpoint = "http://hub.erpmesh.com/api/v1/feed";

    abstract public function RemoteAskCreatePO(PODoc $doc);
    abstract public function RemoteAskCreateSO(SODoc $doc);

    abstract public function RemoteAsAdjustStock();

    public function TriggerLocalCreatePO(PODoc $doc){
        $json = $doc->toJson();
        $this->Feed($json);
    }
    public function TriggerLocalCreateSO(SODoc $doc){
        $json = $doc->toJson();
        $this->Feed($json);
    }
    public function TriggerLocalsAdjustStock(){

    }
    protected function Feed($json)
    {
        $chlead = curl_init();
        curl_setopt($chlead, CURLOPT_URL, $this->feed_endpoint);
        //curl_setopt($chlead, CURLOPT_USERAGENT, 'SugarConnector/1.4');
        curl_setopt($chlead, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($json)));
        curl_setopt($chlead, CURLOPT_VERBOSE, 1);
        curl_setopt($chlead, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chlead, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($chlead, CURLOPT_POSTFIELDS,$json);
        curl_setopt($chlead, CURLOPT_SSL_VERIFYPEER, 0);

        $chleadresult = curl_exec($chlead);
        $chleadapierr = curl_errno($chlead);
        $chleaderrmsg = curl_error($chlead);
        curl_close($chlead);

        if (!$chleadresult)
        {
            return false;
        }


        echo($chleadresult);
        exit();

    }
    public function handleRequest()
    {
        return true;
    }
}