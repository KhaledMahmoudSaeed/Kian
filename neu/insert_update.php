<?php
include('db.php');

echo '<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>';

echo '<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="bg-success">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
              <form action="index.php" method="POST">';

// Use PHP to conditionally include the hidden input field
if (isset($_GET['page']) && $_GET['page'] == "update") {
    echo '<input type="hidden" value="' . htmlspecialchars($_GET['user_id']) . '" name="user_id">';
}

echo '<input type="hidden" value="' . htmlspecialchars($_GET['page']) . '" name="page">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="user_name" name="customer_name" class="form-control form-control-lg" />
                      <label class="form-label" for="user_name">Name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
                    <div data-mdb-input-init class="form-outline">
                      <input type="email" id="customer_email" name="customer_email" class="form-control form-control-lg" />
                      <label class="form-label" for="customer_email">Email</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline datepicker w-100">
                      <input type="text" class="form-control form-control-lg" name="customer_country" id="country" />
                      <label for="country" class="form-label">Country</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="customer_city" name="customer_city" class="form-control form-control-lg" />
                      <label class="form-label" for="customer_city">City</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- Additional rows can be added here if needed -->
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="tel" id="phoneNumber" name="customer_phone" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>
                </div>
                <div class="mt-4 pt-2">
                  <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>';
?>