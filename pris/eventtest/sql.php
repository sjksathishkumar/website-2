<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
CREATE TABLE calendar_events (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	event_title VARCHAR (25),
	event_shortdesc VARCHAR (255),
	event_start DATETIME
);

</body>
</html>