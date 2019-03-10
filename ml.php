<?php
include 'common.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Regression\SVR;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;

$user_id=$_SESSION['id'] ;
$samples=array(array());
$targets=array();
$result = mysqli_query($con,"select * from user_communities");
$result1 = mysqli_query($con,"select * from user_thread");
 $result3 = mysqli_query($con,"SELECT * FROM threads , users,tags_thread where  users.id='$user_id' and tags_thread.tag1 = users.tag1 or tags_thread.tag2 = users.tag2 or tags_thread.tag3 = users.tag3   ORDER BY date DESC ");
$i=0;
$j=0;
while($row = mysqli_fetch_assoc($result1)) {

$samples[$i][0] = $row['user_id'];


$targets[$i] = $row['th_id'];


$i = $i + 1;


}

$classifier = new SVC(Kernel::LINEAR, $cost = 1000);
$classifier->train($samples, $targets);
echo $classifier->predict([$user_id]) ;

// return 4.03

$myOptions = array('strictness' => 'permissive', 'also_check' => array('foobar'));
$filter = new \JCrowe\BadWordFilter\BadWordFilter($myOptions);
$cleanString = $filter->clean('Why did you FooBar my application?');
var_dump($cleanString);

?>
