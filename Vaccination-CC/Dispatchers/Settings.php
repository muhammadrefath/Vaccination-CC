<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Settings</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Settings</h1>    </div>
    <div class="navbar">
      <a href="#dashboard">Dashboard</a>
      <a href="#recalls">Recalls</a>
      <a href="#alerts">Safety Alerts</a>
      <a href="#messaging">Messaging</a>
      <a href="#settings">Settings</a>

    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings - Dispatcher</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f5f5f5;
      color: #333;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #444;
      margin-bottom: 30px;
    }

    /* Profile Information Section Styles */
    .profile-info {
      margin-bottom: 30px;
    }

    .profile-info label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .profile-info input[type="text"] {
      width: calc(100% - 22px);
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      margin-bottom: 10px;
    }

    /* Notification Preferences Styles */
    .notification-prefs {
      margin-bottom: 30px;
    }

    .notification-prefs label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .notification-prefs input[type="checkbox"] {
      margin-right: 5px;
    }

    /* Password Management Styles */
    .password-management {
      margin-bottom: 30px;
    }

    .password-management input[type="password"] {
      width: calc(100% - 22px);
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      margin-bottom: 10px;
    }

    /* Theme Customization Styles */
    .theme-customization,
    .language-settings,
    .security-settings,
    .data-privacy {
      margin-bottom: 30px;
    }

    .theme-customization select,
    .language-settings select,
    .security-settings select,
    .data-privacy select {
      width: calc(100% - 22px);
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      margin-bottom: 10px;
    }

    /* Buttons Styles */
    .btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      text-decoration: none;
      display: inline-block;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Settings</h1>

    <!-- Profile Information Section -->
    <div class="profile-info">
      <h2>Profile Information</h2>
      <label for="fullName">Full Name:</label>
      <input type="text" id="fullName" value="John Doe">

      <label for="email">Email:</label>
      <input type="text" id="email" value="john@example.com">

      <label for="role">Role:</label>
      <input type="text" id="role" value="Dispatcher">
    </div>

    <!-- Notification Preferences Section -->
    <div class="notification-prefs">
      <h2>Notification Preferences</h2>
      <label>
        <input type="checkbox" checked> Message Alerts
      </label>
      <label>
        <input type="checkbox" checked> Security Alerts
      </label>
      <label>
        <input type="checkbox" checked> System Updates
      </label>
    </div>

    <!-- Password Management Section -->
    <div class="password-management">
      <h2>Password Management</h2>
      <label for="currentPassword">Current Password:</label>
      <input type="password" id="currentPassword">

      <label for="newPassword">New Password:</label>
      <input type="password" id="newPassword">

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword">
    </div>

    <!-- Theme Customization Section -->
    <div class="theme-customization">
      <h2>Theme Customization</h2>
      <select>
        <option value="light">Light Theme</option>
        <option value="dark">Dark Theme</option>
        <option value="custom">Custom Theme</option>
      </select>
    </div>

    <!-- Language Settings Section -->
    <div class="language-settings">
      <h2>Language Settings</h2>
      <select>
        <option value="english">English</option>
        <option value="spanish">Spanish</option>
        <option value="french">French</option>
        <!-- Add more language options -->
      </select>
    </div>

    <!-- Security Settings Section -->
    <div class="security-settings">
      <h2>Security Settings</h2>
      <select>
        <option value="two-factor">Two-Factor Authentication</option>
        <option value="session">Session Management</option>
        <!-- Add more security options -->
      </select>
    </div>

    <!-- Data Privacy Section -->
    <div class="data-privacy">
      <h2>Data Privacy</h2>
      <select>
        <option value="opt-in">Opt-In Data Collection</option>
        <option value="opt-out">Opt-Out Data Collection</option>
        <!-- Add more privacy options -->
      </select>
    </div>

    <!-- Save Button -->
    <a href="#" class="btn">Save Settings</a>
  </div>
</body>
</html>


    
    
  </body>
</html>