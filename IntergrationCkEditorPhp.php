<html>
<head>
	<script src="../../../ckeditor.js"></script>
	<script src="../../../samples/sample.js"></script>
</head>
<body>

	<form action="post.php" method="post">
		<textarea cols="80" id="editor1" name="editor1" rows="10">
			DU LIEU MAC DINH
		</textarea>

		<script>

			CKEDITOR.replace( 'editor1', {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
			});

		</script>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>

</body>
</html>
