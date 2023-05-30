function clipboard4wiki(text) {
  var hiddenElement = document.createElement("textarea");
  text = html_entity_decode(text);
  text = text.replace(/(<¬>)/g, "\n");
  hiddenElement.value = text;
  hiddenElement.width = "1px";
  hiddenElement.height = "1px";
  document.body.appendChild(hiddenElement);
  hiddenElement.select();
  document.execCommand("copy");
  document.body.removeChild(hiddenElement);
}

function html_entity_decode(encodedString) {
  var textArea = document.createElement("textarea");
  textArea.innerHTML = encodedString;
  return textArea.value;
}
