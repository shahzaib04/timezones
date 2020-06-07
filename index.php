<?php
require_once 'database.php';
require_once 'requestHandler.php';
$current_timeZone = getTimeZoneAccordingly();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Timezone Manipulation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Offer Listing</li>
        </ol>
    </nav>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Valid Until</th>
            <th>Offered By</th>
            <th>Start Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($offers = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $offers['name'] ?></td>
                    <td><?php echo calculateTimeDiffference($offers['validity'], $current_timeZone) ?></td>
                    <td><?php echo $offers['offered_by'] ?></td>
                    <td><?php echo calculateTimeDiffference($offers['created_at'], $current_timeZone); //echo $offers['created_at'] ?></td>
                    <td><?php echo ($offers['is_active'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>'; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary">Get Offer</button>
                    </td>

                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Valid Until</th>
            <th>Offered By</th>
            <th>Start Date</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>
