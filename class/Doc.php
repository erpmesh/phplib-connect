<?php
namespace erpMesh\phplib;

abstract class Doc
{
    var $lang; //Language on the document

    public $attr_ID;

    public $header;
    public $detailAR = [];

    abstract function toArray();

    function toJson()
    {
        $ar = $this->toArray();
        return json_encode($ar);
    }
}

abstract class DocHeader
{
    abstract function toArray();

    function toJson()
    {
        $ar = $this->toArray();
        return json_encode($ar);
    }
}

abstract class DocDetail
{
    var $index; //Index on the doc

    abstract function toArray();

    function toJson()
    {
        $ar = $this->toArray();
        return json_encode($ar);
    }
}