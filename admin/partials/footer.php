<style type="text/css">
	footer{
	width: 100%;
	float: left;
	padding: 2.5%;
	background-color: #3d4a2c;
	border-top: 2px solid #000;
	margin-top: 10px;
	height: 100px;
}

footer #social{
	position:sticky;
	float: left;
	width: 50%;
}

footer #social img:hover{
	background-color: #555;
	opacity: 1;
    border-radius: 10%;
    color: green;
    z-index: 2;
}

footer #social img{
	width: 30px;
	height: 30px;
	float: left;
	margin-right: 5px;
	padding: 3px;
	position: sticky;
}

footer #rights{
	float: right;
	width: 50%;
	text-align: right;
	font-size: 1.1em;
	position: sticky;
}
</style>
<footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<div id="social">
	<a href="http://facebook.com" title="Група Facebook" target="_blank"><img src="images/1.png" alt="Facebook" title="Facebook"></a>
	<a href="http://instagram.com" title="Група Instagram" target="_blank"><img src="images/2.png" alt="Instagram" title="Instagram"></a>
	<a href="http://twitter.com" title="Група Twitter" target="_blank"><img src="images/3.png" alt="Twitter" title="Twitter"></a>
	</div>
	<div id="rights">
		Всі права захищені &copy; <?= date('Y');?>
	</div>
</footer>