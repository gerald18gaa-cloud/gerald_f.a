<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volume of Shapes</title>
    <style>
        table {
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 2px solid #a0a0a0;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #ffffff;
            font-weight: normal;
        }
    </style>
</head>
<body>

<?php
$s = 5;
$cube_ans = $s * $s * $s;

$l = 6; $w = 4; $h_prism = 8;
$rect_ans = $l * $w * $h_prism;

$r_cyl = 3; $h_cyl = 7;
$cyl_ans = 3.1416 * $r_cyl * $r_cyl * $h_cyl;

$r_cone = 4; $h_cone = 9;
$cone_ans = (1 / 3) * 3.1416 * $r_cone * $r_cone * $h_cone;

$r_sphere = 5;
$sphere_ans = (4 / 3) * 3.1416 * $r_sphere * $r_sphere * $r_sphere;
?>

<table>
    <thead>
        <tr>
            <th colspan="4">Volume of Shapes</th>
        </tr>
        <tr>
            <th>Shape</th>
            <th>Values</th>
            <th>Formula</th>
            <th>Answer</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Cube</td>
            <td>s = <?php echo $s; ?></td>
            <td>V = s<sup>3</sup></td>
            <td><?php echo $cube_ans; ?></td>
        </tr>
        <tr>
            <td>Right Rectangular Prism</td>
            <td>l = <?php echo $l; ?>, w = <?php echo $w; ?>, h = <?php echo $h_prism; ?></td>
            <td>V = l &times; w &times; h</td>
            <td><?php echo $rect_ans; ?></td>
        </tr>
        <tr>
            <td>Prism or Cylinder</td>
            <td>r = <?php echo $r_cyl; ?>, h = <?php echo $h_cyl; ?></td>
            <td>V = &pi;r<sup>2</sup>h</td>
            <td><?php echo round($cyl_ans, 2); ?></td>
        </tr>
        <tr>
            <td>Pyramid or Cone</td>
            <td>r = <?php echo $r_cone; ?>, h = <?php echo $h_cone; ?></td>
            <td>V = (1/3)&pi;r<sup>2</sup>h</td>
            <td><?php echo round($cone_ans, 2); ?></td>
        </tr>
        <tr>
            <td>Sphere</td>
            <td>r = <?php echo $r_sphere; ?></td>
            <td>V = (4/3)&pi;r<sup>3</sup></td>
            <td><?php echo round($sphere_ans, 2); ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>