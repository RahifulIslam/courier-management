<?php
include 'connection.php';

// Initialize an error message variable
$error_message = '';

if (isset($_POST['insert'])) {
    $branch_name = $_POST['BranchName'];
    $branch_manager = $_POST['BranchManager'];
    $contract_number = $_POST['ContractNumber'];
    $district = $_POST['District'];

    // Check if any of the required fields are empty
    if (empty($branch_name) || empty($branch_manager) || empty($contract_number) || empty($district)) {
        // Set error message
        $error_message = "Please fill in all fields.";
    } else {
        // Insert data into the database
        $insert_query = "INSERT INTO `branch`(`BranchName`, `BranchManager`, `ContractNumber`, `District`) VALUES ('$branch_name','$branch_manager','$contract_number','$district')";
        $add_branch = mysqli_query($connection, $insert_query);

        // Check if insertion was successful
        if ($add_branch) {
            // Redirect to display_branch.php
            header("Location: display_branch.php");
            exit(); // Ensure that no other code is executed after the redirection
        } else {
            // Set error message if insertion fails
            $error_message = "Failed to insert data into the database.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form method="post">
                    <div class="card mt-4">
                        <div class="text-center">
                            <h1 class="card-title">Add New Branch</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 mt-3">
                                <label for="BranchName">Branch Name:</label>
                                <input type="text" class="form-control" id="BranchName" placeholder="Enter branch name" name="BranchName">
                            </div>
                            <div class="mb-3">
                                <label for="BranchManager">Branch Manager:</label>
                                <input type="text" class="form-control" id="BranchManager" placeholder="Enter manager name" name="BranchManager">
                            </div>
                            <div class="mb-3">
                                <label for="ContractNumber">Contract Number:</label>
                                <input type="text" class="form-control" id="ContractNumber" placeholder="Enter contract number" name="ContractNumber">
                            </div>
                            <div class="mb-3">
                                <label for="District">District:</label>
                                <input type="text" class="form-control" id="District" placeholder="Enter district name" name="District">
                            </div>
                            <button type="submit" class="btn btn-primary" name="insert">Submit</button>
                            <a href="display_branch.php" class="btn btn-secondary">Cancel</a>
                            <br><br>
                            <!-- Error message display -->
                            <?php if (!empty($error_message)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error_message; ?>
                                </div>
                            <?php endif; ?>
                            <!-- End error message display -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>