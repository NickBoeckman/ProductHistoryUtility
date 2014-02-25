function subComp() 
{
	var result = $('#iframSub').contents();
	if(result[0].documentElement.childNodes[1].innerHTML != '')
	{
		var data = JSON.parse(result[0].documentElement.childNodes[1].innerHTML);
		var error = '<td><table><tr><td>Errors:</td></tr>';
		for (var i = 0; i < data.length; i++) 
		{
		    error += '<tr><td><p class="text-error">' + data[i] + '</p></td></tr>';
		}	
		if(data.length == 0)
		{
			error = '<tr><td><p class="text-success">Succsessfully added!</p><td></tr>';
			$('#addForm').find("input[type=text], textarea").val("");
		}
		else
		{
			error += '</table></td>';
		}
		$('#formSubmission').html(error);
	}
	else
	{
		$('#formSubmission').hide();
		$('#formSubmission').html('<p><img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>Submiting form, please wait...</p>');
	}
}
function formSubmit()
{
	$('#formSubmission').show();
}
