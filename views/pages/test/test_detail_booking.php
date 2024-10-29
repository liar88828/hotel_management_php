<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body {
            padding: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header text-center">
            Booking Details for Guest
        </div>
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Room Information</h5>

            <!-- Room Details -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Room Name:</strong>
                    <p id="roomName">Deluxe Room</p>
                </div>
                <div class="col-md-6">
                    <strong>Price per Night:</strong>
                    <p id="roomPrice">$120</p>
                </div>
            </div>

            <!-- Booking Details -->
            <h5 class="card-title text-center mb-4">Booking Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <strong>Check-In Date:</strong>
                    <p id="checkInDate">2024-10-15</p>
                </div>
                <div class="col-md-6">
                    <strong>Check-Out Date:</strong>
                    <p id="checkOutDate">2024-10-20</p>
                </div>
            </div>

            <!-- Total Price -->
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <h4>Total Price: <span id="totalPrice">$600</span></h4>
                </div>
            </div>

            <!-- Booking Status -->
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <strong>Booking Status:</strong>
                    <p id="bookingStatus" class="text-success">Confirmed</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-primary me-2">Edit Booking</a>
                <a href="#" class="btn btn-danger">Cancel Booking</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
