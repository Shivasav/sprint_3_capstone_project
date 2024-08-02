<!DOCTYPE html>
<html>
<head>
    <title>Email Post Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
        }

        .message {
            padding: 20px;
            text-align: center;
        }

        .button {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .text-white {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Email Notification from Pointrover.com</h1>
        </div>
        <div class="message">
            <p>Dear recipient,</p>
            <p>We are pleased to provide you with the following information:</p>
            <p>Your unique access code:</p>
            <p>
                <span class="button"><?php echo $randomCode; ?></span>
            </p>
            <p>Trip Access URL:</p>
            <p>
                <span class="button"><a class="text-white" href="<?= base_url('detail/'.$trip_id); ?>"><?= base_url('detail/'.$trip_id); ?></a></span>
            </p>
              <p>
                <span class="button"><a class="text-white" href="<?= base_url('activate'); ?>">Enter Code here</a></span>
            </p>

            <p>Use the above code to activate the posted trip.</p>
            <p>Thank you for choosing Pointrover.com!</p>
        </div>
    </div>
</body>
</html>
