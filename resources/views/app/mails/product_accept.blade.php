<h1>{{ config('app.name') }}</h1>
<p>Salam {{ $user['name'] }}, <b><a href="https://telefoncu.az/mehsul/{{ $product->slug }}" target="_blank">{{ ucfirst($product->name) }}</a></b> adlı elanınız təsdiq edilmişdir.
<br> Kod: {{ $product->info->code }} <br> Bu kod sizə elanı dəyişdirməkdə və ya silməkdə lazım olacaq.