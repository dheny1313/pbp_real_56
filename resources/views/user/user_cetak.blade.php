<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        @media print {
            @page {
                size: A4;
                margin-top: 20mm;
                margin-bottom: 20mm;
                margin-left: 20mm;
                margin-right: 20mm;
            }
            body {
                margin: 0;
                -webkit-print-color-adjust: exact;
            }
        }
        .member-card {
            border: 1px solid #000;
            padding: 20px;
            width: 300px;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .member-header {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .member-info {
            margin-bottom: 8px;
            font-size: 14px;
        }
    </style>
</head>

<body onload="window.print(); window.onafterprint = closeWindow();">
    <div class="container mt-5 d-flex justify-content-center">
        <div class="member-card">
            <div class="member-header">Member Card</div>
            <div class="member-info">Name: {{ $user->name }}</div>
            <div class="member-info">Username: {{ $user->username }}</div>
            <div class="member-info">Email: {{ $user->email }}</div>
            <div class="member-info">Level: {{ $user->level }}</div>
            <div class="member-info">ID: {{ $user->id }}</div>
        </div>
    </div>
</body>


</html>
