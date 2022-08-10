<?php
    session_start();

    if(empty($_SESSION)){
        header('location: ../');
        exit;
    }

    include_once "../classes/User.php";

    $user = new User;

    $user_list = $user->getAllUsers();
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
    <title>Dashboard</title>
</head>
<body>
    <?php include "navbar.php";?>
    <main>
        <div class="container mt-5">
            <h2 class="display-4 fw-bold text-center">User List</h2>
            <table class="table table-hover w-50 mx-auto">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th>
                </thead>

                <tbody>
                    <?php
                        if(empty($user_list)){
                    ?>
                            <tr>
                                <td colspan="5" class="text-danger fw-bold text-center">NO USERS FOUND</td>
                            </tr>
                    <?php
                        }else{
                            foreach($user_list as $user_details){
                    ?>
                                <tr>
                                    <td><?= $user_details['id'];?></td>
                                    <td><?= $user_details['first_name'];?></td>
                                    <td><?= $user_details['last_name'];?></td>
                                    <td><?= $user_details['username'];?></td>
                                    <td>
                                        <a href="edit-user.php?user_id=<?= $user_details['id'];?>" class="btn btn-warning btn-sm" title="Edit User">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>

                                        <a href="../actions/delete-action.php?user_id=<?= $user_details['id'];?>" class="btn btn-danger btn-sm" title="Delete User">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>