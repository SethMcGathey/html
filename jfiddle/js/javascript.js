
var content = "";
var iframe = document.getElementById('iframe');

if(iframe.contentDocument)
{
	doc = iframe.contentDocument;
}
else if(iframe.contentWindow)
{
	doc = iframe.contentWindow.document;
}else 
{
	doc = iframe.document;
}

doc.open();
doc.writeln(result);
doc.close();





