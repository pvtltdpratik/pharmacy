<?php
function generateBackButton()
{
    echo '<a class="iambackbuttonnew" onclick="history.back()" style="vertical-align:middle"><span> Back</span></a>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>My PHP Website</title>
    <!-- Add your CSS styles here -->
    <style>
        .iambackbuttonnew {
            display: inline-block;
            border-radius: 4px;
            background-color: #dc3545;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 16px;
            padding: 8px;
            width: 7rem;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .iambackbuttonnew span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .iambackbuttonnew span::before {
            /* content: '\00bb'; */ content: '⇚';
            position: absolute;
            opacity: 0;
            top: 0;
            left: -20px;
            transition: 0.5s;
        }

        .iambackbuttonnew:hover span {
            padding-left: 25px;
            color: white;
        }

        .iambackbuttonnew:hover span::before {
            opacity: 1;
            left: 0;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Optional: Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>