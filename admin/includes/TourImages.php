<?php  
session_start();
if($_POST['from']=="index")
	require 'inc/inc.con.php';
else
	require '../../inc/inc.con.php';
$obj = new db();
$obj->connect();
function filterIn($str)
	{
		return addslashes(htmlspecialchars($str));		
	}
function filterOut($str)
	{
		return stripslashes(htmlspecialchars_decode($str));		
	}
function setParameters($post,$files,$id="")
    {
    	$param= array(
			'img_id' =>$id,
			'tour_id'=>$post["tour_id"]

		); 
		if($img_id==""){
    		$param['image_path']="";
		}
		if(!empty($files))
		{   
			$folder="";
		    if($_SERVER['SERVER_NAME']=="localhost")
			{
				$folder="/travel/admin";
			}
			else{
				$folder="/admin";
			}
			if(isset($files['image']))
			{
			
                        $image_filename="http://".$_SERVER['SERVER_NAME'].$folder."/tours/".$files['image']['name'];
		        $destination="../tours/". basename($files["image"]["name"]);
				if(move_uploaded_file($files['image']['tmp_name'], $destination))
				{
					$param['image_path']=$image_filename;
				}
			}
			
		}
		return $param;
    }


  if (isset($_POST['action']) && $_POST['action'] == "datatable") {
		
		$sql = " SELECT img_id,tbl_tour.tour_title as name FROM tour_images,tbl_tour where tbl_tour.tour_id=tour_images.tour_id";		
		$columns = array('img_id', 'name');
		$isResult = $obj->generateDatatable($sql, $columns, 'img_id');		
		echo $isResult;	  
	}

	if(isset($_POST['action']) && $_POST['action']=="save")
	{ 
		if($_POST['img_id']=="")
		{
			
				$id=$obj->get_max('tour_images','img_id');
				$query="insert into tour_images values(:img_id,:tour_id,:image_path)";
				$param=setParameters($_POST,$_FILES,$id);
				
				$inserted=$obj->insert($query,$param);
				if($inserted) {
						$status = true;
						$msg = "Successfully Added";
				} else {
					$status = false;
					$msg = "Something went wrong while Adding the Record, please try again.";
				}
			 
		   
		}
		else
		{
			$query1="";
			if(isset($_FILES['image']))
					$query1=",image_path=:image_path";
			$query="update tour_images set tour_id=:tour_id ".$query1." where img_id=:img_id";
			
		 	$param=setParameters($_POST,$_FILES,$_POST['img_id']);
		 	$inserted=$obj->update($query,$param);
              
			if($inserted) {
				$status = true;
				$msg = "Successfully updated";
			} else {
				$status = false;
				$msg = "Something went wrong while updating the Record, please try again.";
			}
			
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));		
	}	


	if (isset($_POST['action']) && $_POST['action'] == "edit") {
		extract(array_map("filterIn", $_POST));
		$sql = "SELECT * FROM  tour_images WHERE img_id={$id}";
		$param = array($id);
		$res = $obj->getRows($sql, $param);
		echo json_encode($res[0]);
		
	}
	if (isset($_POST['action']) && $_POST['action'] == "getcat") {
		extract(array_map("filterIn", $_POST));
		$sql = "SELECT img_id,tbl_tour.tour_title as name FROM tour_images,tbl_tour where tbl_tour.tour_id=tour_images.tour_id and img_id={$id}";
		$param = array($id);
		$res = $obj->getRows($sql, $param);
	    foreach ($res as $row)
	    {
	        $status = true;
	        $msg = $row["name"];
			
	    }
	    echo json_encode(array('status' => $status, 'msg' => $msg));
		
	}
	if (isset($_POST['action']) && $_POST['action'] == "delete") {
		extract(array_map("filterIn", $_POST));
		$isDeleted = $obj->delete('tour_images', 'img_id', $id);
		if ($isDeleted) {
			$status = true;
			$msg = ' Record no.: '.$id.', Successfully Deleted!'; 
		} else {
			$status = false;
			$msg = 'Error, while Deleted Record no.: '.$id; 
		}
	 	echo json_encode(array('status' => $status, 'msg' => $msg));
	}
	if (isset($_POST['action']) && $_POST['action'] == "listtours") {
		$obj = new db();
	    $obj->connect();
		$result=$obj->ListRecords("select tour_id as id,tour_title as title FROM tbl_tour");
		if(!empty($result))
			$status=true;
		else
			$status=false;
	 	echo json_encode(array('status' => $status, 'result' => $result));
	}
	
?>  