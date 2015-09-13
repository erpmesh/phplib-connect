<?php

namespace erpMesh\phplib;


abstract class AbstractApplicationHandler
{
    abstract public function CreatePO($docHeader, $docDetailAr);

    abstract public function CreateSO($docHeader, $docDetailAr);

    public function handleRequest()
    {
        return true;
    }
}