<!DOCTYPE html>
<html lang="en">
<link href="http://steveville.org/assets/css/cosmo.css" rel="stylesheet" type="text/css" media="all" />
<body style="background-color: #ccc;">
<div class="text-center">
    <h1>
        Kredital.az
    </h1>
</div>
<hr>
<br />
<div class="maincontent" style="background-color: #FFF; margin: auto; padding: 20px; width: 450px; border-top: 2px solid #27ae60;">
    <div class="text-center">
        <h1>Salam! Sizin saytdan gələn bir mesajınız var.</h1>
        <table border="1">
            <tr>
                <th>Telefon</th>
                <th>Email</th>
                <th>Ad</th>
            </tr>
            <tr>
                <td>{{ $phone }}</td>
                <td>{{ $email }}</td>
                <td>{{ $name }}</td>
            </tr>
        </table>
        <p>{!! $messages !!}</p>
    </div>
</div>
</body>
</html>