<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header text-center bg-light">
                <h3 class="m-0">Password Reset</h3>
            </div>
            <div class="card-body">
                <h4>Hello!</h4>
                <p>You are receiving this email because we received a password reset request for your password.</p>
                <div class="text-center my-4">
                    <!-- <a href="#" class="btn btn-primary">Reset Password</a> -->
                <p style="border: 1px solid gray; background-color: lightgray; padding: 10px; width: 50px; text-align: center;">
                    {{$token}}
                </p>


                   
                </div>
                <p>If you did not request a password reset, no further action is required.</p>
                <p>Regards,<br>The Silver Renaince Foundation </p>
                <hr>
                <p class="text-muted">
                </p>
            </div>
            <div class="card-footer text-center text-muted bg-light">
                <small>The Silver Renaince Foundation and Security</small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
