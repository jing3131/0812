<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>

<!--
 
畫面左右各有一個下拉式選單，
左邊的下拉式選單若選擇  A 這項時，右邉的下拉式選單要改成 A01, A02, A03, A04, A05;
左邊的下拉式選單若改選  B 這項時，右邉的下拉式選單要改成 B01, B02, B03, B04, B05;
左邊的下拉式選單若改選  C 這項時，右邉的下拉式選單要改成 C01, C02, C03, C04, C05

-->

	<form method="post" action="http://exec.hostzi.com/echo.php">
		<select name="letter" id="letter">
			<option value="0">A</option>
			<option value="1">B</option>
			<option value="2">C</option>
		</select>&nbsp;|&nbsp; 
		<select name="letterNumber" id="letterNumber">
			<option value="0">A01</option>
			<option value="1">B02</option>
			<option value="2">C03</option>
		</select> 
		<input type="submit" value="OK" /> 
	</form>

	<div id="debug"></div>
	<script>
		
		//法１	把 function獨立出來，document.ready後執行 setLetterNumber();
		// $(document).ready(function(){			
		// 	function setLetterNumber(){				// 	下拉式選單被改變，啟動
		// 	var selectedLetter = $("#letter option:selected").text();			// $("#id" option:selected)	 當選單被選取
		// 	var serverUrl = `./getLetterNumber.php?letter=${selectedLetter}`;		// http://localhost:8888/Lab_AJAX/getLetterNumber.php?letter=A
		// 	$.ajax({
		// 		type: "get",
		// 		url: serverUrl
		// 		// success: function(e){
		// 		// 	$("#letterNumber").html(e);
		// 		// }
		// 	}).then(function(e){
		// 		$("#letterNumber").html(e);			// 將 e 放入 #letterNumber
		// 		console.log(e);						// e -> 會將getLetterNumber執行的結果輸出
		// 	});
		// }

		// setLetterNumber();

		// $("#letter").change(setLetterNumber);
		// });
		

		// 法２		使用 trigger
		$("#letter").change(function (){				// 	下拉式選單被改變，啟動
			var selectedLetter = $("#letter option:selected").text();				// $("#id" option:selected)	 當選單被選取
			var serverUrl = `./getLetterNumber.php?letter=${selectedLetter}`;		// 	呼叫到getLetterNumber		http://localhost:8888/Lab_AJAX/getLetterNumber.php?letter=A
			$.ajax({
				type: "get",
				url: serverUrl
				// success: function(e){
				// 	$("#letterNumber").html(e);
				// }
			}).then(function(e){
				$("#letterNumber").html(e);			// 將 e 放入 #letterNumber
				console.log(e);						// e -> 會將getLetterNumber執行的結果輸出
			});
		});

		$("#letter").trigger("change");				// trigger("事件")  -> 誘發事件

		
	</script>

</body>
</html>