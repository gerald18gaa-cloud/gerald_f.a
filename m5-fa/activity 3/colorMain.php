<!DOCTYPE html>
<html>
<head>
    <title>My Favorite Color</title>
</head>
<body>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th colspan="2">Enter your favorite colors</th>
        </tr>
        <form method="post" action="color2.php">
            <tr>
                <td>Favorite color 1:</td>
                <td><input type="text" name="color1"></td>
            </tr>
            <tr>
                <td>Favorite color 2:</td>
                <td><input type="text" name="color2"></td>
            </tr>
            <tr>
                <td>Favorite color 3:</td>
                <td><input type="text" name="color3"></td>
            </tr>
            <tr>
                <td>Favorite color 4:</td>
                <td><input type="text" name="color4"></td>
            </tr>
            <tr>
                <td>Favorite color 5:</td>
                <td><input type="text" name="color5"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="send colors">
                </td>
            </tr>
        </form>
    </table>
</body>
</html>