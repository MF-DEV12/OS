<!DOCTYPE>
<html>
<head>
	<title>test</title>
</head>
<body>

<div id="mobileDiv"></div>
<iframe id="mobileframe" src="<?=base_url('home/mobile')?>" height="500px" width="500px"></iframe>


<button id="btn-set">Set Mobile</button>
</body>


<script type="text/javascript" src="<?=base_url("js/homestyle/jquery.js")?>"></script>

<script type="text/javascript">
	
 	// $("#mobileDiv").load("http://developer.globelabs.com.ph/dialog/oauth?app_id=dGo5fEd97jF5bcboMpT9yAFzMGaGf97b")
	$("button#btn-set").click(function(e){
		 alert($("iframe").contents().find("input#access_token_subscriber_num").val())
	})
 	

 	 $("#mobileframe").load(function() {
        var doc = this.contentDocument || this.contentWindow.document;
        var target = doc.getElementById("access_token_subscriber_num");
        target.value = "Found It!";
    });

	 

</script>

</html>