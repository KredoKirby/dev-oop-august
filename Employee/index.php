<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1 class="display-4 fw-bold text-center mt-5">Employee Activity</h1>
    <div class="container-fluid row">
        <div class="container col w-50 my-5">
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="civil-status" class="form-label fw-bold">Civil Status</label>
                        <select name="civil_status" id="civil-status" class="form-select">
                            <option hidden>Select your Civil Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="position" class="form-label fw-bold">Position</label>
                        <select name="position" id="position" class="form-select">
                            <option hidden>Select your Position</option>
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="employment-status" class="form-label fw-bold">Employment Status</label>
                        <select name="employment_status" id="employment-status" class="form-select">
                            <option hidden>Select your Employment Status</option>
                            <option value="contractual">Contractual</option>
                            <option value="probationary">Probationary</option>
                            <option value="regular">Regular</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="hours-worked" class="form-label fw-bold">Number of Hours Worked</label>
                        <input type="number" name="hours_worked" id="hours-worked" class="form-control" min="0">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary w-100">
                    </div>
                </div>
            </form>
        </div>
        <?php
            include "Employee.php";

            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $civil_status = $_POST['civil_status'];
                $position = $_POST['position'];
                $employment_status = $_POST['employment_status'];
                $hours_worked = $_POST['hours_worked'];

                $employee = new Employee($name, $civil_status, $position, $employment_status, $hours_worked);
        ?>
                <table class="table col table-hover table-striped border mt-5">
                    <tr>
                        <th>Name:</th>
                        <td class="text-capitalize"><?= $name;?></td>
                    </tr>
                    <tr>
                        <th>Civil Status:</th>
                        <td class="text-capitalize"><?= $civil_status;?></td>
                    </tr>
                    <tr>
                        <th>Position:</th>
                        <td class="text-capitalize"><?= $position;?></td>
                    </tr>
                    <tr>
                        <th>Employment Status:</th>
                        <td class="text-capitalize"><?= $employment_status;?></td>
                    </tr>
                    <tr>
                        <th class="bg-warning">Total Hours Worked:</th>
                        <td class="bg-warning text-capitalize fw-bold"><?= $hours_worked;?> hours</td>
                    </tr>
                    <tr>
                        <th class="">Regular Pay:</th>
                        <td class="">$<?= number_format($employee->computeRegularPay(), 2);?></td>
                    </tr>
                    <tr>
                        <th class="">Overtime Hours:</th>
                        <td class=""><?= ($hours_worked > 40) ? $hours_worked-40 : 0?></td>
                    </tr>
                    <tr>
                        <th class="">Overtime Pay:</th>
                        <td class="">$<?= number_format($employee->computeOvertimePay(), 2);?></td>
                    </tr>
                    <tr>
                        <th class="">Gross Income:</th>
                        <td class="">$<?= number_format($employee->computeGrossIncome(), 2);?></td>
                    </tr>
                    <tr>
                        <th class="bg-danger text-white">Tax Deduction:</th>
                        <td class="bg-danger text-white fw-bold">$<?= number_format($employee->computeTax(), 2);?></td>
                    </tr>
                    <tr>
                        <th class="bg-primary text-white">Healthcare Deduction:</th>
                        <td class="bg-primary text-white fw-bold">$<?= number_format($employee->computeHealthCare(), 2);?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white">Net Income:</th>
                        <td class="bg-dark text-white fw-bold">$<?= number_format($employee->computeNetIncome(), 2);?></td>
                    </tr>
                </table>
        <?php
            }
        ?>
    </div>
</body>
</html>