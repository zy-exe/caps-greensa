<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Reset Password Akun Anda</title>
    <style>
        /* Style for the button */
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            transition: background-color 0.3s;
            cursor: pointer;
        }
        /* Hover effect for the button */
        .button:hover {
            background-color: #45a049;
        }
        /* Style for the container */
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        /* Style for the paragraph */
        p {
            margin: 0 0 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Halo,</p>
        <p>Kami menerima permintaan untuk mereset password akun Anda. Untuk melanjutkan proses reset password, silakan klik tombol di bawah ini:</p>
        <p><a class="button" href="{{ route('reset.password', ['token' => $token]) }}" style="color: #fff; text-decoration: none;">Reset Password</a></p>
        <p>Jika Anda tidak meminta reset password, Anda bisa mengabaikan email ini. Akun Anda akan tetap aman.</p>
        <p>Terima kasih,<br>
        [Tim Support Anda]</p>
    </div>
</body>
</html>
