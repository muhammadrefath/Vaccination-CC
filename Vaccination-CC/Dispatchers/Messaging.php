<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Messaging</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Messaging</h1>    </div>
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
  <title>Messaging - Dispatcher</title>
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
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #444;
      margin-bottom: 30px;
    }

    /* Message List Styles */
    .message-list {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .message-item {
      border-bottom: 1px solid #ddd;
      padding: 10px;
      cursor: pointer;
    }

    .message-item:hover {
      background-color: #f9f9f9;
    }

    /* Message View Styles */
    .message-view {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    /* Compose Message Styles */
    .compose-message {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    textarea, input[type="text"], input[type="email"], input[type="submit"] {
      width: calc(100% - 22px);
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      resize: vertical;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Message Archive Styles */
    .message-archive {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    input[type="search"] {
      width: calc(100% - 22px);
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Messaging</h1>

    <!-- Message List Section -->
    <div class="message-list">
      <div class="message-item" onclick="showMessageDetails(1)">
        Sender: User A - Subject: Important Update - 2023-11-28
      </div>
      <div class="message-item" onclick="showMessageDetails(2)">
        Sender: User B - Subject: Meeting Schedule - 2023-11-27
      </div>
      <!-- More message items can be added -->
    </div>

    <!-- Message View Section -->
    <div class="message-view" id="messageView">
      <h2>Message Details</h2>
      <p>From: User A</p>
      <p>Sent: 2023-11-28 10:30 AM</p>
      <p>Subject: Important Update</p>
      <p>Message: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut...</p>
    </div>

    <!-- Compose Message Section -->
    <div class="compose-message">
      <h2>Compose Message</h2>
      <input type="text" placeholder="To: User or Department">
      <input type="text" placeholder="Subject">
      <textarea placeholder="Write your message"></textarea>
      <input type="submit" value="Send">
    </div>

    <!-- Message Archive Section -->
    <div class="message-archive">
      <h2>Message Archive</h2>
      <input type="search" placeholder="Search messages">
      <div class="message-item">
        Sender: User C - Subject: Project Update - 2023-11-25
      </div>
      <!-- More archived message items can be added -->
    </div>
  </div>

  <script>
    function showMessageDetails(messageId) {
      const messageView = document.getElementById('messageView');
      // Fetch message details from backend or store based on messageId
      // Populate messageView with detailed message content
      messageView.innerHTML = `
        <h2>Message Details</h2>
        <p>From: User A</p>
        <p>Sent: 2023-11-28 10:30 AM</p>
        <p>Subject: Important Update</p>
        <p>Message: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut...</p>
      `;
    }
  </script>
</body>
</html>


    
    
  </body>
</html>