<?php

namespace erpMesh\phplib;

class SODoc extends Doc
{

    function toArray()
    {
        return [
            'ID'=>$this->attr_ID
        ];
    }

    function __construct()
    {
        $this->header = new SOHeader();
    }
}

class SOHeader extends DocHeader
{

    function toArray()
    {
        // TODO: Implement toArray() method.
    }
}

class SODetail extends DocDetail
{


    function toArray()
    {
        // TODO: Implement toArray() method.
    }
}