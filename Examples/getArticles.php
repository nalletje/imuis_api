<?PHP
require 'vendor/autoload.php';

use nalletje\imuis_api\Models\Articles;

## Set Config
$_partnerkey = "";
$_environmentkey = "";
$debitor_nr = "";

## Create Session
$conn = new Articles($_partnerkey, $_environmentkey);
## Init Pre-Defined settings
$conn->setAll();
## Optional
$conn->setTable("ART");
$conn->setSelect('NR'."\t".'OMSCHR');
$conn->setWhereFields("BLOK");
$conn->setWhereOperators("=");
$conn->setWhereValues('N');
$conn->setOrderBy("NR");
$conn->setLimit("10");
$conn->setPageSize("10000");
$conn->setSelectPage("1");
## Get all Data
$data = $conn->getResults();

echo "<pre>";
var_dump($data);
echo "</pre>";

## Notice, within $data->DATA you will find your results, within $data->METADATA you will find result count + retrievable pages
