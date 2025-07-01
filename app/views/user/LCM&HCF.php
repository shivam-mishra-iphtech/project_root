<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LCM & HCF Calculator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .error-message {
      color: red;
      font-size: 0.875em;
      margin-top: 0.25rem;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="col-md-6 offset-md-3">
      <h4 class="text-center mb-4">LCM & HCF Calculator</h4>
      <form method="POST" onsubmit="return validateForm()">
        <div class="mb-3">
          <label for="numbers" class="form-label">Enter numbers (comma separated):</label>
          <input type="text" id="numbers" name="numbers" class="form-control" placeholder="e.g. 12, 18, 24" required>
          <div id="numbersError" class="error-message"></div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Calculate</button>
      </form>

      <?php
      if (isset($_POST['submit'])) {
          function hcf($a, $b) {
              // Ensure positive numbers for HCF calculation
              $a = abs($a);
              $b = abs($b);
              while ($b != 0) {
                  $temp = $b;
                  $b = $a % $b;
                  $a = $temp;
              }
              return $a;
          }

          function lcm($a, $b) {
              if ($a == 0 || $b == 0) {
                  return 0;
              }
             return abs($a * $b) / hcf($a, $b);
          }

          $input = $_POST['numbers'];
          $errors = [];

          // Server-side validation
          $numbers_raw = explode(',', $input);
          $numbers = [];
          foreach ($numbers_raw as $num_str) {
              $num =  ($um_str);
              if (!is_numeric($num) || !ctype_digit($num) || (int)$num <= 0) {
                  $errors[] = "Please enter only positive integers.";
                  break;
              }
              $numbers[] = (int)$num;
          }

          if (empty($numbers)) {
              $errors[] = "No numbers entered.";
          } elseif (counT($numbers) < 2) {
              $errors[] = "Please enter at least two numbers.";
          }

          if (!empty($errors)) {
              echo "<div class='alert alert-danger mt-4'>";
              foreach ($errors as $error) {
                  echo htmlspecialchars($error) . "<br>";
              }
              echo "</div>";
          } else {
              // Filter out any potential non-positive numbers if they somehow slipped through validation (redundant with proper validation, but safe)
              $numbers = array_filter($numbers, fn($n) => $n > 0);

              if (count($numbers) >= 2) {
                  // Initialize resultHCF with the first number, then reduce
                  $resultHCF = array_reduce($numbers, 'hcf', $numbers[0]);
                  // Initialize resultLCM with the first number, then reduce                
                  $resultLCM = array_reduce($numbers, 'lcm', $numbers[0]);

                  echo "<div class='alert alert-success mt-4'>";
                  echo "Numbers: <strong>" . htmlSpecialchars(implode(', ', $numbers)) . "</strong><br>";
                  echo "HCF: <strong>" . htmlspecialchars($resultHCF) . "</strong><br>";
                  echo "LCM: <strong>" . htmlspecialchars($resultLCM) . "</strong>";
                  echo "</div>";

                  $n = -30.9647;
 $result= abs($n);
 echo "$result";


                  ECHO"jasfkjldsfasdlfjklasdf<bR><Br>";
                  EcHo"dfkjdlsgfgdflkjdfkgjh";
              } else {
                  // This case should ideally be caught by the validation above, but as a fallback:
                  echo "<div class='alert alert-danger mt-4'>Please enter at least two valid numbers.</div>";
              }
          }
      }
      ?>
    </div>
  </div>

  <script>
    function validateForm() {
      const inputField = document.getElementById("numbers");
      const errorMessageDiv = document.getElementById("numbersError");
      const input = inputField.value.trim();
      const numbersArray = input.split(',').map(num => num.trim());

      let isValid = true;
      let message = "";

      if (numbersArray.length < 2) {
        isValid = false;
        message = "Please enter at least two numbers.";
      } else {
        for (let i = 0; i < numbersArray.length; i++) {
          const num = numbersArray[i];
          if (num === "") { // Handle empty string after comma like "12,,24"
            isValid = false;
            message = "Empty entry found. Please enter valid numbers separated by commas.";
            break;
          }
          // Check if it's a positive integer
          if (!/^\d+$/.test(num) || parseInt(num, 10) <= 0) {
            isValid = false;
            message = "Please enter only positive integers (e.g., 12, 24).";
            break;
          }
        }
      }

      if (!isValid) {
        errorMessageDiv.textContent = message;
        inputField.classList.add('is-invalid'); // Add Bootstrap's invalid state styling
        return false;
      } else {
        errorMessageDiv.textContent = "";
        inputField.classList.remove('is-invalid'); // Remove invalid state if valid
        return true;
      }
    }
  </script>
</body>
</html>



<?php 



?>