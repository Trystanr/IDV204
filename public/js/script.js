function addComment() {
	
}

$("#comment-button").on("click", function(e) {
	e.preventDefault();
	console.log("Hello");

	console.log($("#comment-form textarea").val());
});