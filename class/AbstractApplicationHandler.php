<?php

namespace erpMesh\phplib;


abstract class AbstractApplicationHandler
{
    abstract public function RemoteAskCreatePO(PODoc $doc);
    abstract public function RemoteAskCreateSO(SODoc $doc);

    abstract public function RemoteAsAdjustStock();

    abstract public function TriggerLocalCreatePO(PODoc $doc);
    abstract public function TriggerLocalCreateSO(SODoc $doc);
    abstract public function TriggerLocalsAdjustStock();

    public function handleRequest()
    {
        return true;
    }
}