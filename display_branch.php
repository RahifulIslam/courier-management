<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col-lg-12">
            <br><br>
            <h1 class="text-center">Display all Branch</h1>
            <br>
            <div class="d-flex justify-content-end">
                <a href="create_branch.php" class="btn btn-primary">Create Branch</a>
            </div>
            <br>
            <div class="table-responsive"> <!-- Wrap the table with this div -->
                <table class="table table-striped table-hover table-bordered">
                    <tr class="text-center">
                        <th>Branch Id</th>
                        <th>Branch Name</th>
                        <th>Branch Manager</th>
                        <th>Contract Number</th>
                        <th>District</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    include 'connection.php';
                    $select_query = "SELECT * FROM BRANCH";
                    $display_branches = mysqli_query($connection, $select_query);
                    while ($res = mysqli_fetch_array($display_branches)) {
                    ?>

                        <tr class="text-center">
                            <td> <?php echo $res['BranchID'];  ?> </td>
                            <td> <?php echo $res['BranchName'];  ?> </td>
                            <td> <?php echo $res['BranchManager'];  ?> </td>
                            <td> <?php echo $res['ContractNumber'];  ?> </td>
                            <td> <?php echo $res['District'];  ?> </td>
                            <td> <button class="btn-danger btn"> <a href="delete_branch.php?BranchID=<?php echo $res['BranchID']; ?>" class="text-white"> Remove </a> </button> </td>
                        </tr>

                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>

</html>
