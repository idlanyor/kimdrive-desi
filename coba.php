<?php
ob_start();
?>
<!doctype html>
<html lang="en">

<head>

    <title>Hello, world!</title>
</head>

<body>

    <table border="1" cellspacing="0" cellpadding="0">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
    </table>

</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once("html2pdf/html2pdf.class.php");
$pdf = new HTML2PDF('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Siswa.pdf', 'I');
?>