<?php
    session_start();

    if(empty($_SESSION)){
        header('location: ../');
        exit;
    }

    include "../classes/User.php";

    $user = new User;
    $user_details = $user->getUserDetails($_GET['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit User</title>
</head>
<body>
    <?php include "navbar.php";?>

    <main>
        <div class="container mt-5">
            <div class="card w-50 mx-auto border-0">
                <div class="card-header bg-white border-0">
                    <h1 class="display-4 fw-bold text-center text-warning">Edit User</h1>
                </div>

                <div class="card-body">
                    <form action="../actions/edit-action.php?user_id=<?= $user_details['id']?>" method="post">
                    <!-- <form action="../actions/edit-action.php" method="post"> -->
                        <!-- <input type="hidden" name="user_id" value="<?= $user_details['id']?>"> -->

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first-name" class="form-control" value="<?= $user_details['first_name']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last-name" class="form-control"  value="<?= $user_details['last_name']?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"  value="<?= $user_details['username']?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="new_password" class="form-label">Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control">
                                <input type="hidden" name="old_password" value="<?= $user_details['password']?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 mb-3">Edit</button>

                        <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>