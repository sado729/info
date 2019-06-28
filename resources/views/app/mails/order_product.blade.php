<table style="width: 100%;" border="1" cellspacing="1" cellpadding="5" data-mce-style="width: 100%;">
    <tbody>
        <tr>
            <td colspan="2" align="center"><p>&nbsp;</p>
                <p><strong><br> MƏHSUL SİFARİŞİ </strong></p>
                <p>&nbsp;</p></td>
        </tr>
        <tr>
            <td ><strong>Sifariş edən</strong></td>
            <td>&nbsp;{{ $user['name'] }}</td>
        </tr>
        <tr>
            <td ><strong>Telefon</strong></td>
            <td>&nbsp;{{ $user['phone'] }}</td>
        </tr>
        <tr>
            <td ><strong>Ünvan</strong></td>
            <td>&nbsp;{{ $user['address'] }}</td>
        </tr>
        <tr>
            <td ><strong>Məhsulun id</strong></td>
            <td>&nbsp;{{ $product['id'] }}</td>
        </tr>
        <tr>
            <td ><strong>Məhsulun adı</strong></td>
            <td>{{ $product['name'] }}</td>
        </tr>
        <tr>
            <td ><strong>Məhsulun sayı</strong></td>
            <td>{{ $product['qty'] }}</td>
        </tr>
        <tr>
            <td ><strong>Məhsulun şəkili</strong></td>
            <td><img src="/uploads/product/{{ $product['id'] }}/{{ $product->options->img }}" alt="">{{ $product['name'] }}</td>
        </tr>
    </tbody>
</table>