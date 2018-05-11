<?PHP
require 'vendor/autoload.php';

use nalletje\imuis_api\Models\Debitors;

## Set Config
$_partnerkey = "";
$_environmentkey = "";
$search_term = "";

## Create Session
$conn = new Debitors($_partnerkey, $_environmentkey);
## Optional
$conn->setSelect('NR'."\t".'ZKSL'."\t".'NAAM'."\t".'POSTCD'."\t".'PLAATS'); // Select Statement
$conn->setMaxResults('10'); // The max results it will return
$conn->setSelectPage('1');  // in case of more results then 10
## Get all Data
$data = $conn->findByName($search_term);
// OR if your prefer zipcode
// $data = $conn->findByZipcode($search_term);

echo "<pre>";
var_dump($data);
echo "</pre>";

## Notice, within $data->DATA you will find your results, within $data->METADATA you will find result count + retrievable pages