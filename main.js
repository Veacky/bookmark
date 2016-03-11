
$(document).ready(function() {

	getBookmarks();
	manageAddForm();

});

function getBookmarks() {
	$.post(
		"bookmark.php",
		{ },
		displayBookmarks,
		"json"
	);
}

function displayBookmarks(data) {
	console.log("dsqsdqsdqsdqsdsd");
	var ul = $("#bookmarks ul");
	ul.empty();
	$.each(data.bookmarks, function(i, b) {
		var li = $("<li/>");
		ul.append(li);
		li.append("<a href='http://"+b.url+"' target='_blank'>"+b.name+"</a>");
		var del = $("<button>supprimer</button>");
		del.click(function() { deleteBookmark(b.idbookmark); });
		li.append(del);
	});
	if (data.error.value)
		$("#error").html(data.error.message);
}

function manageAddForm() {
	$("#addForm button").click(function() {
		var name = $("#name").val();
		var url = $("#url").val();
		$.post(
			"bookmark.php",
			{ "name": name, "url": url },
			function(data) {
				console.log(data);
				displayBookmarks(data);
				if (!data.error.value)
					$("#addForm input").val("");
			},
			"json"
		);
	});
}

function deleteBookmark(idbookmark) {
	$.post(
		"bookmark.php",
		{ "idbookmark": idbookmark }, 
		displayBookmarks,
		"json");
}

