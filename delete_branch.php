<?php

include 'connection.php';

$branch_id = $_GET['BranchID'];

$delete_query = " DELETE FROM `branch` WHERE BranchID = $branch_id ";

mysqli_query($connection, $delete_query);

header('location:display_branch.php');

?>