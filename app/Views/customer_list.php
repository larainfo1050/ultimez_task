<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .table-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .search-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="display-4">Customer List</h1>
            <p class="lead text-muted">Manage and search customer records</p>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <form method="get" action="<?= base_url('customers') ?>" class="row g-3">
                <div class="col-md-8">
                    <label for="search" class="form-label">Search Customers</label>
                    <input type="text" 
                           class="form-control" 
                           id="search" 
                           name="search" 
                           placeholder="Search by First Name, Last Name, City or Country..." 
                           value="<?= isset($search) ? esc($search) : '' ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label d-block">&nbsp;</label>
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="bi bi-search"></i> Search
                    </button>
                    <a href="<?= base_url('customers') ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <?php if (!empty($customers)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Calculate serial number based on current page
                            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $serialNo = (($currentPage - 1) * 10) + 1;
                            
                            foreach ($customers as $customer): 
                            ?>
                                <tr>
                                    <td><?= $serialNo++ ?></td>
                                    <td><?= esc($customer['first_name']) ?></td>
                                    <td><?= esc($customer['last_name']) ?></td>
                                    <td><?= esc($customer['city']) ?></td>
                                    <td><?= esc($customer['country']) ?></td>
                                    <td><?= esc($customer['mobile_number']) ?></td>
                                    <td><?= date('d-M-Y h:i A', strtotime($customer['date_n_time'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <?= $pager->links() ?>
                </div>
            <?php else: ?>
                <!-- No Data Found Message -->
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">No Data Found!</h4>
                    <p>No customers match your search criteria. Please try a different search term or reset the filters.</p>
                    <hr>
                    <a href="<?= base_url('customers') ?>" class="btn btn-warning">Reset Search</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>