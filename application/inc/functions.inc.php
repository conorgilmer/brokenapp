<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');


function validateproduct($product) {
	
	
	return true;
	
	
}
// save a manufacturer
function saveMaker($maker ) {
	
	$sqlQuery = "INSERT INTO mfs (mf_title)
	values ('{$maker['mf_title']}')";
	
	$result = mysql_query($sqlQuery);

	if (!$result) {
		echo $sqlQuery;
		
		die("error" . mysql_error());
	} 
	//comment in	
	return mysql_insert_id();
	
}
// fix typos
function saveProduct($product ) {
	//add desc and country 
	$sqlQuery = "INSERT INTO products (title, description, mf_id,	price,
	taste, country_id)
	values ('{$product['title']}','{$product['description']}','{$product['mf_id']}',
            '{$product['price']}','{$product['taste']}', '{$product['country_id']}')";
	
	$result = mysql_query($sqlQuery);
	
	

	
	if (!$result) {
		echo $sqlQuery;
		
		die("error" . mysql_error());
	} 
	
	
	return mysql_insert_id();
	
}
/* 
 * Realistically, you would pass function $_FILES array, but here we are assuming it's available
 * UPLOAD_PATH is defined in config.inc.php
 */
function uploadFiles($product_id) {
	//echo UPLOAD_PATH;
	//echo $_FILES['uploadedfile']['tmp_name'];
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], UPLOAD_PATH)) {
		
		saveImageRecord($product_id, basename( $_FILES['uploadedfile']['name']));
		
	
	} else{
		echo "<p>There was an error uploading the file, please try again!";
	}
	
	
}


function saveImageRecord($product_id, $imageName) {
	
	
	$sqlQuery = "UPDATE products SET imagefile = '$imageName' where movie_id = $product_id"; 
	$result = mysql_query($sqlQuery);
	
	return $result;
	
	
	
}

/*
 * Typical things that go wrong with next script
 * You must update the insert.php file to capture any new fields
 * You must ensure there are commas on any new lines you create
 * To resolve issues, uncomment the lines which echo the $sqlQuery  and die();
 */


function updateMovie($product) {
    $productID = (int) $product['product_id'];
    $sqlQuery = "UPDATE products SET ";
     $sqlQuery .= " taste = '" . $product['taste'] . "',";
     $sqlQuery .= " price = '". $product['price'] . "',";
     $sqlQuery .= " title = '". $product['title'] . "',";
     $sqlQuery .= " description = '". $product['description'] . "', ";
     $sqlQuery .= " mf_id = '". $product['mf_id'] . "', ";
     $sqlQuery .= " country_id = '". $product['country_id'] . "'";
   
    $sqlQuery .= " WHERE product_id = $productID";
    
  //  echo $sqlQuery;
 //  die("...");
    
    $result = mysql_query($sqlQuery);
	
    
    
	if (!$result) {
		die("error" . mysql_error());
        }
	
    
}

//update maker 

function updateMaker($product) {
    $makerID = (int) $product['mk_id'];
    $sqlQuery = "UPDATE mfs SET ";
     $sqlQuery .= " mk_title = '". $product['mk_title'] . "'";
   
    $sqlQuery .= " WHERE mk_id = $makerID";
    
  //  echo $sqlQuery;
 //  die("...");
    
    $result = mysql_query($sqlQuery);
	
    
    
	if (!$result) {
		die("error" . mysql_error());
        }
	
    
}


function deleteMovie($id) {
    $productID = (int) $id;
    $sqlQuery = "DELETE FROM products where product_id = $productID";
    
    $result = mysql_query($sqlQuery);
    if (!$result) {
		die("error" . mysql_error());
        }
}



function retrieveMovie($id) {

	$sqlQuery = "SELECT * from products WHERE product_id = $id";

	$result = mysql_query($sqlQuery);
	
	if(!$result) die("error" . mysql_error());
	
	
	//echo $sqlQuery;


	return mysql_fetch_assoc($result);
	
}


//Makers

function deleteMaker($id) {
    $makerID = (int) $id;
    $sqlQuery = "DELETE FROM mfs where mf_id = $makerID";
    
    $result = mysql_query($sqlQuery);
    if (!$result) {
		die("error deleting maker" . mysql_error());
        }
}



function retrieveMaker($id) {

	$sqlQuery = "SELECT * from mfs WHERE mf_id = $id";

	$result = mysql_query($sqlQuery);
	
	if(!$result) die("error" . mysql_error());
	
	
	//echo $sqlQuery;


	return mysql_fetch_assoc($result);
	
}

//Makers


function output_edit_link($id) {
	
	return "<a href='edit.php?id=$id'>Edit</a>";
	
	
}
function output_delete_link($id) {

	return "<a href='delete.php?id=$id'>Delete</a>";


}


function output_edit_maker_link($id) {
	
	return "<a href='editmaker.php?id=$id'>Edit</a>";
	
	
}
function output_delete_maker_link($id) {
// typo
	return "<a href='deletemaker.php?id=$id'>Delete</a>";


}


function output_selected($currentValue, $valueToMatch) {
	
	
	if ($currentValue == $valueToMatch) {
		
		return "selected ='selected'";
		
	}
	
}

function authenticate($username, $password) {   
    $boolAuthenticated = false;
    
    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . $username . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" .$password . "'";
    
    $result = mysql_query($sqlQuery);
    
    if (!$result)  die("Error: " . $sqlQuery . mysql_error());
    
    if (mysql_num_rows($result)==1) {
        $boolAuthenticated = true;
    }
    
    return $boolAuthenticated;
}