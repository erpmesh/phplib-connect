<?php

namespace erpMesh\phplib;


abstract class AbstractApplicationHandler
{
    protected $feed_endpoint = "http://hub.erpmesh.com/api/v1";

    abstract public function GetAPIKey();

    abstract public function RemoteAskCreatePO(PODoc $doc);
    abstract public function RemoteAskCreateSO(SODoc $doc);

    abstract public function RemoteAsAdjustStock();

    public function TriggerLocalCreatePO(PODoc $doc){
        $json = $doc->toJson();
        return $this->Feed($json);
    }
    public function TriggerLocalCreateSO(SODoc $doc){
        $json = $doc->toJson();
        return $this->Feed($json);
    }
    public function TriggerLocalAdjustStock(){

    }
    protected function Feed($json)
    {
        $chlead = curl_init();
        curl_setopt($chlead, CURLOPT_URL, $this->feed_endpoint."/feed");
        curl_setopt($chlead, CURLOPT_HTTPHEADER, [
            "X-Authorization: ".$this->GetAPIKey(),
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json)
        ]);
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
            return ['success'=>false,"code"=>0,'error'=>"No response output"];
        }

        $result = json_decode($chleadresult,true);
        if(!$result){
            return ['success'=>false,"code"=>0,'error'=>$chleadresult];
        }
        return $result;
    }
    public function VerifyKey($key)
    {
        $chlead = curl_init();
        curl_setopt($chlead, CURLOPT_URL, $this->feed_endpoint."/test");
        curl_setopt($chlead, CURLOPT_HTTPHEADER, [
            "X-Authorization: $key",
        ]);
        curl_setopt($chlead, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chlead, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($chlead, CURLOPT_SSL_VERIFYPEER, 0);

        $chleadresult = curl_exec($chlead);
        $chleadapierr = curl_errno($chlead);
        $chleaderrmsg = curl_error($chlead);
        curl_close($chlead);

        if (!$chleadresult)
        {
            return ['success'=>false,"code"=>0,'error'=>"No response output"];
        }

        $result = json_decode($chleadresult,true);
        if(!$result){
            return ['success'=>false,"code"=>0,'error'=>$chleadresult];
        }
        return $result;

    }


    public function handleRequest()
    {
        return true;
    }
}