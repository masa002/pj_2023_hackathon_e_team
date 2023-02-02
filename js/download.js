function savefile(value) {
	let fileUrl = document.getElementsByName(value)[0].src;
	const link = document.createElement("a");

	link.href = fileUrl;
	link.download = '';
	link.click();        
	document.body.removeChild(link);
}