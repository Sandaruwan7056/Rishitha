<?php
   // Include the database connection file
   include('../includes/connection.php');

   // Check if the form was submitted
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // Sanitize form input data to prevent SQL injection
       $guest_name = mysqli_real_escape_string($con, $_POST['guest_name']);
       $guest_email = mysqli_real_escape_string($con, $_POST['guest_email']);
       $attendance = mysqli_real_escape_string($con, $_POST['attendance']);
       $family_count = (int) $_POST['family_count'];  // Cast family_count as an integer
       $meal_preference = mysqli_real_escape_string($con, $_POST['meal_preference']);
       $special_requests = mysqli_real_escape_string($con, $_POST['special_requests']);
       $confirmation = isset($_POST['confirmation']) ? 1 : 0; // Checkbox: 1 if checked, 0 if not

       // SQL query to insert the form data into the database
       $query = "INSERT INTO rsvp (guest_name, guest_email, attendance, family_count, meal_preference, special_requests, confirmation) 
       VALUES ('$guest_name', '$guest_email', '$attendance', $family_count, '$meal_preference', '$special_requests', $confirmation)";

       // Execute the query and check if the data is inserted successfully
       if (mysqli_query($con, $query)) {
           echo "<script>alert('RSVP submitted successfully!');</script>";
       } else {
           echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
       }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding RSVP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Wedding RSVP</h2>
        <p>Please let us know if you will be attending our wedding celebration!</p>

        <form action="" method="POST">
            <!-- Guest Name -->
            <div class="mb-3">
                <label for="guestName" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="guestName" name="guest_name" required>
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="guestEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="guestEmail" name="guest_email" required>
            </div>

            <!-- RSVP Attendance -->
            <div class="mb-3">
                <label for="attendance" class="form-label">Will you be attending?</label>
                <select class="form-select" id="attendance" name="attendance" required>
                    <option value="" disabled selected>Select an option</option>
                    <option value="Yes">Yes, I will attend</option>
                    <option value="No">No, I cannot attend</option>
                </select>
            </div>

            <!-- Family Attendance -->
            <div class="mb-3">
                <label for="familyCount" class="form-label">How many people from your family will attend?</label>
                <input type="number" class="form-control" id="familyCount" name="family_count" min="0" max="10" value="0" required>
                <div class="form-text">Please include yourself in the count.</div>
            </div>

            <!-- Meal Preference -->
            <div class="mb-3">
                <label for="meal" class="form-label">Meal Preference</label>
                <select class="form-select" id="meal" name="meal_preference">
                    <option value="" disabled selected>Choose your meal preference</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Fish">Fish</option>
                </select>
            </div>

            <!-- Special Requests -->
            <div class="mb-3">
                <label for="specialRequests" class="form-label">Special Requests or Comments</label>
                <textarea class="form-control" id="specialRequests" name="special_requests" rows="3"></textarea>
            </div>

            <!-- Confirmation Checkbox -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="confirmation" name="confirmation" required>
                <label class="form-check-label" for="confirmation">I confirm my RSVP and meal choice</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" id="submit button">Submit RSVP</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
