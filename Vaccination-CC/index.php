<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>INFANT VACCINATION INVENTORY MANAGEMENT AND
    DISTRIBUTION SYSTEM</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
      color: #333;
    }

    header {
      background-color: #fff;
      padding: 15px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
      float: left;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      display: inline-block;
      margin-right: 20px;
    }

    /* Login Section Styles */
    .login-section {
      text-align: center;
      margin-top: 80px;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 80px auto;
    }

    .login-section h2 {
      margin-bottom: 20px;
      color: #007bff;
    }

    .login-form label {
      display: block;
      margin-bottom: 5px;
      text-align: left;
      color: #444;
    }

    .login-form input[type="text"],
    .login-form input[type="password"],
    .login-form select {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-form button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-form button:hover {
      background-color: #0056b3;
    }

    .error-message {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <h1>INFANT VACCINATION INVENTORY MANAGEMENT AND
        DISTRIBUTION SYSTEM</h1>
    </div>
    <nav>
      
    </nav>
  </header>

  <div class="login-section">
    <h2>Login</h2>
    <form class="login-form" method="POST" action="Administrator/validate.php">
      <label for="user_role">Select User:</label>
      <select id="user_role" name="user_role">
        <option value="administrator">Administrator</option>
        <option value="inventory_manager">Inventory Manager</option>
        <option value="dispatcher">Dispatcher</option>
        <option value="staff">Staff</option>
      </select>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <button type="submit">Login</button>
      <p class="error-message" id="errorMessage"></p>
    </form>
  </div>
</body>
</html>
