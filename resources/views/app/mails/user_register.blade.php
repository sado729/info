<h1>{{ config('app.name') }}</h1>
<p>Salam {{ $user['name'] }},Qeydiyyatınız müvəffəqiyyətlə yerinə yetirildi</p>
<br>
<table>
    <tr>
        <td>İstifadəçi adı:</td>
        <td>{{ $user['name'] }}</td>
    </tr>
    <tr>
        <td>İstifadəçi şifrəsi:</td>
        <td>{{ $password }}</td>
    </tr>
</table>