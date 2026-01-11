<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<title>Form Pendaftaran LPK</title>
<style>
  /* Reset & Base */
  * {
    box-sizing: border-box;
  }
  body {
    margin:0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f7f9fc;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 10px;
  }
  .container {
    background: white;
    max-width: 400px;
    width: 100%;
    padding: 20px 30px 30px 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    overflow-y: auto;
    max-height: 600px;
  }
  h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 25px;
    font-weight: 700;
    font-size: 1.8rem;
  }
  form {
    display: flex;
    flex-direction: column;
    gap: 18px;
  }
  label {
    font-weight: 600;
    margin-bottom: 6px;
    display: block;
    color: #34495e;
  }
  input[type="text"],
  input[type="email"],
  textarea,
  select {
    width: 100%;
    padding: 10px 14px;
    border: 1.8px solid #bdc3c7;
    border-radius: 6px;
    font-size: 1rem;
    font-family: inherit;
    transition: border-color 0.3s ease;
  }
  input[type="text"]:focus,
  input[type="email"]:focus,
  textarea:focus,
  select:focus {
    border-color: #2980b9;
    outline: none;
  }
  textarea {
    resize: vertical;
    min-height: 80px;
  }
  button {
    background: #2980b9;
    color: white;
    padding: 12px;
    font-size: 1.1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background: #1f6391;
  }
  .message {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-weight: 600;
    font-size: 1rem;
    color: white;
  }
  .error {
    background-color: #e74c3c;
  }
  .success {
    background-color: #27ae60;
  }
  @media screen and (max-width: 420px) {
    .container {
      max-width: 100%;
      padding: 15px 20px 25px 20px;
    }
  }
</style>
</head>
<body>
<div class="container">
  <h1>Form Pendaftaran LPK</h1>
  <?php
    // Initialize variables
    $errors = [];
    $success_message = '';
    // Input variables
    $name = $email = $phone = $institution = $address = $programs = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      // Helper function to sanitize input
      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

      // Sanitize and validate inputs
      $name = test_input($_POST["name"] ?? '');
      $email = test_input($_POST["email"] ?? '');
      $phone = test_input($_POST["phone"] ?? '');
      $institution = test_input($_POST["institution"] ?? '');
      $address = test_input($_POST["address"] ?? '');
      $programs = test_input($_POST["programs"] ?? '');

      // Validate Name
      if (empty($name)) {
        $errors[] = "Nama lengkap harus diisi.";
      } elseif (strlen($name) < 3) {
        $errors[] = "Nama lengkap minimal 3 karakter.";
      }

      // Validate Email
      if (empty($email)) {
        $errors[] = "Email harus diisi.";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
      }

      // Validate Phone
      if (empty($phone)) {
        $errors[] = "Nomor telepon harus diisi.";
      } elseif (!preg_match("/^[0-9+\\s-]{6,20}$/", $phone)) {
        $errors[] = "Format nomor telepon tidak valid.";
      }

      // Validate Institution
      if (empty($institution)) {
        $errors[] = "Nama lembaga harus diisi.";
      }

      // Validate Address
      if (empty($address)) {
        $errors[] = "Alamat lembaga harus diisi.";
      }

      // Validate Programs
      if (empty($programs)) {
        $errors[] = "Program pelatihan harus dipilih.";
      }

      if (empty($errors)) {
        $success_message = "Pendaftaran berhasil! Terima kasih sudah mendaftar di LPK kami.";
        // Here you may implement email sending or saving data to database
        // For now, just clear inputs
        $name = $email = $phone = $institution = $address = $programs = "";
      }
    }
  ?>

  <?php if (!empty($errors)): ?>
    <div class="message error">
      <ul style="margin:0; padding-left: 18px;">
        <?php foreach ($errors as $error) {
          echo "<li>" . $error . "</li>";
        } ?>
      </ul>
    </div>
  <?php elseif ($success_message): ?>
    <div class="message success"><?php echo $success_message; ?></div>
  <?php endif; ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Nama Lengkap *</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required />

    <label for="email">Email *</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required />

    <label for="phone">Nomor Telepon *</label>
    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required />

    <label for="institution">Nama Lembaga *</label>
    <input type="text" id="institution" name="institution" value="<?php echo htmlspecialchars($institution); ?>" required />

    <label for="address">Alamat Lembaga *</label>
    <textarea id="address" name="address" required><?php echo htmlspecialchars($address); ?></textarea>

    <label for="programs">Program Pelatihan yang Diminati *</label>
    <select id="programs" name="programs" required>
      <option value="" disabled <?php echo ($programs == "") ? "selected" : "" ?>>-- Pilih Program --</option>
      <option value="Komputer" <?php echo ($programs == "Komputer") ? "selected" : "" ?>>Komputer</option>
      <option value="Bahasa Inggris" <?php echo ($programs == "Bahasa Inggris") ? "selected" : "" ?>>Bahasa Inggris</option>
      <option value="Teknik" <?php echo ($programs == "Teknik") ? "selected" : "" ?>>Teknik</option>
      <option value="Kecantikan" <?php echo ($programs == "Kecantikan") ? "selected" : "" ?>>Kecantikan</option>
      <option value="Kuliner" <?php echo ($programs == "Kuliner") ? "selected" : "" ?>>Kuliner</option>
      <option value="Bisnis dan Manajemen" <?php echo ($programs == "Bisnis dan Manajemen") ? "selected" : "" ?>>Bisnis dan Manajemen</option>
    </select>

    <button type="submit">Daftar</button>
  </form>
</div>
</body>
</html>

