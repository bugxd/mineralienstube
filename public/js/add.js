$(document).ready(function ()
{
	$("#stone_submit").click(function()
	{
		$("#stone_form").submit();
	});

	$("#disease_submit").click(function()
	{
		$("#disease_form").submit();
	});

	$("#body_submit").click(function()
	{
		$("#body_form").submit();
	});

	$("#found_submit").click(function()
	{
		$("#found_form").submit();
	});

	$(".delete_stone").click(function(event)
	{
		$("#btn_delete_stone").prop('href', '/stones/stone/' + event.target.id + '/delete');
	});

	$(".delete_disease").click(function(event)
	{
		$("#btn_delete_disease").prop('href', '/stones/disease/' + event.target.id + '/delete');
	});

	$(".delete_body").click(function(event)
	{
		$("#btn_delete_body").prop('href', '/stones/body/' + event.target.id + '/delete');
	});

	$(".delete_found").click(function(event)
	{
		$("#btn_delete_found").prop('href', '/stones/found/' + event.target.id + '/delete');
	});
});