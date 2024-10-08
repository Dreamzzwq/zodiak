<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Zodiak dan Shio Anda</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('bgpir.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 50px;
        }
        h1 {
            margin-bottom: 20px;
        }
        input[type="date"], input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: #34495e;
            color: white;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
        #result {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #34495e;
            display: inline-block;
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s, transform 0.5s;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<h1>Cari Zodiak dan Shio Anda</h1>
<form method="post">
    <input type="date" name="birthdate" required />
    <input type="number" name="year" placeholder="Tahun Kelahiran" required min="1900" max="2100" />
    <button type="submit">Mari Kita Cekk</button>
</form>

<div id="result">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $birthdate = new DateTime($_POST['birthdate']);
        $month = (int)$birthdate->format('m');
        $day = (int)$birthdate->format('d');

        $zodiac = '';
        $description = '';

        if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
            $zodiac = "Aquarius";
            $description = "Aquarius adalah zodiak yang inovatif dan suka kebebasan.";
        } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
            $zodiac = "Pisces";
            $description = "Pisces adalah zodiak yang intuitif dan peka.";
        } elseif (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
            $zodiac = "Aries";
            $description = "Aries adalah zodiak yang berani dan penuh semangat.";
        } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
            $zodiac = "Taurus";
            $description = "Taurus adalah zodiak yang stabil dan penuh kesabaran.";
        } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
            $zodiac = "Gemini";
            $description = "Gemini adalah zodiak yang komunikatif dan adaptif.";
        } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
            $zodiac = "Cancer";
            $description = "Cancer adalah zodiak yang emosional dan melindungi.";
        } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
            $zodiac = "Leo";
            $description = "Leo adalah zodiak yang percaya diri dan berani.";
        } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
            $zodiac = "Virgo";
            $description = "Virgo adalah zodiak yang analitis dan teliti.";
        } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
            $zodiac = "Libra";
            $description = "Libra adalah zodiak yang adil dan seimbang.";
        } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
            $zodiac = "Scorpio";
            $description = "Scorpio adalah zodiak yang intens dan misterius.";
        } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
            $zodiac = "Sagitarius";
            $description = "Sagitarius adalah zodiak yang optimis dan petualang.";
        } else {
            $zodiac = "Capricorn";
            $description = "Capricorn adalah zodiak yang disiplin dan bertanggung jawab.";
        }

        $year = (int)$_POST['year'];
        $shioList = [
            0 => "Kelinci", 
            1 => "Naga", 
            2 => "Ular", 
            3 => "Kuda", 
            4 => "Kambing", 
            5 => "Monyet", 
            6 => "Ayam", 
            7 => "Anjing", 
            8 => "Babi", 
            9 => "Tikus", 
            10 => "Kerbau", 
            11 => "Harimau"
        ];
        $shio = $shioList[$year % 12];

        echo "<h2>Zodiak Anda: $zodiac</h2>";
        echo "<p>$description</p>";
        echo "<h2>Shio Anda: $shio</h2>";

        echo "<script>
            const resultDiv = document.getElementById('result');
            resultDiv.style.opacity = 1;
            resultDiv.style.transform = 'translateY(0)';
            resultDiv.style.animation = 'fadeIn 0.5s forwards';
        </script>";
    }
    ?>
</div>

</body>
</html>
