<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Enviar Email</title>
<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<style type="text/css">
	p{
	text-align: justify;
	font-style: italic;
}
	href{
		text-align:center;
		}
	.titulos {
	font: normal 175% 'century gothic', arial, sans-serif;
color: #A4AA04;

}
.titulos2 {
	font: normal 100% 'century gothic', arial, sans-serif;
	color: #A4AA04;
	font-size: 150%;
}

    .edit1 {
	font: normal 90% 'century gothic', arial, sans-serif;
color: #000;
}
    #footer {
	font-style: italic;
}
    </style>
</head>

<body>
<form method="POST" action="sendmail.php" style="font-family: Calibri">
        <p class="titulos2">Questões </p>
        <p class="edit1">Destinatário (Nome):<br><input type="text" name="dest_n" size="35">
        </p>
        <p class="edit1">Destinatário (Email):<br><input type="text" name="dest_e" size="35">
        </p>
        <p class="edit1">Assunto:<br><input type="text" name="ass" size="35">
        </p>
        <p class="edit1">Mensagem:<br>
          <textarea rows="10" cols="31" name="msg"></textarea>
        </p>
        <p class="edit1">
        <input type="submit" value="Enviar" name="submit">
        </p>
</form>
</body>

</html>