function isEmail(email) { var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/; return pattern.test(email); }
function isUserName(username) { var pattern = /^[a-zA-Z0-9_]{6,24}$/; return pattern.test(username); }
function isNumber(value) { var pattern = /^\d+$/; return pattern.test(value); }