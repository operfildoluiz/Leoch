<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leoch | {{$slogan}}</title>
</head>
<body>
    <img src="https://s17.postimg.org/kjbvqrcm7/Sele_o_001.png" alt="{{$name}}">
    <h1>{{$name}} <small>{{$slogan}}</small></h1>

    <p>This is a small demo of Leoch rendering scheme for:</p>

    <ul>
    @foreach[$features as $feat]
        <li>$feat</li>
    @endforeach
    </ul>

    <p>Leoch is under {{$license}} license and you can use and collaborate :)</p>

    @if[$under_development]
        <p><b>NOTE: Leoch is under development. If you find a bug or have a suggestion, please, open an issue in GitHub project</b></p>
    @else
        <p>Leoch is <b>ready</b> for use!</p>
    @endif
</body>
</html>
