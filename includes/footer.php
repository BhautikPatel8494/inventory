</div> <!-- container -->
</secton>
<!-- </div> -->

<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>

<script src="assests/plugins/datatables/jquery.dataTables.min.js"></script>
<?php if ($_SESSION['role'] == 2) { ?>
	<script type="text/javascript">
		window.$crisp = [];
		window.$crisp.push(["set", "user:email", "test1234@gmail.com"]);
		window.$crisp.push(["set", "user:nickname", "John Doe"]);
		window.CRISP_COOKIE_DOMAIN = 'admin@stoker.com';
		window.CRISP_WEBSITE_ID = "ede79f9a-2be9-4f53-b681-a13397856670";
		(function() {
			d = document;
			s = d.createElement("script");
			s.src = "https://client.crisp.chat/l.js";
			s.async = 1;
			d.getElementsByTagName("head")[0].appendChild(s);
		})();
	</script>
<?php } ?>
</body>

</html>