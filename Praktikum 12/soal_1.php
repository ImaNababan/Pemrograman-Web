<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2373020-Ima Maryati</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; }
        table { border-collapse: collapse; margin-top: 10px; }
        td { padding: 5px; border: 2px solid black; }
        .error { color: red; font-size: 12px; }
        .box { border: 1px solid #aaa; padding: 10px; width: fit-content; background-color: #f9f9f9; }
        .result-label { font-weight: bold; padding-right: 10px; display: inline-block; width: 80px; }
    </style>
</head>
<body>

<?php
$name = "";
$position = "Senior Programmer";
$password = "";
$confirmPassword = "";
$nameErr = $passErr = $confirmErr = $matchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $position = $_POST["position"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    $valid = true;

    if (empty($name)) {
        $nameErr = "Input Nama belum di isi!";
        $valid = false;
    }

    if (empty($password)) {
        $passErr = "Input Password belum di isi!";
        $valid = false;
    }

    if (empty($confirmPassword)) {
        $confirmErr = "Input Confirm Password belum di isi!";
        $valid = false;
    } elseif (!empty($password) && $password !== $confirmPassword) {
        $matchErr = "Password dan Confirm Password belum sama!";
        $valid = false;
    }

    if ($valid) {
        echo "<div class='box'>";
        echo "<div style='background-color:#ddd; padding:5px;'>Data yang Anda Masukkan!</div><br>";
        echo "<div><span class='result-label'>Name</span>: $name</div>";
        echo "<div><span class='result-label'>Position</span>: $position</div><br>";
        echo "<a href='soal_1.php'>back</a>";
        echo "</div>";
        exit();
    }
}
?>

<form method="post" action="">
    <table border="2">
        <tr>
            <td colspan="2" align="center" style="font-size: 30px; background-color: grey;">Add Profile</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" autocomplete="off" value="<?php echo ($_SERVER["REQUEST_METHOD"] == "POST") ? htmlspecialchars($name) : ""; ?>"><br>
                <?php if (!empty($nameErr)) echo "<span class='error'>$nameErr</span>"; ?>
            </td>
        </tr>
        <tr>
            <td>Position</td>
            <td>
                <select name="position">
                    <optgroup label="Programmer">
                        <option value="Senior Programmer" <?php if($position == "Senior Programmer") echo "selected"; ?>>Senior Programmer</option>
                        <option value="Junior Programmer" <?php if($position == "Junior Programmer") echo "selected"; ?>>Junior Programmer</option>
                    </optgroup>
                    <optgroup label="System Analyst">
                        <option value="Senior Analyst" <?php if($position == "Senior Analyst") echo "selected"; ?>>Senior Analyst</option>
                        <option value="Junior Analyst" <?php if($position == "Junior Analyst") echo "selected"; ?>>Junior Analyst</option>
                    </optgroup>
                </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password"><br>
                <?php if (!empty($passErr)) echo "<span class='error'>$passErr</span>"; ?>
            </td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td>
                <input type="password" name="confirm_password"><br>
                <?php 
                    if (!empty($confirmErr)) echo "<span class='error'>$confirmErr</span><br>";
                    if (!empty($matchErr)) echo "<span class='error'>$matchErr</span>"; 
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="reset" value="Reset">
                <input type="submit" value="Save">
            </td>
        </tr>
    </table>
</form>

<script>
function resetForm() {
    document.querySelector('select[name="position"]').value = "Senior Programmer";
}
</script>

</body>
</html>
