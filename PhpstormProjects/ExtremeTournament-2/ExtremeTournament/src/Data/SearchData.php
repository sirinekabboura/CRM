<?php
namespace App\Data;
use App\Entity\Tournoi;
use Doctrine\DBAL\Types\StringType;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\Console\Input\StringInput;


class SearchData
{
    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var string
     */
    public $q = '';

    /**
     * @var Tournoi[]
     */
    public $nomT = [];

    /**
     * @var string
     */
    public $emplacementT ='' ;

}