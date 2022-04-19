function handleEmptyConfigValue(value, defaultValue) {
	if (!value || value === '') {
		return defaultValue;
	}
	return value;
};

function openPopup(url, topRatio = 0.25, leftRatio = 0.25) {
    var theTop = (screen.height * topRatio);
    var theLeft = (screen.width * leftRatio);
    var features = 'height=600,width=800,top='+theTop+',left='+theLeft+',toolbar=0,location=0,directories=0,status=0,menubar=1,scrollbars=1,resizable=1'
    window.open(handleEmptyConfigValue(url, '//example.com'), "_blank", features);
}

export default openPopup;