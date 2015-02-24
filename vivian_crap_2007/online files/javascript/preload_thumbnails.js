/*****************************************************************************************
My Works -- Rollover/Rollout Thumbnails
*****************************************************************************************/
var thumbnailNames = [["work_1_thumb_1", "work_1_thumb_2", "work_1_thumb_3", "work_1_thumb_4"],
							   			["work_2_thumb_1", "work_2_thumb_2", "work_2_thumb_3", "work_2_thumb_4"]];
var imageNames = [["work_1_image_1", "work_1_image_2", "work_1_image_3", "work_1_image_4"],
						   		["work_2_image_1", "work_2_image_2", "work_2_image_3", "work_2_image_4"]];
var allThumbnails = new Array();
var allImages = new Array();

function preloadThumbnails() {
	var totalThumbnails = thumbnailNames.length;
	for (i=0; i<totalThumbnails; i++) {
		var total = thumbnailNames[i].length;
		var thumbnailArray = new Array();
		var imageArray = new Array();
		for (j=0; j<total; j++) {
			var thumbObject = new Object;
			thumbObject.overImage = new Image();
			thumbObject.overImage.src = "images/works_images/" + thumbnailNames[i][j] + "_over.jpg";
			thumbObject.outImage = new Image();
			thumbObject.outImage.src = "images/works_images/" + thumbnailNames[i][j] + "_out.jpg";
			thumbnailArray[j] = thumbObject;
			var theImage = new Image();
			theImage.src = "images/works_images/" + imageNames[i][j] + ".jpg";
			imageArray[j] = theImage;
		}
		allThumbnails[i] = thumbnailArray;
		allImages[i] = imageArray;
	}
}

function overThumb(containerNum, thumbNum) {
	var imageContainer = "imageContainer_" + containerNum;
	if (document.images) {
		document.images[thumbnailNames[containerNum][thumbNum]].src = allThumbnails[containerNum][thumbNum].overImage.src;
		document.images[imageContainer].src = allImages[containerNum][thumbNum].src;
	}
}

function outThumb(containerNum, thumbNum) {
	if (document.images) {
		document.images[thumbnailNames[containerNum][thumbNum]].src = allThumbnails[containerNum][thumbNum].outImage.src;
	}
}
/****************************************************************************************/
