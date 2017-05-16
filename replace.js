var replace = require("replace");



replace({
  regex: "btheme.com",
  replacement: "btheme.wpninja.com",
  paths: ['.'],
  recursive: true,
  silent: true,
});



replace({
  regex: "btheme",
  replacement: "btheme",
  paths: ['.'],
  recursive: true,
  silent: true,
});



replace({
  regex: "bTheme",
  replacement: "bTheme",
  paths: ['.'],
  recursive: true,
  silent: true,
});
