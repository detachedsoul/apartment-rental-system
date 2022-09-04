function createEditor (id) {
	ClassicEditor
		.create(document.querySelector(`#${id}`), {
			toolbar: {
				shouldNotGroupWhenFull: true,
			},
		})
		.then(editor => {
			window.editor = editor;
		})
		.catch(err => {
			console.error(err.stack);
		});
}